<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{

  protected AuthService $authService;

  public function __construct(AuthService $authService)
  {
    $this->authService = $authService;
  }

  public function index()
  {
    return view('auth.login');
  }

  public function registration()
  {
    return view('auth.register');
  }

  public function postLogin(LoginRequest $request)
  {
    return $this->authService->postlogin($request);
  }

  public function postRegistration(RegisterRequest $request)
  {
    return $this->authService->postRegistration($request);
  }

  public function logout()
  {
    return $this->authService->logout();
  }
}