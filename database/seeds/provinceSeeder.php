<?php

use Illuminate\Database\Seeder;

class provinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `provinces` (`name`) 
        VALUES
        ('Al Hoceima'),('Chefchaouen'),('Fahs-Anjra'),('Larache'),('Ouezzane'),('Tanger-Assilah'),('Tétouan'),('M\'Diq-Fnideq'),
        ('Berkane'),('Driouch'),('Figuig'),('Guercif'),('Jerada'),('Nador'),('Oujda-Angad'),('Taourirt'),('Meknès'),('Boulemane'),
        ('El  Hajeb'),('Fès'),('Ifrane'),('Sefrou'),('Taounate'),('Taza'),('Moulay Yacoub'),('Kénitra'),
        ('Khémisset'),('Salé'),('Sidi Kacem'),('Sidi Slimane'),('Skhirate- Témara')
        ,('Azilal'),('Béni Mellal'),('Fquih Ben Salah'),('Khénifra'),('Khouribga'),
        ('Benslimane'),('Berrechid'),('El Jadida'),('Médiouna'),('Mohammadia'),('Nouaceur'),('Settat'),('Sidi Bennour')
        ,('Al  Haouz'),('Chichaoua'),('El Kelâa des  Sraghna'),('Essaouira'),('Marrakech'),('Rehamna'),('Safi'),('Youssoufia')
        ,('Errachidia'),('Midelt'),('Ouarzazate'),('Tinghir'),('Zagora'),('Aarab Sebbah Gheris')
        ,('Agadir-Ida -Ou-Tanane'),('Chtouka- Ait Baha'),('Inezgane- Ait Melloul'),('Taroudannt'),('Tata'),('Tiznit')
        ,('Assa-Zag'),('Guelmim'),('Sidi Ifni'),('Tan-Tan')
        ,('Boujdour'),('Es-Semara'),('Laâyoune'),('Tarfaya'),('Gueltat Zemmour'),('Jraifia'),('Lamssid')
        ,('Aousserd'),('Oued Ed-Dahab'),('Autre province ')");
    }
   
}
