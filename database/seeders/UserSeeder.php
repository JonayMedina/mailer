<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $role = Role::where('name', 'Admin')->first();
        User::create([
            'name' => 'Mailer Admin',
            'email' => 'admin@mailer.com',
            'password' => bcrypt('12345678'),
            'city_code' => 58,
            'role_id' => $role->id,
            'phone' => '4127762489',
            'dni' => 46846846,
            'birthday' => $faker->dateTimeThisCentury->format('Y-m-d')
        ]);
        $this->command->info("Created Admin");

        $user_role = Role::where('name', 'User')->first();
        User::create([
            'name' => 'Jonay Medina',
            'email' => 'jin1@g.com',
            'password' => bcrypt('12345678'),
            'city_code' => 58,
            'role_id' => $user_role->id,
            'phone' => '4127762489',
            'dni' => 46846846,
            'birthday' => $faker->dateTimeThisCentury->format('Y-m-d')
        ]);

        $this->command->info("Created User");
    }
}
