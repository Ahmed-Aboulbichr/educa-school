<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveauEtudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `niveau_etudes` (`intitule`)
        VALUES
        ('BAC'),('BAC+1'),('BAC+2'),('BAC+3'),('BAC+4'),('BAC+5')");
    }
}
