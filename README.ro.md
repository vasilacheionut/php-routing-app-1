# Mini PHP Framework - Sistem simplu de rutare

Acest proiect este un exemplu simplu de aplicație PHP care implementează un sistem de rutare de la zero, fără cadre externe.

## Structura proiectului

```
/php-routing-app
│
├── public/
│ └── index.php # Punct de intrare în aplicație
│
├── rute/
│ └── web.php # Fișier în care sunt definite rutele
│
├── de bază/
│ ├── Router.php # Clasa care se ocupă de rute (GET, POST)
│ └── Request.php # Clasa care primește metoda și calea de solicitare HTTP
│
├── vizualizări/
│ ├── 404.php # Pagina afișată pentru rute inexistente
│ ├── about.php # Afișează pagina când accesezi /about
│ ├── meniu.php # Afișează meniul
│ └── welcome.php # Afișează pagina la accesarea /

```

## Creați o structură de proiect
```
Deschideți terminalul și creați directoare:
bash

mkdir php-routing-app
cd php-routing-app

mkdir public routes core views
touch public/index.php routes/web.php core/Router.php core/Request.php views/welcome.php views/about.php views/404.php views/menu.php
```

## Cum se lansează aplicația

### 1. Asigurați-vă că aveți PHP instalat pe sistemul dvs. (recomandat: PHP 8+)
### 2. Navigați în terminal la folderul proiectului:
```
bash
cd /opt/lampp/htdocs/php-routing-app
```
### 3. Rulați serverul PHP intern:
```
bash
php -S localhost:8000 -t public
```
### 4. Accesați aplicația în browser la:
```
http://localhost:8000 → veți vedea mesajul de bun venit de la welcome.php
http://localhost:8000/about → veți vedea mesajul de pe pagina „about.php”
http://localhost:8000/something → veți vedea un mesaj 404 de la „404.php” dacă cererea `/something` nu există
```

## 📘 Explicații esențiale

### 1. Ce face `public/index.php`?
```
public/index.php – Punctul de plecare (controler frontal)

Include clasele Router și Request.

Creează un obiect $router, care primește obiectul Request.

Încarcă fișierul web.php — unde sunt definite rutele.

Rulează $router->resolve() — caută o rută potrivită și o execută.

Gândiți-vă la index.php ca fiind poarta de acces principală: tot traficul intră prin aici.
Este punctul de intrare al aplicației. Include clasele principale, încarcă rutele și apelează metoda `resolve()` pentru a răspunde la cererea utilizatorului.
```
### 2. Ce face `core/Request.php`?
```
core/Request.php – Clasa care înțelege ce a cerut browserul

getPath() – returnează partea URL fără șirul de interogare.
Ex: /about?id=10 devine /about

method() – returnează get sau post (în litere mici).
Clasa Request este ca un mesager care spune: „Utilizatorul a cerut pagina X, cu metoda Y”.
```
### 3. Ce face `core/Router.php`?
```
Stochează rute în funcție de metodă (get sau post).
Metodele get() și post() salvează ruta și funcția care urmează să fie executată.

Care este diferența dintre `$router->get()` și `$router->post()`?

- `get()` este folosit pentru a afișa pagini
- `post()` este folosit pentru a procesa formulare sau a trimite date

Resolve() verifică:

Metoda solicitată (GET/POST)

Calea URL

Dacă ruta există, o execută.

Dacă nu, returnează o pagină 404.

Routerul primește o destinație și decide ce să returneze.
```
### 4. Ce face `routes/web.php`?
```
Când cineva accesează /, welcome.php este încărcat.

/about returnează doar un text.
Aici declarați: „Dacă adresa URL este aceasta, faceți aceasta”.

$router->get('/', function () {
require __DIR__ . '/../views/welcome.php';
});

$router->get('/about', function () {
require __DIR__ . '/../views/about.php';
});
```

### 5. Ce se întâmplă dacă ruta nu există?
```
http://localhost:8000/ceva

Returnează un 404 și afișează fișierul `views/404.php`.

```

## 🧪 Testare
```
- Acces: `http://localhost:8000/`
- Testați rutele `/despre`, `/contact`
- Încercați o rută inexistentă: `/something` → veți vedea pagina 404
```

## ✍️ Creat de
```
Vasilache Ionuț
E-mail: vasilacheorionut@gmail.com

Acest proiect a fost construit pas cu pas pentru a învăța rutarea în PHP, fără cadru.
```