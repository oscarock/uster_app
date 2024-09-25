<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Trip;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargar los viajes con la información de vehículos y conductores
        $trips = Trip::with(['vehicle', 'driver'])->get();
        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $date = $request->input('date');
        $availableVehicles = Vehicle::whereDoesntHave('trips', function($query) use ($date) {
            $query->where('date', $date);
        })->get();
    
        return view('trips.create', compact('availableVehicles', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'vehicle_id' => 'required|integer|exists:vehicles,id',
            'driver_id' => 'required|integer|exists:drivers,id',
            'date' => 'required|date',
        ]);

        Trip::create($request->all());

        return redirect()->route('trips.index')->with('success', 'Viaje creado exitosamente');
    }

    public function createStepTwo(Request $request)
    {
        $request->validate(['date' => 'required|date']);

        // Solo vehículos que no tienen viaje en esa fecha
        $availableVehicles = Vehicle::whereDoesntHave('trips', function ($query) use ($request) {
            $query->where('date', $request->date);
        })->get();

        return view('trips.create-step-two', compact('availableVehicles', 'request'));
    }

    public function createStepThree(Request $request)
    {
        $request->validate(['date' => 'required|date', 'vehicle_id' => 'required|exists:vehicles,id']);

        $vehicle = Vehicle::find($request->vehicle_id);
        $availableDrivers = Driver::where('license', $vehicle->license_required)
                                ->whereDoesntHave('trips', function ($query) use ($request) {
                                    $query->where('date', $request->date);
                                })->get();

        return view('trips.create-step-three', compact('availableDrivers', 'request', 'vehicle'));
    }
}
