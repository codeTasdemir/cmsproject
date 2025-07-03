<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'kullanıcı yönetimi']);
        Permission::create(['name' => 'rol yönetimi']);
        Permission::create(['name' => 'içerik düzenleme']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['kullanıcı yönetimi', 'rol yönetimi', 'içerik düzenleme']);

        $editorRole = Role::create(['name' => 'editor']);
        $editorRole->givePermissionTo('içerik düzenleme');

       // 🔐 Admin Kullanıcısı
       $admin = User::create([
        'name' => 'Admin Kullanıcısı',
        'email' => 'test@test.com',
        'password' => Hash::make('123456'),
    ]);

    $admin->assignRole($adminRole);
    }
}
