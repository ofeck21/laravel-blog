<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // define auth service
    private $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    /**
     * Display login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        // check if user is loged in
        if(Auth::check()) return redirect('/home');
        return view('contents.auth.login');
    }

    /**
     * Proses Login.
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \App\Services\AuthService login
     */
    public function doLogin(LoginRequest $request)
    {
        return $this->authService->login($request);
    }

    /**
     * Proses Logout.
     *
     * @return \App\Services\AuthService logout
     */

    public function logout()
    {
        return $this->authService->logout();
    }

    /**
     * Display register form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('contents.auth.register');
    }

    /**
     * Store a newly created user resource in storage.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return \App\Services\AuthService register
     */
    public function doRegister(RegisterRequest $request)
    {
        return $this->authService->register($request);
    }
}
