<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ResetPassword as Job;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\PasswordReset;
use App\Models\Cart;

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
        return view('tai-khoan', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function donhang(Request $request)
    {
        $user = $request->user();
        $orders = $user->Order->whereIn('status', [0, 1]);
        return view('don-hang', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lichsutracuu(Request $request)
    {
        return view('lichsutracuu');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dichvu(Request $request)
    {
        $user = $request->user();
        $orders = $user->Order->whereIn('status', 2);
        return view('don-hang', compact('orders'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function giahan(Request $request, $id)
    {
        $request->user()->Order->find($id)->update(['status' => 0]);
        return redirect('/tai-khoan/don-hang/')->with('msg', 'Gói sản phẩm gia hạn thành công, thanh toán để kích hoạt gói!');
    }

    public function ketquathanhtoan() {
        return view('ket-qua-thanh-toan');
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
        $user = User::where('email', $request->email)->first();

        if($user == '') {
            return redirect()->back()->with('error', 'Tài khoản không tồn tại!');
        }

        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);
        if ($passwordReset) {
            Job::dispatch($user, $passwordReset->token);
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
        $user = User::where('email', $passwordReset->email)->first();
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
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $update = $user->update([
            'password' => Hash::make($request->password),
        ]);
        $passwordReset->delete();
        Auth::login($user);

        return redirect('/tai-khoan');
    }
}
