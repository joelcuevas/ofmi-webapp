<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contest;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contest+>
 */
class ContestFactory extends Factory
{
    protected $model = Contest::class;

    public function definition(): array
    {
        return [
            'description' => 'This is markdown',
        ];
    }
}
