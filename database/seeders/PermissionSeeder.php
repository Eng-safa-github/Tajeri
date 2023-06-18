<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =PermissionEnum::cases();
        foreach ($permissions as $permission) {
            Permission::create(["name" => $permission, "guard_name" => "web"]);
        }

       $role= Role::create(['name' => 'super-admin']);

        Role::firstWhere("name",'super-admin')->syncPermissions(array_map(fn($i) => $i->value, PermissionEnum::cases()));
        User::firstWhere('email','superadmin@admin.com')->assignRole($role->id);

    }
}
