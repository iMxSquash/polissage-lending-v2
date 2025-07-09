<?php

namespace App\Models;

class Course
{
    public $id;
    public $title;
    public $description;
    public $duration;
    public $price;
    public $image;

    public static function getAll()
    {
        return [
            [
                'id' => 1,
                'title' => 'Formation Detailing Complet',
                'description' => 'Formation complète au detailing automobile avec techniques professionnelles',
                'duration' => '3 jours',
                'price' => 599,
                'image' => '/images/course1.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Polissage Professionnel',
                'description' => 'Maîtrisez les techniques avancées de polissage automobile',
                'duration' => '2 jours',
                'price' => 399,
                'image' => '/images/course2.jpg'
            ],
            [
                'id' => 3,
                'title' => 'Protection Céramique',
                'description' => 'Application de revêtements céramiques pour protection longue durée',
                'duration' => '1 jour',
                'price' => 299,
                'image' => '/images/course3.jpg'
            ]
        ];
    }

    public static function getById($id)
    {
        $courses = self::getAll();
        foreach ($courses as $course) {
            if ($course['id'] == $id) {
                return $course;
            }
        }
        return null;
    }
}
