<?php

namespace App\Services;

class DataService
{
    public function getCourses()
    {
        // Try to load from JSON file first, fallback to hardcoded data
        $jsonFile = __DIR__ . '/../../data/courses.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            $courses = json_decode($jsonData, true);
            if ($courses !== null) {
                return $courses;
            }
        }

        // Fallback to hardcoded data
        return [
            [
                'id' => '1',
                'title' => 'Polissage Débutant',
                'description' => 'Apprenez les bases du polissage automobile avec notre formation complète pour débutants.',
                'duration' => '16 heures',
                'price' => '299',
                'old_price' => null,
                'level' => 'Débutant',
                'category' => 'Polissage',
                'instructor' => 'Jean Dupont',
                'students' => '124',
                'rating' => 5,
                'reviews_count' => '89',
                'image' => 'https://formationdetailing.com/wp-content/uploads/2024/07/formation-au-detailing-auto-et-lavage-lustrage-de-voiture-chez-sp-formation-78-3-scaled.jpg'
            ],
            [
                'id' => '2',
                'title' => 'Polissage Avancé',
                'description' => 'Techniques avancées de polissage et correction pour les professionnels du secteur.',
                'duration' => '24 heures',
                'price' => '499',
                'old_price' => '599',
                'level' => 'Intermédiaire',
                'category' => 'Polissage',
                'instructor' => 'Marie Martin',
                'students' => '78',
                'rating' => 5,
                'reviews_count' => '67',
                'image' => 'https://sp-formation.com/wp-content/uploads/2021/11/formation-polissage-et-renovation-esthetique-auto-a-paris-2-e1656933316358-768x632.jpg'
            ],
            [
                'id' => '3',
                'title' => 'Polissage Professionnel',
                'description' => 'Formation complète pour devenir professionnel du polissage automobile certifié.',
                'duration' => '40 heures',
                'price' => '799',
                'old_price' => '999',
                'level' => 'Avancé',
                'category' => 'Polissage',
                'instructor' => 'Lucie Lefebvre',
                'students' => '156',
                'rating' => 5,
                'reviews_count' => '112',
                'image' => 'https://sp-formation.com/wp-content/uploads/2022/07/formation-aux-metiers-du-detailing-dans-le-78-pres-de-trappes-en-yvelines-chez-sp-formation-9.jpg'
            ]
        ];
    }

    public function getReviews()
    {
        // Try to load from JSON file first, fallback to hardcoded data
        $jsonFile = __DIR__ . '/../../data/reviews.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            $reviews = json_decode($jsonData, true);
            if ($reviews !== null) {
                return $reviews;
            }
        }

        // Fallback to hardcoded data
        return [
            [
                'id' => '1',
                'author' => 'Sophie Leclerc',
                'avatar' => '/images/avatars/sophie-leclerc.jpg',
                'rating' => 5,
                'comment' => "Formation exceptionnelle ! J'ai appris énormément et l'équipe est très professionnelle. Je recommande vivement cette formation à tous ceux qui souhaitent se lancer dans le polissage automobile.",
                'created_at' => '2024-11-20',
                'verified' => true
            ],
            [
                'id' => '2',
                'author' => 'Marc Dubois',
                'avatar' => '/images/avatars/marc-dubois.jpg',
                'rating' => 5,
                'comment' => 'Excellent centre de formation. Les formateurs sont passionnés et très pédagogues. Matériel de qualité et locaux parfaitement équipés.',
                'created_at' => '2024-11-15',
                'verified' => true
            ],
            [
                'id' => '3',
                'author' => 'Anne Moreau',
                'avatar' => '/images/avatars/anne-moreau.jpg',
                'rating' => 4,
                'comment' => "Très bonne formation, j'ai pu rapidement mettre en pratique ce que j'ai appris. Merci à toute l'équipe pour leur accompagnement !",
                'created_at' => '2024-11-10',
                'verified' => true
            ],
            [
                'id' => '4',
                'author' => 'Pierre Martin',
                'avatar' => '/images/avatars/pierre-martin.jpg',
                'rating' => 5,
                'comment' => 'Formation de très haute qualité avec des formateurs experts. Je recommande sans hésitation pour tous les niveaux.',
                'created_at' => '2024-11-05',
                'verified' => true
            ]
        ];
    }

    public function getArticles()
    {
        // Try to load from JSON file first, fallback to hardcoded data
        $jsonFile = __DIR__ . '/../../data/articles.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            $articles = json_decode($jsonData, true);
            if ($articles !== null) {
                return $articles;
            }
        }

        // Fallback to hardcoded data
        return [
            [
                'id' => '1',
                'title' => 'Les 5 erreurs à éviter lors du polissage',
                'content' => 'Découvrez les erreurs les plus communes que font les débutants et comment les éviter pour un résultat professionnel. Dans cet article complet, nous explorons les techniques à maîtriser.',
                'category' => 'Conseils',
                'author' => 'Jean Dupont',
                'author_avatar' => '/images/authors/jean-dupont.jpg',
                'image' => 'https://formationdetailing.com/wp-content/uploads/2024/07/obtenir-une-certification-en-polissage-et-lustrage-automobile-chez-sp-formation-detailing-78-3-scaled.jpg',
                'created_at' => '2024-12-15',
                'views' => 1250,
                'likes' => 89,
                'comments' => 23
            ],
            [
                'id' => '2',
                'title' => 'Quel matériel choisir pour débuter ?',
                'content' => 'Guide complet pour choisir le bon équipement de polissage selon votre budget et vos besoins. Comparatif des meilleures marques et conseils d experts.',
                'category' => 'Matériel',
                'author' => 'Marie Martin',
                'author_avatar' => '/images/authors/marie-martin.jpg',
                'image' => 'https://formationdetailing.com/wp-content/uploads/2022/10/les-outils-pour-un-polissage-auto-reussi.jpg',
                'created_at' => '2024-12-10',
                'views' => 980,
                'likes' => 67,
                'comments' => 15
            ],
            [
                'id' => '3',
                'title' => 'Techniques avancées de correction de peinture',
                'content' => 'Maîtrisez les techniques professionnelles pour corriger les défauts de peinture les plus complexes. Formation avancée avec nos experts certifiés.',
                'category' => 'Techniques',
                'author' => 'Pierre Durand',
                'author_avatar' => '/images/authors/pierre-durand.jpg',
                'image' => 'https://seformerauxmetiersdudetailing.fr/wp-content/uploads/2022/01/Pourquoi-se-former-au-metier-du-polissage-1-1-1024x683.jpg',
                'created_at' => '2024-12-05',
                'views' => 1450,
                'likes' => 112,
                'comments' => 34
            ]
        ];
    }

    public function getGallery()
    {
        // Try to load from JSON file first, fallback to hardcoded data
        $jsonFile = __DIR__ . '/../../data/gallery.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            $gallery = json_decode($jsonData, true);
            if ($gallery !== null) {
                return $gallery;
            }
        }

        // Fallback to hardcoded data
        return [
            [
                'id' => '1',
                'title' => 'Atelier pratique de polissage',
                'description' => "Nos étudiants en action lors d'un atelier pratique",
                'imageUrl' => 'https://sp-formation.com/wp-content/uploads/2022/07/formation-au-nettoyage-automobile-a-paris-2-450x253.jpg.webp'
            ],
            [
                'id' => '2',
                'title' => 'Correction de défauts',
                'description' => 'Démonstration de correction de défauts profonds',
                'imageUrl' => 'https://formationdetailing.com/wp-content/uploads/2024/07/formation-nettoyage-polissage-et-lustrage-automobile-chez-sp-formation-detailing-78-13-scaled.jpg'
            ],
            [
                'id' => '3',
                'title' => 'Résultat final',
                'description' => 'Véhicule après traitement complet',
                'imageUrl' => 'https://formationdetailing.com/wp-content/uploads/2021/05/formation-detailing-formez-vous-a-la-preparation-esthetique-auto.jpg'
            ],
            [
                'id' => '4',
                'title' => 'Techniques avancées',
                'description' => 'Formation aux techniques avancées de lustrage',
                'imageUrl' => 'https://seformerauxmetiersdudetailing.fr/wp-content/uploads/2022/02/apprendre-pour-une-reconversion-pro-le-metier-du-detailing-1-1024x768.jpg'
            ],
            [
                'id' => '5',
                'title' => 'Certification',
                'description' => 'Remise de certificats à nos diplômés',
                'imageUrl' => 'https://maniac-autodetailing.fr/wp-content/uploads/2022/12/MANIAC-AUTO-Detailing-Center-Formation-Stage1-1-1.jpg'
            ],
            [
                'id' => '6',
                'title' => 'Équipement professionnel',
                'description' => 'Notre équipement professionnel de polissage',
                'imageUrl' => 'https://formationdetailing.com/wp-content/uploads/2022/10/les-outils-pour-un-polissage-auto-reussi.jpg'
            ]
        ];
    }
}
