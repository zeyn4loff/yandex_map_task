<?php

namespace App\Http\Controllers;

use App\Services\HomeService;

class HomeController extends Controller
{
  protected HomeService $homeService;

  public function __construct(HomeService $homeService)
  {
    $this->homeService = $homeService;
  }
  public function __invoke()
  {
    return ($this->homeService)();
  }
}