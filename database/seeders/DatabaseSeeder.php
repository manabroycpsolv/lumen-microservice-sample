<?php

namespace Database\Seeders;

use App\Models\SampleData;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SampleData::factory()
            ->count(150)
            ->create();
    }
}
