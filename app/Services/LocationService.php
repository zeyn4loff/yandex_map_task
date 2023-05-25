<?php

namespace App\Services;

use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LocationService
{
  public function store($data): RedirectResponse
  {
    $location = new Location();
    $location::create([
      'user_id' => auth()->id(),
      'name' => $data->get('name'),
      'longitude' => $data->get('longitude'),
      'latitude' => $data->get('latitude'),
    ]);

    return redirect()->route('dashboard.get')->with('success', '👍 Added.');
  }

  public function edit($id): View
  {
    $location = Location::findOrFail($id);
    return view('location-edit')->with(['location' => $location]);
  }

  public function update($id, $data): RedirectResponse
  {

    $location = Location::findOrFail($id);
    $location->update($data->validated());

    return redirect()->route('dashboard.get')->with('success', '👍 Updated.');
  }

  public function destroy(Location $location): RedirectResponse
  {
    $location->delete();
    return redirect()->route('dashboard.get')->with('success', '👍 Deleted.');
  }
}
