<?php

namespace App\Services;

use App\Models\Location;
use Illuminate\View\View;

class DashboardService
{
  public function __invoke(): View
  {
    $locations = Location::where('user_id', auth()->id())->get();
    return view('dashboard')->with(['locations' => $locations]);
  }
}