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
        // $this->call(UserSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(JemaatSeeder::class);
        $this->call(KatIbadahSeeder::class);
        $this->call(SetKeuanganSeeder::class);
        $this->call(SetMajelisSeeder::class);
    }
}
