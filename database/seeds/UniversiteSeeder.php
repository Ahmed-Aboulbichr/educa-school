<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `universites` (`id`, `intitule`, `created_at`, `updated_at`) VALUES
            (1, 'Université Quaraouiyine Fès\r\n', NULL, NULL),
            (2, 'Université Mohammed V Rabat', NULL, NULL),
            (4, 'Université Hassan II  Casablanca', NULL, NULL),
            (6, 'Université Sidi Mohammed Ben Abdellah Fès\r\n\r\n', NULL, NULL),
            (7, 'Université Cadi Ayyad Marrakech', NULL, NULL),
            (8, 'Université Mohammed Premier Oujda', NULL, NULL),
            (9, 'Université Abdelmalek Essaidi Tétouan', NULL, NULL),
            (10, 'Université Chouaïb Doukkali El Jadida', NULL, NULL),
            (11, 'Université Moulay Ismail Meknès\r\n', NULL, NULL),
            (12, 'Université Ibn Tofail Kenitra', NULL, NULL),
            (13, 'Université IbnouZohr Agadir', NULL, NULL),
            (14, 'Université Hassan I Settat', NULL, NULL),
            (15, 'Université Sultan Moulay Slimane Beni Mellal', NULL, NULL);");
    }
}
