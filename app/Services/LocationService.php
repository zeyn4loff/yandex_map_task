<?php

namespace App\Services;

use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class LocationService
{
  public function store($data): RedirectResponse
  {
    Location::create([
      'user_id' => auth()->id(),
      'name' => $data->get('name'),
      'longitude' => $data->get('longitude'),
      'latitude' => $data->get('latitude'),
    ]);

    return redirect()->route('dashboard.get')->with('success', '👍 Added.');
  }

  public function edit($id): View|RedirectResponse
  {
    $location = Location::findOrFail($id);
    if (Gate::denies('update', $location)) {
      return redirect()->route('dashboard.get')->with('error', '😠 You do not have access.');
    }
    return view('location-edit', ['location' => $location]);
  }

  public function update($id, $data): RedirectResponse
  {
    $location = Location::findOrFail($id);
    if (Gate::denies('update', $location)) {
      return redirect()->route('dashboard.get')->with('error', '😠 You do not have access.');
    }
    $location->update($data->validated());
    return redirect()->route('dashboard.get')->with('success', '👍 Updated.');
  }

  public function destroy(Location $location): RedirectResponse
  {
    if (Gate::denies('delete', $location)) {
      return redirect()->route('dashboard.get')->with('error', '😠 You do not have access.');
    }
    $location->delete();
    return redirect()->route('dashboard.get')->with('success', '👍 Deleted.');
  }
}