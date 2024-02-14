<?php

namespace Database\Seeders;

use App\Models\Areas;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Areas::factory()
        //     ->count(5)
        //     ->create();

        Areas::query()->delete();
        // Define tus unidades personalizadas y sus valores aquí
        $data = [
            'Dirección' => [1],
            'Administración' => [2],
            'Ventas' => [3],
            'Producción ' => [4],
            'Contabilidad' => [5],
            'Recursos humanos' => [6],
            'Ingeniería' => [7],
        ];

        $dataNames = [];
        foreach ($data as $unit => $value) {
            // Comprueba si la unidad ya se ha creado
            if (!in_array($unit, $dataNames)) {
                // Crea un registro de unidad
                Areas::factory()->create([
                    'id' => $value[0],
                    'name' => $unit,
                ]);
                // Agrega el nombre de la unidad al array para evitar duplicados
                $dataNames[] = $unit;
            }
        }
    }
}
