<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $modelUser;

    public function __construct() {
        $this->modelUser = new User();
    }

    public function login($request)
    {
        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password
        ];
        $remember = $request->remember_me ? true : false;

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->route('home')->withMessage(__('auth.login_success'));
        }else{
            return redirect()->back()->withErrors(__('auth.failed'))->withInput(
                $request->except('password')
            );
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function register($request)
    {
        try {
            DB::beginTransaction();

        } catch (\Throwable $th) {
            $response = ResponseService::toArray(false, $th->getMessage());
            return ResponseService::toJson($response, 500);
        }
    }
}
