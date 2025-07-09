<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Review;

class DataService
{
    public function getCourses()
    {
        return Course::getAll();
    }

    public function getReviews()
    {
        return Review::getAll();
    }
    public function processDataWithPython($data, $endpoint)
    {
        $pythonApiUrl = $_ENV['PYTHON_API_URL'] ?? 'http://localhost:10000';
        $url = $pythonApiUrl . '/process/' . $endpoint;

        $jsonData = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            return ['error' => 'Python API request failed'];
        }

        return json_decode($response, true);
    }

    public function getProcessedReviews()
    {
        $reviews = $this->getReviews();
        return $this->processDataWithPython(['reviews' => $reviews], 'reviews');
    }

    public function getProcessedCourses()
    {
        $courses = $this->getCourses();
        return $this->processDataWithPython(['courses' => $courses], 'courses');
    }
}
