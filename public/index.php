<?php

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Request.php';

$request = new Request();
$router = new Router($request);


require_once __DIR__ . '/../routes/web.php';

$router->resolve($request->method(), $request->uri());

echo "<pre>";
echo "index.php<br>";
echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "<br>";
echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "<br>";
var_dump($_SERVER);
echo "</pre>";
/*
Explicație: Acesta este fișierul principal care se încarcă. Creează obiectele și pornește routerul.
Explanation: This is the main file that is loaded. It creates the objects and starts the router.
*/
