<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Rules\Role;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //---Crear objetos de tipo rol y asignarlos a variables---
        $role_admin = ModelsRole::create(['name' => 'admin']);
        $role_editor = ModelsRole::create(['name' => 'editor']);

        //--crear objetos de tipos permission y asignarlos a variales ----

        $permission_create_role = ModelsPermission::create(['name' => 'create roles']);
        $permission_read_role = ModelsPermission::create(['name' => 'read roles']);
        $permission_update_role = ModelsPermission::create(['name' => 'update roles']);
        $permission_delete_role = ModelsPermission::create(['name' => 'delete roles']);
        $permission_create_lesson = ModelsPermission::create(['name' => 'create lesson']);
        $permission_read_lesson = ModelsPermission::create(['name' => 'read lesson']);
        $permission_update_lesson = ModelsPermission::create(['name' => 'update lesson']);
        $permission_delete_lesson = ModelsPermission::create(['name' => 'delete lesson']);
        $permission_create_category = ModelsPermission::create(['name' => 'create categories']);
        $permission_read_category = ModelsPermission::create(['name' => 'read categories']);
        $permission_update_category = ModelsPermission::create(['name' => 'update categories']);
        $permission_delete_category = ModelsPermission::create(['name' => 'delete categories']);

        //--Agrupar los permisos por rol en arrays ----
        $permissions_admin = [
            $permission_create_role,
            $permission_read_role,
            $permission_update_role,
            $permission_delete_role,
            $permission_create_lesson,
            $permission_read_lesson,
            $permission_update_lesson,
            $permission_delete_lesson,
            $permission_create_category,
            $permission_read_category,
            $permission_update_category,
            $permission_delete_category,
        ];


        $permissions_edit = [
            $permission_create_lesson,
            $permission_read_lesson,
            $permission_update_lesson,
            $permission_delete_lesson,
            $permission_create_category,
            $permission_read_category,
            $permission_update_category,
            $permission_delete_category,
        ];

        //---Asignar a los objetos tipo rol sus permisos con syncPermissions

        $role_admin->syncPermissions($permissions_admin);
        $role_editor->syncPermissions($permissions_edit);
        //$role_editor->givePermissionTo($permission_create_category);
    }
}
