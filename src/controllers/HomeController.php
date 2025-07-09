<?php

namespace App\Controllers;

use App\Services\DataService;
use App\Utils\ViewRenderer;

class HomeController
{
    private $dataService;
    private $viewRenderer;

    public function __construct()
    {
        $this->dataService = new DataService();
        $this->viewRenderer = new ViewRenderer();
    }

    public function index()
    {
        $courses = $this->dataService->getCourses();
        $reviews = $this->dataService->getReviews();
        $articles = $this->dataService->getArticles();
        $gallery = $this->dataService->getGallery();

        $this->viewRenderer->render('pages/home', [
            'title' => 'Formation Polissage Automobile - Experts Certifiés',
            'courses' => $courses,
            'reviews' => $reviews,
            'articles' => $articles,
            'gallery' => $gallery
        ]);
    }
}
