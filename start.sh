#!/bin/bash

# Schimbă directorul curent în directorul proiectului (dacă e nevoie)
cd "$(dirname "$0")"

# Pornește serverul PHP cu root-ul în /public și router-ul personalizat
php -S localhost:8000 -t public public/router.php
