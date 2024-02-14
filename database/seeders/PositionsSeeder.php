<?php

namespace Database\Seeders;

use App\Models\Positions;
use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Positions::query()->delete();
        // Define tus unidades personalizadas y sus valores aquí
        $data = [
            'Director Ejecutivo' => [1],
            'Director Financiero' => [2],
            'Director de Operaciones' => [3],
            'Supervisor de Tecnología' => [4],
            'Director de Marketing' => [5],
            'Director de Recursos Humanos' => [6],
            'Director de Información' => [7],
            'Director de Ventas' => [8],
            'Gerente de Proyectos' => [9],
            'Analista Financiero' => [10],
            'Operador de maquinas' => [11],
        ];

        $dataNames = [];
        foreach ($data as $unit => $value) {
            // Comprueba si la unidad ya se ha creado
            if (!in_array($unit, $dataNames)) {
                // Crea un registro de unidad
                Positions::factory()->create([
                    'id' => $value[0],
                    'name' => $unit,
                ]);
                // Agrega el nombre de la unidad al array para evitar duplicados
                $dataNames[] = $unit;
            }
        }
    }
}
