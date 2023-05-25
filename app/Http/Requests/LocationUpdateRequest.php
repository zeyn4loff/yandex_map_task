<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationUpdateRequest extends FormRequest
{

  public function rules()
  {
    return [
      'name' => 'required|string|max:50',
      'longitude' => 'required|numeric',
      'latitude' => 'required|numeric',
    ];
  }

}
