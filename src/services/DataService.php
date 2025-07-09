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

    public function processDataWithPython($data, $script)
    {
        $config = include SRC_PATH . '/config/config.php';
        $pythonPath = $config['paths']['python_executable'];
        $scriptPath = $config['paths']['python_scripts'] . '/' . $script;

        $jsonData = json_encode($data);
        $tempFile = tempnam(sys_get_temp_dir(), 'data_');
        file_put_contents($tempFile, $jsonData);

        $command = "{$pythonPath} {$scriptPath} {$tempFile}";
        $output = shell_exec($command);

        unlink($tempFile);

        return json_decode($output, true);
    }
}
