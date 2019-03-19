<?php

use Illuminate\Database\Seeder;
use App\Models\Ciclo;

class CiclosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inicio = 1998;
        $fin = 1999;
        foreach(range(1,20) as $i){
            Ciclo::create([
                'inicio' => $inicio,
                'fin'    => $fin,
                'status' => true
            ]);
            $inicio++;
            $fin++;
        }
    }
}
