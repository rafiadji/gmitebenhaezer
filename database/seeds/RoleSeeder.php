<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Role
        $admin = Role::create(['name' => 'admin']);
        $majelis = Role::create(['name' => 'majelis']);
        $staff = Role::create(['name' => 'staff']);
        $jemaat = Role::create(['name' => 'jemaat']);

        // Permission
        // Jemaat
        $create_jemaat = Permission::create(['name' => 'create jemaat']);
        $read_jemaat = Permission::create(['name' => 'read jemaat']);
        $update_jemaat = Permission::create(['name' => 'update jemaat']);
        $delete_jemaat = Permission::create(['name' => 'delete jemaat']);

        // sidi
        $create_sidi = Permission::create(['name' => 'create sidi']);
        $read_sidi = Permission::create(['name' => 'read sidi']);
        $update_sidi = Permission::create(['name' => 'update sidi']);
        $delete_sidi = Permission::create(['name' => 'delete sidi']);

        // nikah
        $create_nikah = Permission::create(['name' => 'create nikah']);
        $read_nikah = Permission::create(['name' => 'read nikah']);
        $update_nikah = Permission::create(['name' => 'update nikah']);
        $delete_nikah = Permission::create(['name' => 'delete nikah']);

        // baptis
        $create_baptis = Permission::create(['name' => 'create baptis']);
        $read_baptis = Permission::create(['name' => 'read baptis']);
        $update_baptis = Permission::create(['name' => 'update baptis']);
        $delete_baptis = Permission::create(['name' => 'delete baptis']);

        // pengumuman
        $create_pengumuman = Permission::create(['name' => 'create pengumuman']);
        $read_pengumuman = Permission::create(['name' => 'read pengumuman']);
        $update_pengumuman = Permission::create(['name' => 'update pengumuman']);
        $delete_pengumuman = Permission::create(['name' => 'delete pengumuman']);

        $admin_user = User::create([
            'name' => 'Admin',
            'email' => 'admin@church.com',
            'password'  => bcrypt('admin123')
        ]);

        $majelis_user = User::create([
            'name' => 'Josh Yehezkiel',
            'email' => 'josh@church.com',
            'password'  => bcrypt('majelis123')
        ]);

        $admin->givePermissionTo($create_jemaat, $read_jemaat, $update_jemaat, $delete_jemaat);
        $admin->givePermissionTo($create_sidi, $read_sidi, $update_sidi, $delete_sidi);
        $admin->givePermissionTo($create_nikah, $read_nikah, $update_nikah, $delete_nikah);
        $admin->givePermissionTo($create_baptis, $read_baptis, $update_baptis, $delete_baptis);
        $admin->givePermissionTo($create_pengumuman, $read_pengumuman, $update_pengumuman, $delete_pengumuman);

        $majelis->givePermissionTo($create_jemaat, $read_jemaat, $update_jemaat, $delete_jemaat);
        $majelis->givePermissionTo($create_sidi, $read_sidi, $update_sidi, $delete_sidi);
        $majelis->givePermissionTo($create_nikah, $read_nikah, $update_nikah, $delete_nikah);
        $majelis->givePermissionTo($create_baptis, $read_baptis, $update_baptis, $delete_baptis);
        $majelis->givePermissionTo($create_pengumuman, $read_pengumuman, $update_pengumuman, $delete_pengumuman);

        $staff->givePermissionTo($create_jemaat, $read_jemaat, $update_jemaat);
        $staff->givePermissionTo($create_sidi, $read_sidi, $update_sidi);
        $staff->givePermissionTo($create_nikah, $read_nikah, $update_nikah);
        $staff->givePermissionTo($create_baptis, $read_baptis, $update_baptis);
        $staff->givePermissionTo($create_pengumuman, $read_pengumuman, $update_pengumuman);

        $jemaat->givePermissionTo($read_jemaat);
        $jemaat->givePermissionTo($read_sidi);
        $jemaat->givePermissionTo($read_nikah);
        $jemaat->givePermissionTo($read_baptis);
        $jemaat->givePermissionTo($read_pengumuman);

        $admin_user->assignRole($admin);
        $majelis_user->assignRole($majelis);
    }
}
