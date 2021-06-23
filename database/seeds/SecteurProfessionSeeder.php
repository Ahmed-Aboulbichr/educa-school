<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecteurProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `secteur_professions` (`id`,`name`)
        VALUES
            (151,'Activités associatives'),
            (413,'Activités des ménages en tant qu\'employeurs de personnel domestique'),
            (170,'Activités extra-territoriales'),
            (110,'Activités immobilières '),
            (152,'Activités récréatives, culturelles et sportives'),
            (120,'Administration publique'),
            (10,'Agriculture, chasse'),
            (150,'Assainissement, voirie et gestion des déchets '),
            (101,'Assurance'),
            (0,'Autres'),
            (33,'Autres industries extractives'),
            (102,'Auxiliaires financiers et d\'assurance '),
            (51,'Captage, traitement et distribution d\'eau'),
            (48,'Cokéfaction, raffinage, industries nucléaires'),
            (72,'Commerce de détail et réparation d\'articles domestiques'),
            (71,'Commerce de gros et intermédiaires du commerce'),
            (70,'Commerce et réparation automobile'),
            (112,'Conseil en systèmes informatiques '),
            (60,'Construction'),
            (47,'Edition, imprimerie, reproduction'),
            (130,'Education'),
            (31,'Extraction d\'hydrocarbures '),
            (30,'Extraction de houille, de lignite et de tourbe'),
            (32,'Extraction, exploitation et enrichissement de minerais métalliques'),
            (410,'Fabrication d\'autres matériels de transport'),
            (401,'Fabrication d\'autres produits minéraux non métalliques'),
            (408,'Fabrication d\'instruments médicaux, de précision d\'optique et d\'horlogerie'),
            (407,'Fabrication d\'équipements de Radio, Télévision et Communication'),
            (405,'Fabrication de machines de bureau et de matériel informatique'),
            (406,'Fabrication de machines et appareils électriques'),
            (404,'Fabrication de machines et équipements'),
            (411,'Fabrication de meubles, industries diverses'),
            (80,'Hôtellerie et restauration'),
            (409,'Industrie automobile'),
            (49,'Industrie chimique'),
            (43,'Industrie de l\'habillement et des fourrures'),
            (41,'Industrie du Tabac'),
            (400,'Industrie du caoutchouc et des plastiques'),
            (44,'Industrie du cuir et de la chaussure'),
            (46,'Industrie du papier et du carton'),
            (42,'Industrie textile'),
            (40,'Industries alimentaires'),
            (100,'Intermédiation financière'),
            (111,'Location sans opérateur'),
            (402,'Métallurgie'),
            (94,'Postes et télécommunications'),
            (50,'Production et distribution d\'électricité, de gaz et de chaleur '),
            (20,'Pêche, aquaculture'),
            (113,'Recherche et développement'),
            (412,'Récupération'),
            (140,'Santé et action sociale'),
            (93,'Services auxiliaires des transports '),
            (160,'Services domestiques'),
            (114,'Services fournis principalement aux entreprises'),
            (153,'Services personnels'),
            (11,'Sylviculture, exploitation forestière '),
            (92,'Transports aériens'),
            (91,'Transports par eau '),
            (90,'Transports terrestres'),
            (403,'Travail des métaux'),
            (45,'Travail du bois et fabrication d\'articles en bois ')

        ");

    }
}
