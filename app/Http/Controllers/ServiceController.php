<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //

    public function index()
    {
        return Service::all();
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'room' => 'required|string',
        ]);

        $service = Service::create($validated);

        return response()->json($service, 201);
    }

     public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'type' => 'required|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'room' => 'required|string',
        ]);

        $service->update($validated);

        return response()->json($service);
    }

        public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully']);
    }




}
