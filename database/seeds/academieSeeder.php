<?php

use Illuminate\Database\Seeder;

class academieSeeder extends Seeder
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
        ('Sous-massa'),('Béni mellal-khénifra'),('Casablanca-settat'),('Eddakhla-oued eddahab'),('Fès - meknès'),('Drâa-tafilalet'),('Laayoune-sakia el hamra'),('Marrakech - safi'),
        ('Rabat - salé - kénitra'),('Tanger-tetouan-al hoceima'),('Guelmim-oued noun'),('Oujda'),('Bac etranger')");
    }
}
