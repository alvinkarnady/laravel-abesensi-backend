<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Company;
use App\Models\Permission;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Alvin Karnady',
            'email' => 'alvin@gmail.com',
            'password' => Hash::make('admin123')
        ]);

        Company::create([
            'name' => 'PT.FIC16',
            'email' => 'alvin@gmail.com',
            'address' => 'Jl. Gunung Latimojong',
            'latitude' => '-7.979797',
            'longitude' => '112.626262',
            'radius_km' => '0.5',
            'time_in' => '08:00',
            'time_out' => '17:00',
        ]);


        $this->call([
            AttendanceSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
