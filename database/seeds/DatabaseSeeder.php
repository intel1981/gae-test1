<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TiposTableSeeder::class);
        $this->call(NivelesTableSeeder::class);
        $this->call(ServiciosTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(EscuelasTableSeeder::class);
        $this->call(CiclosTableSeeder::class);
        //$this->call(GradosTableSeeder::class);

    }
}
