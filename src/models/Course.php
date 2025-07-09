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
        // Sample data - in real app would come from database
        return [
            [
                'id' => 1,
                'title' => 'Formation Detailing Complet',
                'description' => 'Formation complète au detailing automobile',
                'duration' => '3 jours',
                'price' => 599,
                'image' => '/images/course1.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Polissage Professionnel',
                'description' => 'Techniques avancées de polissage',
                'duration' => '2 jours',
                'price' => 399,
                'image' => '/images/course2.jpg'
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
