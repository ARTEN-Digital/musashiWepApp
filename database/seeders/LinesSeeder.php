<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lines;

class LinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lines::query()->delete();
        // Define tus unidades personalizadas y sus valores aquí
        $data = [
            'P1 CARRIER' => [1],
            'P4 CARRIER' => [2],
            'P1 RING' => [3],
            'LLCVT' => [4],
            'MCVT' => [5],
            'DIFERENCIAL' => [6],
        ];
        // Almacena los nombres de las unidades para evitar duplicados
        $dataNames = [];
        foreach ($data as $unit => $value) {
            // Comprueba si la unidad ya se ha creado
            if (!in_array($unit, $dataNames)) {
                // Crea un registro de unidad
                Lines::factory()->create([
                    'id' => $value[0],
                    'name' => $unit,
                ]);
                // Agrega el nombre de la unidad al array para evitar duplicados
                $dataNames[] = $unit;
            }
        }
    }
}
