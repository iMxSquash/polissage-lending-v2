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

        $this->viewRenderer->render('pages/home', [
            'title' => 'Polissage Lending - Formation Detailing',
            'courses' => $courses,
            'reviews' => $reviews
        ]);
    }
}
