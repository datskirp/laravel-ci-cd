<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'type' => 'warranty',
                'cost' => 40,
                'deadline' => 365,
                'category' => 'Tvs',
            ],
            [
                'type' => 'delivery',
                'cost' => 20,
                'deadline' => 5,
                'category' => 'Tvs',
            ],
            [
                'type' => 'install',
                'cost' => 10,
                'deadline' => 5,
                'category' => 'Tvs',
            ],
            [
                'type' => 'configure',
                'cost' => 10,
                'deadline' => 5,
                'category' => 'Tvs',
            ],
            [
                'type' => 'warranty',
                'cost' => 30,
                'deadline' => 365,
                'category' => 'Laptops',
            ],
            [
                'type' => 'delivery',
                'cost' => 10,
                'deadline' => 5,
                'category' => 'Laptops',
            ],
            [
                'type' => 'install',
                'cost' => 10,
                'deadline' => 5,
                'category' => 'Laptops',
            ],
            [
                'type' => 'configure',
                'cost' => 10,
                'deadline' => 5,
                'category' => 'Laptops',
            ],
            [
                'type' => 'warranty',
                'cost' => 40,
                'deadline' => 365,
                'category' => 'Fridges',
            ],
            [
                'type' => 'delivery',
                'cost' => 30,
                'deadline' => 5,
                'category' => 'Fridges',
            ],
            [
                'type' => 'install',
                'cost' => 10,
                'deadline' => 5,
                'category' => 'Fridges',
            ],
            [
                'type' => 'configure',
                'cost' => 10,
                'deadline' => 5,
                'category' => 'Fridges',
            ],
            [
                'type' => 'warranty',
                'cost' => 20,
                'deadline' => 365,
                'category' => 'Mobile phones',
            ],
            [
                'type' => 'delivery',
                'cost' => 10,
                'deadline' => 5,
                'category' => 'Mobile phones',
            ],
            [
                'type' => 'install',
                'cost' => 10,
                'deadline' => 5,
                'category' => 'Mobile phones',
            ],
            [
                'type' => 'configure',
                'cost' => 10,
                'deadline' => 5,
                'category' => 'Mobile phones',
            ],

        ];
        DB::table('services')->insert($services);
    }
}
