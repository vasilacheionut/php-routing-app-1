<?php

$router->get('/', function () {
    require __DIR__ . '/../views/welcome.php';
});

$router->get('/about', function () {
    require __DIR__ . '/../views/about.php';
});

$router->get('/user/{id}', function ($id) {
    echo "Profil utilizator cu ID: $id";
});

$router->get('/user/{id}/edit', function ($id) {
    echo "Editează utilizatorul cu ID: $id";
});

$router->get('/user/{id}/edit', function ($id) {
    echo "Editează utilizatorul cu ID: $id";
});

$router->get('/post/{category}/{slug}', function ($category, $slug) {
    echo "Post din categoria $category, slug: $slug";
});

$router->get('/post/{slug}', function ($slug) {
    echo "Articol cu slug: $slug";
});


/*
Explicație: Definim două rute simple — una pentru / și una pentru /about.
Explanation: We define two simple routes — one for / and one for /about.
*/