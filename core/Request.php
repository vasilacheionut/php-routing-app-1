<?php
class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) return $path;
        return substr($path, 0, $position);
    }


    public function uri()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) return $path;
        return substr($path, 0, $position);
    }

    public function method()
    {
        return ($_SERVER['REQUEST_METHOD']);
    }
}
/*
Explicație: Obține URL-ul cerut și metoda (GET, POST etc.).
Explanation: Get the requested URL and method (GET, POST, etc.).
*/