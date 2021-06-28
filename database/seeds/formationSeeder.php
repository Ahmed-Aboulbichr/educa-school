<?php

use Illuminate\Database\Seeder;

class formationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         DB::insert("INSERT INTO `formations` (`name`) 
         VALUES
         ('Mastère'),('LP'),('LF'),('Mastère spécialisé')");
    
    }
}
