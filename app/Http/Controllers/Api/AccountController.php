<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Account as Resources;
use Illuminate\Support\Facades\Auth;
use App\Models\User as Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AccountController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Resources::collection(Model::paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->password) {
            return $this->changePassword($request->all());
        }
        else {
            return Auth::user()->update($request->all());
        }
    }

    /**
     * changePassword the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword($request)
    {
        $password = $request['currentpassword'];
        $user = Model::find($request['id']);

        if (Hash::check($password, $user->password)) {
            return $user->update([
                'password' => Hash::make($request['password'])
            ]);
        }
        return response()->json([
            'message' => 'Chưa được xác thực'
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
