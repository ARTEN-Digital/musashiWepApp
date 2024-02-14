<?php

namespace Database\Seeders;

use App\Models\Usertype;
use Illuminate\Database\Seeder;

class UsertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usertype::factory()
        //     ->count(5)
        //     ->create();

        // Al ser una tabla fija eliminamos todo ya que los id siempre deben ser los mismo y no estar cambiando o nos causara problemas de validaciones
        Usertype::query()->delete();
        // Define tus unidades personalizadas y sus valores aquí
        $data = [
            'Administrador' => [1],
            'Capacitador' => [2],
            'Líder' => [3],
            'Evaluador' => [4],
            'Operador' => [5],
        ];
        // Almacena los nombres de las unidades para evitar duplicados
        $dataNames = [];
        foreach ($data as $unit => $value) {
            // Comprueba si la unidad ya se ha creado
            if (!in_array($unit, $dataNames)) {
                // Crea un registro de unidad
                Usertype::factory()->create([
                    'id' => $value[0],
                    'name' => $unit,
                ]);
                // Agrega el nombre de la unidad al array para evitar duplicados
                $dataNames[] = $unit;
            }
        }
    }
}
