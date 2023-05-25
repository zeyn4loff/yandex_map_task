<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeService
{
  public function __invoke(): RedirectResponse|View
  {
    if (Auth::check()) {
      return redirect()->route('dashboard.get');
    }

    return view('home');
  }
}