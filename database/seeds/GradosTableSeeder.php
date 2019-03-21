<?php

use Illuminate\Database\Seeder;
use App\Models\Grado;

class GradosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::create([
            'escuela_id' => 1,
            'nombre' => 'Principiante',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 1,
            'nombre' => 'Intermedio',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 1,
            'nombre' => 'Avanzado',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);

        Grado::create([
            'escuela_id' => 2,
            'nombre' => 'Primer Grado',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 2,
            'nombre' => 'Segundo Grado',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 2,
            'nombre' => 'Tercer Grado',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 2,
            'nombre' => 'Cuarto Grado',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 2,
            'nombre' => 'Quinto Grado',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 2,
            'nombre' => 'Sexto Grado',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);

        Grado::create([
            'escuela_id' => 3,
            'nombre' => 'Primer Grado',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 3,
            'nombre' => 'Segundo Grado',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 3,
            'nombre' => 'Tercer Grado',
            'semestre' => '',
            'especialidad' => '',
            'status' => true
        ]);

        Grado::create([
            'escuela_id' => 4,
            'nombre' => 'Primer Grado',
            'semestre' => 'Primer Semestre',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 4,
            'nombre' => 'Primer Grado',
            'semestre' => 'Segundo Semestre',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 4,
            'nombre' => 'Segundo Grado',
            'semestre' => 'Tercer Semestre',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 4,
            'nombre' => 'Segundo Grado',
            'semestre' => 'Cuarto Semestre',
            'especialidad' => '',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 4,
            'nombre' => 'Tercer Grado',
            'semestre' => 'Quinto Semestre',
            'especialidad' => 'Especialidad 1',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 4,
            'nombre' => 'Tercer Grado',
            'semestre' => 'Quinto Semestre',
            'especialidad' => 'Especialidad 2',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 4,
            'nombre' => 'Tercer Grado',
            'semestre' => 'Quinto Semestre',
            'especialidad' => 'Especialidad 3',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 4,
            'nombre' => 'Tercer Grado',
            'semestre' => 'Sexto Semestre',
            'especialidad' => 'Especialidad 1',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 4,
            'nombre' => 'Tercer Grado',
            'semestre' => 'Sexto Semestre',
            'especialidad' => 'Especialidad 2',
            'status' => true
        ]);
        Grado::create([
            'escuela_id' => 4,
            'nombre' => 'Tercer Grado',
            'semestre' => 'Sexto Semestre',
            'especialidad' => 'Especialidad 3',
            'status' => true
        ]);
    }
}
