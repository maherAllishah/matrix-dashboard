<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $Setting = Setting::query()->firstOrCreate([
            'country' => 'syria',
            'city' => '',
            'phone' => '',
            'email' => '',
            'hours' => '',
        ]);
    }
}
