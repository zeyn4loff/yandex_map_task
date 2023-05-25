<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthService
{

  public function postLogin(Request $request): RedirectResponse
  {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      return redirect()->intended(route('home.get'));
    }
    return redirect()->route('login.get')->with('message', 'The entered data is incorrect');
  }

  public function postRegistration($data): RedirectResponse
  {
    $user = new User();
    $user = $user::create([
      'name' => $data->get('name'),
      'email' => $data->get('email'),
      'password' => Hash::make($data->get('password'))
    ]);
    Auth::login($user);
    return redirect()->route('home.get');
  }

  public function logout(): RedirectResponse
  {
    Session::flush();
    Auth::logout();
    return redirect()->route('login.get');
  }
}
