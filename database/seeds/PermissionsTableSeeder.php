<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        Permission::create(['name' => 'works.index']);
        Permission::create(['name' => 'works.show']);
        Permission::create(['name' => 'works.create']);
        Permission::create(['name' => 'works.edit']);
        Permission::create(['name' => 'works.destroy']);
        Permission::create(['name' => 'works.store']);
        Permission::create(['name' => 'works.update']);

        Permission::create(['name' => 'resources.index']);
        Permission::create(['name' => 'resources.show']);
        Permission::create(['name' => 'resources.create']);
        Permission::create(['name' => 'resources.edit']);
        Permission::create(['name' => 'resources.destroy']);
        Permission::create(['name' => 'resources.store']);
        Permission::create(['name' => 'resources.update']);

        Permission::create(['name' => 'calendars.index']);
        Permission::create(['name' => 'calendars.show']);
        Permission::create(['name' => 'calendars.create']);
        Permission::create(['name' => 'calendars.edit']);
        Permission::create(['name' => 'calendars.destroy']);
        Permission::create(['name' => 'calendars.store']);
        Permission::create(['name' => 'calendars.update']);

        Permission::create(['name' => 'admin.edit']);
        Permission::create(['name' => 'admin.edit2']);
        Permission::create(['name' => 'admin.costs']);

        Permission::create(['name' => 'index.reports']);
        Permission::create(['name' => 'index.dashboards']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'supervisor']);
        $role->givePermissionTo(['works.index',
                                 'works.show',
                                 'works.create',
                                 'works.store',
                                 'works.update',
                                 'works.edit',
                                 'works.destroy',
                                 'resources.create',
                                 'resources.store',
                                 'resources.edit',
                                 'resources.update',
                                 'resources.destroy',
                                 'index.reports',
                                 'index.dashboards',
                                 'admin.edit']);

        $role = Role::create(['name' => 'foreman']);
        $role->givePermissionTo(['works.index',
                                 'works.show',
                                 'works.create',
                                 'works.store',
                                 'resources.create',
                                 'resources.store']);

        $role = Role::create(['name' => 'guest'])
            ->givePermissionTo(['works.index',
                                'works.show']);

        $user = User::find(1);
        $user->assignRole('admin');

        $user = User::find(2);
        $user->assignRole('supervisor');

        $user = User::find(3);
        $user->assignRole('foreman');

        $user = User::find(4);
        $user->assignRole('guest');

    }
}
