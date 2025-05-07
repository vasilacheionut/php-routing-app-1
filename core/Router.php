<?php

class Router
{
    private $routes = [];

    public function get($uri, $callback)
    {
        $this->addRoute('GET', $uri, $callback);
    }

    public function post($uri, $callback)
    {
        $this->addRoute('POST', $uri, $callback);
    }

    private function addRoute($method, $uri, $callback)
    {
        $uri = rtrim($uri, '/'); // elimină slashul final
        $this->routes[$method][] = [
            'uri' => $uri,
            'callback' => $callback,
            'pattern' => $this->convertUriToRegex($uri),
        ];
    }

    private function convertUriToRegex($uri)
    {
        // Transformă /user/{id} în regex: #^/user/([^/]+)$#
        /*         return '#^' . preg_replace('/\{[^}]+\}/', '([^/]+)', $uri) . '$#'; */
        return '#^' . preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<\1>[^/]+)', $uri) . '$#';
    }

    public function resolve($method, $uri)
    {
        $uri = rtrim($uri, '/'); // uniformizare
        $routes = $this->routes[$method] ?? [];

        foreach ($routes as $route) {
            if (preg_match($route['pattern'], $uri, $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (!is_int($key)) {
                        $params[] = $value;
                    }
                }
                return call_user_func_array($route['callback'], $params);
            }
        }

        // Dacă nicio rută nu se potrivește
        http_response_code(404);
        require_once __DIR__ . '/../views/404.php';
    }
}

/*
Explicație: Salvează și apelează funcțiile definite în routes/web.php, în funcție de URL și metodă.
Explanation: Saves and calls the functions defined in routes/web.php, depending on the URL and method.
*/