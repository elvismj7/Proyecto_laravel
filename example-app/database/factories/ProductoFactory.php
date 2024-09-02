<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nombre' => $this->faker->word(),
            'PrecioUnitario' => $this->faker->numberBetween(1, 1000),
            'stock' => $this->faker->numberBetween(0, 100),
            'Descripcion' => $this->faker->sentence(),
        ];
    }
}
