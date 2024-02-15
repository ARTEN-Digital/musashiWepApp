<?php

namespace Database\Seeders;

use App\Models\Process;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Process::query()->delete();
        // Define tus unidades personalizadas y sus valores aquí
        $data = [
            'Gestión de Recursos Humanos' => [1],
            'Gestión Financiera' => [2],
            'Gestión de Operaciones' => [3],
            'Gestión de Ventas y Marketing' => [4],
            'Gestión de Proyectos' => [5],
            'Atención al Cliente' => [6],
            'Tecnologías de la Información' => [7],
            'Investigación y Desarrollo' => [8],
        ];

        $dataNames = [];
        foreach ($data as $unit => $value) {
            // Comprueba si la unidad ya se ha creado
            if (!in_array($unit, $dataNames)) {
                // Crea un registro de unidad
                Process::factory()->create([
                    'id' => $value[0],
                    'name' => $unit,
                    'number_process' => $value[0] . '.' . $value[0],
                ]);
                // Agrega el nombre de la unidad al array para evitar duplicados
                $dataNames[] = $unit;
            }
        }
    }
}
