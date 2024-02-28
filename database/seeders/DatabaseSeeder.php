<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $professorRole = Role::create(['name' => 'professor']);
        $studentRole = Role::create(['name' => 'student']);
        $controlMemberRole = Role::create(['name'=>'control-member']);

        $permission = Permission::create(['name'=>'create']);

        $superAdminRole->syncPermissions([]);
        $professorRole->syncPermissions([]);
        $studentRole->syncPermissions([]);
        $controlMemberRole->syncPermissions([]);

        $user = \App\Models\User::updateOrCreate([
            'email' => 'user@test.com',
        ],[
            'name' => 'Test User',
            'phone' => '4924802402',
            'national_no' =>'84340294204229482',
            'password'=>bcrypt(123456)
        ]);
    }
}
