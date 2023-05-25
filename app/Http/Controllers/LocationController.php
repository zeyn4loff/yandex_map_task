<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationStoreRequest;
use App\Http\Requests\LocationUpdateRequest;
use App\Models\Location;
use App\Services\LocationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LocationController extends Controller
{
  protected LocationService $locationService;

  public function __construct(LocationService $locationService)
  {
    $this->locationService = $locationService;
  }

  public function store(LocationStoreRequest $request): RedirectResponse
  {
    return $this->locationService->store($request);
  }

  public function edit($id): View
  {
    return $this->locationService->edit($id);
  }

  public function update($id, LocationUpdateRequest $request): RedirectResponse
  {
    return $this->locationService->update($id, $request);
  }

  public function destroy(Location $location)
  {
    return $this->locationService->destroy($location);
  }
}
