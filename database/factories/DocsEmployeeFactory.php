<?php

namespace Database\Factories;

use App\Models\DocsEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<DocsEmployee>
 */
class DocsEmployeeFactory extends Factory
{
    protected $model = DocsEmployee::class;

    public function definition(): array
    {
        // Создаем запись в employee вручную
        $employee_id = DB::table('employee')->insertGetId([
            'employee_name' => $this->faker->name(),
        ]);

        // Создаем запись в docs вручную
        $docs_id = DB::table('docs')->insertGetId([
            'docs_hash' => $this->faker->sha1(),
            'docs_name' => $this->faker->word(),
            'abstract' => $this->faker->sentence(),
            'date_created' => now(),
            'date_updated' => now(),
        ]);

        return [
            'docs_id' => $docs_id,
            'employee_id' => $employee_id,
            'position_id' => null,
            'signed' => $this->faker->boolean(),
        ];
    }
}
