<?php

namespace App\Services;

class DataService
{
    public function getCourses()
    {
        $jsonFile = __DIR__ . '/../../data/courses.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            $courses = json_decode($jsonData, true);
            if ($courses !== null) {
                return $courses;
            }
        }
    }

    public function getReviews()
    {
        $jsonFile = __DIR__ . '/../../data/reviews.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            $reviews = json_decode($jsonData, true);
            if ($reviews !== null) {
                return $reviews;
            }
        }
    }

    public function getArticles()
    {
        $jsonFile = __DIR__ . '/../../data/articles.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            $articles = json_decode($jsonData, true);
            if ($articles !== null) {
                return $articles;
            }
        }
    }

    public function getGallery()
    {
        $jsonFile = __DIR__ . '/../../data/gallery.json';
        if (file_exists($jsonFile)) {
            $jsonData = file_get_contents($jsonFile);
            $gallery = json_decode($jsonData, true);
            if ($gallery !== null) {
                return $gallery;
            }
        }
    }
}
