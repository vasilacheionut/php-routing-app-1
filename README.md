# Mini PHP Framework - Simple Routing System

This project is a simple example of a PHP application that implements a routing system from scratch, without external frameworks.

## Project Structure

```
/php-routing-app
│
├── public/
│ └── index.php # Application entry point
│
├── routes/
│ └── web.php # File where routes are defined
│
├── core/
│ ├── Router.php # Class that handles routes (GET, POST)
│ └── Request.php # Class that gets the HTTP request method and path
│
├── views/
│ ├── 404.php # Page displayed for non-existent routes
│ ├── about.php # Display page when accessing /about
│ ├── menu.php # Display menu
│ └── welcome.php # Display page when accessing /

```

## Create Project Structure
```
Open terminal and create directories:
bash

mkdir php-routing-app
cd php-routing-app

mkdir public routes core views
touch public/index.php routes/web.php core/Router.php core/Request.php views/welcome.php views/about.php views/404.php views/menu.php
```

## How to launch the application

### 1. Make sure you have PHP installed on your system (recommended: PHP 8+)
### 2. Navigate in the terminal to the project folder:
```
bash
cd /opt/lampp/htdocs/php-routing-app
```
### 3. Run the internal PHP server:
```
bash
php -S localhost:8000 -t public
```
### 4. Access the application in the browser at:
```
http://localhost:8000 → you will see the welcome message from welcome.php
http://localhost:8000/about → you will see the message from the "about.php" page
http://localhost:8000/something → you will see a 404 message from the "404.php" if  request `/something` does not exist
```

## 📘 Essential Explanations

### 1. What does `public/index.php` do?
```
public/index.php – The starting point (Front Controller)

Includes the Router and Request classes.

Creates a $router object, which receives the Request object.

Loads the web.php file — where the routes are defined.

Runs $router->resolve() — looks for a matching route and executes it.

Think of index.php as the main gateway: all traffic enters through here.
It is the entry point of the application. It includes the main classes, loads the routes, and calls the `resolve()` method to respond to the user's request.
```
### 2. What does `core/Request.php` do?
```
core/Request.php – The class that understands what the browser requested

getPath() – returns the part of the URL without the query string.
Ex: /about?id=10 becomes /about

method() – returns get or post (in lowercase).
The Request class is like a messenger that says: “The user requested page X, with method Y”.
```
### 3. What does `core/Router.php` do?
```
It stores routes based on method (get or post).
The get() and post() methods save the route and the function to be executed.

What is the difference between `$router->get()` and `$router->post()`?

- `get()` is used to display pages
- `post()` is used to process forms or send data

resolve() checks:

The requested method (GET/POST)

The URL path

If the route exists, it executes it.

If not, it returns a 404 page.

The router gets a destination and decides what to return.
```
### 4. What does `routes/web.php` do?
```
When someone accesses /, welcome.php is loaded.

/about just returns some text.
Here you declare: "If the URL is this, do this."

$router->get('/', function () {
require __DIR__ . '/../views/welcome.php';
});

$router->get('/about', function () {
require __DIR__ . '/../views/about.php';
});
```

### 5. What happens if the route doesn't exist?
```
http://localhost:8000/something

It returns a 404 and displays the file `views/404.php`.

```

## 🧪 Testing
```
- Access: `http://localhost:8000/`
- Test the routes `/about`, `/contact`
- Try a non-existent route: `/something` → you will see the 404 page
```

## ✍️ Created by
```
Vasilache Ionuț
Email: vasilacheorionut@gmail.com

This project was built step by step to learn routing in PHP, without a framework.
```
