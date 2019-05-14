<?php

use App\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // escuelas
        Permission::create(['name' => 'escuelas.index']);
        Permission::create(['name' => 'escuelas.create']);
        Permission::create(['name' => 'escuelas.store']);
        Permission::create(['name' => 'escuelas.show']);
        Permission::create(['name' => 'escuelas.edit']);
        Permission::create(['name' => 'escuelas.update']);
        Permission::create(['name' => 'escuelas.destroy']);
        Permission::create(['name' => 'escuelas.delete']);

        // ciclos
        Permission::create(['name' => 'ciclos.index']);
        Permission::create(['name' => 'ciclos.create']);
        Permission::create(['name' => 'ciclos.store']);
        Permission::create(['name' => 'ciclos.show']);
        Permission::create(['name' => 'ciclos.edit']);
        Permission::create(['name' => 'ciclos.update']);
        Permission::create(['name' => 'ciclos.destroy']);
        Permission::create(['name' => 'ciclos.delete']);

        $roleAdmin = Role::create(['name' => 'administrador', 'guard_name' => 'web']);
        $roleAdmin->givePermissionTo(Permission::all());

        //C=Control E=Escolar
        $roleCE = Role::create(['name' => 'control-escolar', 'guard_name' => 'web']);
        $roleCE->givePermissionTo([
            'escuelas.index', 'escuelas.show',
            'ciclos.index', 'ciclos.show'
        ]);

        $userAdmin = User::create([
            'name'     => 'Weyler Antonio Uicab Pat',
            'email'    => 'uicabpatweyler@gmail.com',
            'password' => bcrypt('chaparrita1981')
        ]);

        $userAdmin->assignRole('administrador');

        $userCE = User::create([
            'name'     => 'Jesus Rafael Uicab Ku',
            'email'    => 'intel1981@gmail.com',
            'password' => bcrypt('chaparrita1981')
        ]);

        $userCE->assignRole('control-escolar');


    }
}
