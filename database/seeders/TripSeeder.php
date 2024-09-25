<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Trip;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Crear algunos vehículos
         $vehicle1 = Vehicle::create([
            'brand' => 'Toyota',
            'model' => 'Corolla',
            'plate' => 'ABC123',
            'license_required' => 'B',
        ]);

        $vehicle2 = Vehicle::create([
            'brand' => 'Ford',
            'model' => 'Focus',
            'plate' => 'XYZ789',
            'license_required' => 'C',
        ]);

        // Crear algunos conductores
        $driver1 = Driver::create([
            'name' => 'Juan',
            'surname' => 'Pérez',
            'license' => 'B',
        ]);

        $driver2 = Driver::create([
            'name' => 'María',
            'surname' => 'González',
            'license' => 'C',
        ]);

        // Crear algunos viajes
        Trip::create([
            'vehicle_id' => $vehicle1->id,
            'driver_id' => $driver1->id,
            'date' => '2024-10-01',
        ]);

        Trip::create([
            'vehicle_id' => $vehicle2->id,
            'driver_id' => $driver2->id,
            'date' => '2024-10-02',
        ]);

        Trip::create([
            'vehicle_id' => $vehicle1->id,
            'driver_id' => $driver2->id,
            'date' => '2024-10-03',
        ]);
    }
}
