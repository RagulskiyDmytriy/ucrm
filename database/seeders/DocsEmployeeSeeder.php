<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocsEmployee;

class DocsEmployeeSeeder extends Seeder
{
    public function run(): void
    {
        DocsEmployee::factory()->count(10)->create();
    }
}
