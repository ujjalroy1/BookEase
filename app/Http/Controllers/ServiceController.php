<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
public function home()
{
    return response()->json([
        'app_name' => 'BookEase',
        'description' => 'BookEase is a platform for booking buses and hotels created by Ujjal Roy.',
        'routes' => [
            'Authentication Routes' => [
                'POST /api/register' => 'Register a new user.',
                'POST /api/login' => 'Login for existing users.'
            ],
            'Admin Routes' => [
                'POST /api/services' => 'Create a new service (Admin only).',
                'PUT /api/services/{id}' => 'Update service details (Admin only).',
                'DELETE /api/services/{id}' => 'Delete a service (Admin only).',
                'GET /api/admin/bookings' => 'View all bookings (Admin only).'
            ],
            'User Routes' => [
                'GET /api/services' => 'List available services (User only).',
                'POST /api/bookings' => 'Book a service (User only).',
                'GET /api/bookings' => 'View user bookings (User only).'
            ]
        ]
    ]);
}


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
