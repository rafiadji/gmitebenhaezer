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

        // ibadah
        $create_ibadah = Permission::create(['name' => 'create ibadah']);
        $read_ibadah = Permission::create(['name' => 'read ibadah']);
        $update_ibadah = Permission::create(['name' => 'update ibadah']);
        $delete_ibadah = Permission::create(['name' => 'delete ibadah']);

        // katibadah
        $create_katibadah = Permission::create(['name' => 'create katibadah']);
        $read_katibadah = Permission::create(['name' => 'read katibadah']);
        $update_katibadah = Permission::create(['name' => 'update katibadah']);
        $delete_katibadah = Permission::create(['name' => 'delete katibadah']);

        // keuangan
        $create_keuangan = Permission::create(['name' => 'create keuangan']);
        $read_keuangan = Permission::create(['name' => 'read keuangan']);
        $update_keuangan = Permission::create(['name' => 'update keuangan']);
        $delete_keuangan = Permission::create(['name' => 'delete keuangan']);

        // setkeuangan
        $create_setkeuangan = Permission::create(['name' => 'create setkeuangan']);
        $read_setkeuangan = Permission::create(['name' => 'read setkeuangan']);
        $update_setkeuangan = Permission::create(['name' => 'update setkeuangan']);
        $delete_setkeuangan = Permission::create(['name' => 'delete setkeuangan']);

        // setmajelis
        $create_setmajelis = Permission::create(['name' => 'create setmajelis']);
        $read_setmajelis = Permission::create(['name' => 'read setmajelis']);
        $update_setmajelis = Permission::create(['name' => 'update setmajelis']);
        $delete_setmajelis = Permission::create(['name' => 'delete setmajelis']);

        // setkegiatan
        $create_setkegiatan = Permission::create(['name' => 'create setkegiatan']);
        $read_setkegiatan = Permission::create(['name' => 'read setkegiatan']);
        $update_setkegiatan = Permission::create(['name' => 'update setkegiatan']);
        $delete_setkegiatan = Permission::create(['name' => 'delete setkegiatan']);

        $admin_user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'  => bcrypt('admin123')
        ]);

        $majelis_user = User::create([
            'name' => 'Eriech',
            'email' => 'eriech@gmail.com',
            'password'  => bcrypt('majelis123')
        ]);

        $admin->givePermissionTo($create_jemaat, $read_jemaat, $update_jemaat, $delete_jemaat);
        $admin->givePermissionTo($create_sidi, $read_sidi, $update_sidi, $delete_sidi);
        $admin->givePermissionTo($create_nikah, $read_nikah, $update_nikah, $delete_nikah);
        $admin->givePermissionTo($create_baptis, $read_baptis, $update_baptis, $delete_baptis);
        $admin->givePermissionTo($create_pengumuman, $read_pengumuman, $update_pengumuman, $delete_pengumuman);
        $admin->givePermissionTo($create_ibadah, $read_ibadah, $update_ibadah, $delete_ibadah);
        $admin->givePermissionTo($create_katibadah, $read_katibadah, $update_katibadah, $delete_katibadah);
        $admin->givePermissionTo($create_keuangan, $read_keuangan, $update_keuangan, $delete_keuangan);
        $admin->givePermissionTo($create_setkeuangan, $read_setkeuangan, $update_setkeuangan, $delete_setkeuangan);
        $admin->givePermissionTo($create_setmajelis, $read_setmajelis, $update_setmajelis, $delete_setmajelis);
        $admin->givePermissionTo($create_setkegiatan, $read_setkegiatan, $update_setkegiatan, $delete_setkegiatan);

        $majelis->givePermissionTo($create_jemaat, $read_jemaat, $update_jemaat, $delete_jemaat);
        $majelis->givePermissionTo($create_sidi, $read_sidi, $update_sidi, $delete_sidi);
        $majelis->givePermissionTo($create_nikah, $read_nikah, $update_nikah, $delete_nikah);
        $majelis->givePermissionTo($create_baptis, $read_baptis, $update_baptis, $delete_baptis);
        $majelis->givePermissionTo($create_pengumuman, $read_pengumuman, $update_pengumuman, $delete_pengumuman);
        $majelis->givePermissionTo($create_ibadah, $read_ibadah, $update_ibadah, $delete_ibadah);
        $majelis->givePermissionTo($create_katibadah, $read_katibadah, $update_katibadah, $delete_katibadah);
        $majelis->givePermissionTo($create_keuangan, $read_keuangan, $update_keuangan, $delete_keuangan);
        $majelis->givePermissionTo($create_setkeuangan, $read_setkeuangan, $update_setkeuangan, $delete_setkeuangan);
        $majelis->givePermissionTo($create_setmajelis, $read_setmajelis, $update_setmajelis, $delete_setmajelis);
        $majelis->givePermissionTo($create_setkegiatan, $read_setkegiatan, $update_setkegiatan, $delete_setkegiatan);

        $staff->givePermissionTo($create_jemaat, $read_jemaat, $update_jemaat);
        $staff->givePermissionTo($create_sidi, $read_sidi, $update_sidi);
        $staff->givePermissionTo($create_nikah, $read_nikah, $update_nikah);
        $staff->givePermissionTo($create_baptis, $read_baptis, $update_baptis);
        $staff->givePermissionTo($create_pengumuman, $read_pengumuman, $update_pengumuman);
        $staff->givePermissionTo($create_ibadah, $read_ibadah, $update_ibadah);
        $staff->givePermissionTo($create_katibadah, $read_katibadah, $update_katibadah);
        $staff->givePermissionTo($create_keuangan, $read_keuangan, $update_keuangan);
        $staff->givePermissionTo($create_setkeuangan, $read_setkeuangan, $update_setkeuangan);

        $jemaat->givePermissionTo($read_jemaat);
        $jemaat->givePermissionTo($read_sidi);
        $jemaat->givePermissionTo($read_nikah);
        $jemaat->givePermissionTo($read_baptis);
        $jemaat->givePermissionTo($read_pengumuman);
        $jemaat->givePermissionTo($read_ibadah);
        $jemaat->givePermissionTo($read_keuangan);

        $admin_user->assignRole($admin);
        $majelis_user->assignRole($majelis);
    }
}
