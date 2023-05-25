<?php


namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

  public function rules()
  {
    return [
      'name' => 'required|max:20',
      'email' => 'required|email|unique:users',
      'password' => 'required|confirmed|min:6',
      'password_confirmation' => 'required|min:6',
    ];
  }

}
