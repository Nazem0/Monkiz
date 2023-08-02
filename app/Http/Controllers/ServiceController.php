<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function edit($id)
    {
        $service = Service::find($id);

        return view("admin.services.edit", compact('service'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'image',
        ]);
        $icon = md5(microtime()) . "." . $request->icon->extension();
        Storage::makeDirectory("public/img/services");

        $request->icon->storeAs("public/img/services", $icon);
        Service::create([
            'name' => $validatedData['name'],
            'icon' => $icon,
        ]);
        return back()->with('success', 'Service added successfully');
    }
    public function destroy($id)
    {

        $service = Service::find($id);
        Storage::delete("public/img/services/" . $service->icon);
        $service->destroy($id);
        return back()->with('success', 'Service deleted successfully');

    }
    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'image',
        ]);

        $service->name = $validatedData['name'];

        if ($request->hasFile('icon')) {
            if ($service->icon) {
                Storage::delete("public/img/services" . $service->icon);
            }

            $icon = md5(microtime()) . "." . $request->icon->extension();
            Storage::makeDirectory("public/img/services");

            $request->icon->storeAs("public/img/services", $icon);
            $service->icon = $icon;
        }

        $service->save();

        return back()->with('success', 'Service updated successfully');
    }
}
