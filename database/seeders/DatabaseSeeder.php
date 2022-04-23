<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('permissions')->insert([
            'title' => 'admin_access',
        ]);
        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '1',
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id' => '1'
        ]);
    }
}
