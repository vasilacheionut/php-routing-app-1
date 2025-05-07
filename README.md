# Mini PHP Framework - Simple Routing System

This project is based on php-routing-app

# Pornește serverul PHP cu root-ul în /public și router-ul personalizat
php -S localhost:8000 -t public public/router.php

## Project Structure

```
/php-routing-app
│
├── public/
│ ├── router.php # 
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
├── start.sh
├── README.md
│
```

