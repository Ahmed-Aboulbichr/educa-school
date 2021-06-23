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

        $this->call([SecteurProfessionSeeder::class,academieSeeder::class,delegationSeeder::class,NationaliteSeeder::class,PaySeeder::class,provinceSeeder::class,villesSeeder::class]);
    }
}
