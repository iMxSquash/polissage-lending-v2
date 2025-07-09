<?php

namespace App\Utils;

class Validator
{
    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validateRequired($value)
    {
        return !empty(trim($value));
    }

    public static function validateLength($value, $min, $max = null)
    {
        $length = strlen(trim($value));
        if ($length < $min) return false;
        if ($max !== null && $length > $max) return false;
        return true;
    }

    public static function validatePhone($phone)
    {
        $pattern = '/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/';
        return preg_match($pattern, $phone);
    }

    public static function sanitizeString($string)
    {
        return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
    }

    public static function sanitizeEmail($email)
    {
        return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    }
}
