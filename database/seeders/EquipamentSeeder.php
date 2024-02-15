<?php

namespace Database\Seeders;

use App\Models\Equipament;
use Illuminate\Database\Seeder;

class EquipamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Equipament::query()->delete();
        // Define tus unidades personalizadas y sus valores aquí
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

        $dataNames = [];
        foreach ($data as $unit => $value) {
            // Comprueba si la unidad ya se ha creado
            if (!in_array($unit, $dataNames)) {
                // Crea un registro de unidad
                Equipament::factory()->create([
                    'id' => $value[0],
                    'name' => $unit,
                ]);
                // Agrega el nombre de la unidad al array para evitar duplicados
                $dataNames[] = $unit;
            }
        }
    }
}
