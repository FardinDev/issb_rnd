<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'add-users']);
        Permission::create(['name' => 'view-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'add-roles']);
        Permission::create(['name' => 'view-roles']);
        Permission::create(['name' => 'edit-roles']);
        Permission::create(['name' => 'delete-roles']);
        Permission::create(['name' => 'assign-roles']);

        Permission::create(['name' => 'add-info']);
        Permission::create(['name' => 'view-info']);
        Permission::create(['name' => 'edit-info']);
        Permission::create(['name' => 'delete-info']);


        Permission::create(['name' => 'view-report']);
        Permission::create(['name' => 'export-report']);


        // create roles and assign created permissions
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        // create roles and assign created permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['view-info', 'view-report', 'view-users', 'view-roles', 'add-info', 'export-report', 'add-users', 'add-roles', 'edit-info', 'edit-users', 'edit-roles']);

        // this can be done as separate statements
        $role = Role::create(['name' => 'observer']);
        $role->givePermissionTo(['view-info', 'view-report', 'view-users', 'view-roles']);

        // or may be done by chaining
        $role = Role::create(['name' => 'oparator'])
            ->givePermissionTo(['add-info', 'edit-info', 'view-info']);

    }
}