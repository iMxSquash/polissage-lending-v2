<?php

namespace App\Models;

class Review
{
    public $id;
    public $name;
    public $rating;
    public $comment;
    public $date;

    public static function getAll()
    {
        // Sample data - in real app would come from database
        return [
            [
                'id' => 1,
                'name' => 'Jean Dupont',
                'rating' => 5,
                'comment' => 'Excellente formation, très professionnelle',
                'date' => '2024-12-15'
            ],
            [
                'id' => 2,
                'name' => 'Marie Martin',
                'rating' => 5,
                'comment' => 'J\'ai appris énormément de techniques',
                'date' => '2024-12-10'
            ],
            [
                'id' => 3,
                'name' => 'Pierre Durand',
                'rating' => 4,
                'comment' => 'Très bon contenu pédagogique',
                'date' => '2024-12-05'
            ]
        ];
    }

    public static function getAverageRating()
    {
        $reviews = self::getAll();
        $total = 0;
        $count = count($reviews);

        foreach ($reviews as $review) {
            $total += $review['rating'];
        }

        return $count > 0 ? round($total / $count, 1) : 0;
    }
}
