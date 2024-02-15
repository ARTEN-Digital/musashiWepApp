<?php

namespace Database\Factories;

use App\Models\Equipament;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipament::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'Llaves' => [1],
            'Martillos' => [2],
            'Alicates' => [3],
            'Destornilladores' => [4],
            'Sierras' => [5],
            'Tornos' => [6],
            'Fresadoras' => [7],
            'Rectificadoras' => [8],
            'Soldadoras eléctricas' => [9],
            'Soldadoras de arco' => [10],
            'Sopletes de soldadura' => [11],
            'Cuchillas' => [12],
            'Cizallas' => [13],
            'Cuchillos' => [14],
            'Andamios' => [15],
            'Marcos' => [16],
            'Estanterías' => [17],
            'Cascos de seguridad' => [18],
            'Guantes de seguridad' => [19],
            'Botas de seguridad' => [20],
        ];
        $unit = $this->faker->randomElement(array_keys($data));
        return [
            'id' => $data[$unit][0],
            'name' => $unit,
        ];
    }
}
