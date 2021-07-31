<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ResetPassWord;
use App\Models\User as Account;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\PasswordReset;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if ($user) {
            return view('tai-khoan', compact('user'));
        }
        else {
            return redirect('/login');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function giohang()
    {
        return view('gio-hang');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function donhang()
    {
        return view('don-hang');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->user()->update($request->all());
        return redirect()->back()->with('success', 'Câp nhật thành công');
    }

    /**
     * Create token password reset.
     *
     * @param  ResetPassWord $request
     * @return JsonResponse
     */
    public function sendMail(Request $request)
    {
        $user = Account::where('email', $request->email)->first();

        if($user == '') {
            return redirect()->back()->with('error', 'Tài khoản không tồn tại!');
        }

        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);
        if ($passwordReset) {
            $user->notify(new ResetPassWord($passwordReset->token));
        }

        return redirect()->back()->with('success', 'Chúng tôi đã gửi qua e-mail liên kết đặt lại mật khẩu của bạn!');
    }

    /**
     * Create token password reset.
     *
     * @param  ResetPassWord $request
     * @return JsonResponse
     */
    public function formreset(Request $request)
    {
        $token = $request->token;
        $passwordReset = PasswordReset::where('token', $token)->first();
        if($passwordReset == '') {
            return redirect('/');
        }
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return redirect('/');
        }
        return view('auth.passwords.reset', compact('token'));
    }

    /**
     * Create token password reset.
     *
     * @param  ResetPassWord $request
     * @return JsonResponse
     */
    public function reset(Request $request, $token)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $passwordReset = PasswordReset::where('token', $token)->first();
        if($passwordReset == '') {
            return redirect()->back()->withErrors('error', 'Mã token đặt lại mật khẩu này đã hết hạn!');
        }
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return redirect()->back()->withErrors('error', 'Mã token đặt lại mật khẩu này đã hết hạn!');
        }
        $user = Account::where('email', $passwordReset->email)->firstOrFail();
        $update = $user->update([
            'password' => Hash::make($request->password),
        ]);
        $passwordReset->delete();
        Auth::login($user);

        return redirect('/tai-khoan');
    }
}
