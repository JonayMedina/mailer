<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/seeders/countries.sql');

        DB::statement($sql);

        $this->command->info("Stored Countries");
    }
}
