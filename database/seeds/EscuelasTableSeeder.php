<?php

use Illuminate\Database\Seeder;
use App\Models\Escuela;

class EscuelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Escuela::create([
            'cct' => '31PPR0379E',
            'nombre' => 'crescencio carrillo y ancona',
            'nivel' => 'Primaria',
            'turno' => 'Matutino',
            'sostenimiento' => 'Privado',
            'status' => true
        ]);
        Escuela::create([
            'cct' => '31PES0080Q',
            'nombre' => 'crescencio carrillo y ancona',
            'nivel' => 'Secundaria',
            'turno' => 'Matutino',
            'sostenimiento' => 'Privado',
            'status' => true
        ]);
        Escuela::create([
            'cct' => '31PBH0024V',
            'nombre' => 'dr. crescencio carrillo y ancona',
            'nivel' => 'Media Superior',
            'turno' => 'Matutino',
            'sostenimiento' => 'Privado',
            'status' => true
        ]);
        Escuela::create([
            'cct' => '23PBT0035N',
            'nombre' => 'academia de ingles irlanda',
            'nivel' => 'Formación para el trabajo',
            'turno' => 'Nocturno',
            'sostenimiento' => 'Privado',
            'status' => true
        ]);
    }
}
