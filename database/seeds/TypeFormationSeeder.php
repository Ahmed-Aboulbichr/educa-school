<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeFormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `type_formations` (`intitule`)
         VALUES
         ('Mastre'),('LP'),('LF'),('Master spécialisé')");
    }
}
