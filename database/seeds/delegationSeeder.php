<?php

use Illuminate\Database\Seeder;

class delegationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert("INSERT INTO `delegations` (`name`) 
        VALUES
        ('Tangier'),('Tetouan'),('Al Hoceima'),('Nador'),('Oujda'),('Kenitra'),('Rabat'),('Khemissat'),
        ('Taza'),('Mohammedia'),('Casablanca'),('Benslimane'),('Fez'),('El Jadida'),('Settat'),('Meknes'),
        ('Safi'),('Khouribga'),('Beni Mellal'),('Marrakesh'),('Errachidia'),('Ouarzazate'),('Agadir'),('Tiznit'),
        ('Laayoune'),('Es-Semara'),('Boujdour'),('Dakhla'),('Essaouira'),('Autre delegation ')");
    }
}
