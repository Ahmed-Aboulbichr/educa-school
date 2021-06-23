<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class villesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::insert("INSERT INTO `villes` (`id`, `name`, `created_at`, `updated_at`) VALUES
        (1, 'Agadir-Ida -Ou-Tanane', NULL, NULL),
        (41, 'Al  Haouz', NULL, NULL),
        (51, 'Al Hoceima', NULL, NULL),
        (61, 'Meknès', NULL, NULL),
        (66, 'Aousserd', NULL, NULL),
        (71, 'Assa-Zag', NULL, NULL),
        (81, 'Azilal', NULL, NULL),
        (91, 'Béni Mellal', NULL, NULL),
        (111, 'Benslimane', NULL, NULL),
        (113, 'Berkane', NULL, NULL),
        (117, 'Berrechid', NULL, NULL),
        (121, 'Boujdour', NULL, NULL),
        (131, 'Boulemane', NULL, NULL),
        (141, 'Casablanca', NULL, NULL),
        (151, 'Chefchaouen', NULL, NULL),
        (161, 'Chichaoua', NULL, NULL),
        (163, 'Chtouka- Ait Baha', NULL, NULL),
        (167, 'Driouch', NULL, NULL),
        (171, 'El  Hajeb', NULL, NULL),
        (181, 'El Jadida', NULL, NULL),
        (191, 'El Kelâa des  Sraghna', NULL, NULL),
        (201, 'Errachidia', NULL, NULL),
        (211, 'Essaouira', NULL, NULL),
        (221, 'Es-Semara', NULL, NULL),
        (227, 'Fahs-Anjra', NULL, NULL),
        (231, 'Fès', NULL, NULL),
        (251, 'Figuig', NULL, NULL),
        (255, 'Fquih Ben Salah', NULL, NULL),
        (261, 'Guelmim', NULL, NULL),
        (265, 'Guercif', NULL, NULL),
        (271, 'Ifrane', NULL, NULL),
        (273, 'Inezgane- Ait Melloul', NULL, NULL),
        (275, 'Jerada', NULL, NULL),
        (281, 'Kénitra', NULL, NULL),
        (291, 'Khémisset', NULL, NULL),
        (301, 'Khénifra', NULL, NULL),
        (311, 'Khouribga', NULL, NULL),
        (321, 'Laâyoune', NULL, NULL),
        (331, 'Larache', NULL, NULL),
        (351, 'Marrakech', NULL, NULL),
        (355, 'Médiouna', NULL, NULL),
        (363, 'Midelt', NULL, NULL),
        (371, 'Mohammadia', NULL, NULL),
        (381, 'Nador', NULL, NULL),
        (385, 'Nouaceur', NULL, NULL),
        (391, 'Oued Ed-Dahab', NULL, NULL),
        (401, 'Ouarzazate', NULL, NULL),
        (405, 'Ouezzane', NULL, NULL),
        (411, 'Oujda-Angad', NULL, NULL),
        (421, 'Rabat', NULL, NULL),
        (427, 'Rehamna', NULL, NULL),
        (431, 'Safi', NULL, NULL),
        (441, 'Salé', NULL, NULL),
        (451, 'Sefrou', NULL, NULL),
        (461, 'Settat', NULL, NULL),
        (467, 'Sidi Bennour', NULL, NULL),
        (473, 'Sidi Ifni', NULL, NULL),
        (481, 'Sidi Kacem', NULL, NULL),
        (491, 'Sidi Slimane', NULL, NULL),
        (501, 'Skhirate- Témara', NULL, NULL),
        (511, 'Tanger-Assilah', NULL, NULL),
        (521, 'Tan-Tan', NULL, NULL),
        (531, 'Taounate', NULL, NULL),
        (533, 'Taourirt', NULL, NULL),
        (537, 'Tarfaya', NULL, NULL),
        (541, 'Taroudannt', NULL, NULL),
        (551, 'Tata', NULL, NULL),
        (561, 'Taza', NULL, NULL),
        (571, 'Tétouan', NULL, NULL),
        (573, 'MDiq-Fnideq', NULL, NULL),
        (577, 'Tinghir', NULL, NULL),
        (581, 'Tiznit', NULL, NULL),
        (585, 'Youssoufia', NULL, NULL),
        (587, 'Zagora', NULL, NULL),
        (591, 'Moulay Yacoub', NULL, NULL),
        (998, 'province non spécifiée', NULL, NULL),
        (999, 'Provinces étrangères', NULL, NULL);
        ");
    }

}
