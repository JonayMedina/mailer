<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin', 'description' => 'Administrador del Sistema'],
            ['name' => 'User', 'description' => 'Usuario sin privilegios']
        ];

        foreach ($roles as $key => $role) {
            Role::create([
                'name' => $role['name'],
                'description' => $role['description'],
                'active' => 1
            ]);
        }

        $this->command->info("Created Roles");
    }
}
