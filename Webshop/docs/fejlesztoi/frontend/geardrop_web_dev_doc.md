# GearDrop Webshop

## Fejlesztői dokumentáció - frontend

## 2022, 2023

## Felhasznált technológiák:

OS: win32 x64

Angular CLI: 15.0.3
Node: 18.10.0
Package Manager: npm 8.19.2

Tailwind css:
  @tailwind base;
  @tailwind components;
  @tailwind utilities;

## Projekt elindítása

### WebshopBackend
    - composer install, hogy létre hozzuk a vendor mappát
    - .env mappa létrehozása
    - php artisan key:generate a kulcs legenerálásához
    - php artisan serve, szerver elindítása

### Webshop
    - npm install, a node könyvtár létrehozásához
    - ng serve, a szerver elindítása

## Felépítés

### Könyvtárszerkezet:
```txt
studal/
  |-.angular/
  |-.vscode/
  |-node_modules/
  |-src/
  |  |-app/
  |  |  |-about/
  |  |  |-cart/
  |  |  |-checkout/
  |  |  |-footer/
  |  |  |-home/
  |  |  |-navbar/
  |  |  |-product/
  |  |  |-products/
  |  |  |-shared/
  |  |  |-signin/
  |  |  |-signup/
  |  |  |-support/
  |  |  |-app.component.css
  |  |  |-app.component.html
  |  |  |-app.component.ts
  |  |  |-app.component.spec.ts
  |  |  |-app.module.ts
  |  |  `-app-routing.module.ts
  |  |-assets/
  |  |-environments/
  |  |-favicon.ico
  |  |-index.html
  |  |-main.ts
  |  |-polyfill.ts
  |  |-styles.css
  |  `-test.ts
  |-.gitignore
  |-angular.json
  |-package-lock.json
  |-package.json
  |-README.md
  |-tailwind.config.js
  
```

A webes felület egy periféria webshop alkalmazás Angular keretrendszerrel összeállítva.

A következő vizuális komponensek lettek létrehozva:

* app.component - Fő konténer
* about.component - "Rólunk" oldal
* cart.component - A kosár kezelése
* checkout.component - fizetési adatokat kezeli és küldi
* footer.component - minden oldal alján megjelenő általános információkat tartalmaz
* home.component - Főoldal funkcióit kezelő oldal
* navbar.component - A navigációs sáv funkcióit kezelő oldal
* product.compopnent - Egy termék részletes információit jeleníti meg a termékre kattintva
* products.component - Az összes termék megjelenítésére szolgáló oldal
* signin.component - Beléptető felület
* signup.component - Regisztrációs felület
* support.component - ???

A következő nem vizuális komponensek lettek beépítve:

* auth.service - Azonosítás
* emitter.service - Oldalak közötti adat átadás
* products.service - Tremékek kezelése a Rest API felületen

### AuthService osztály

Az Angularban elérhető HttpClient osztály segítségével elvégzi a beléptetést, a kiléptetést és a regisztrációt.


#### login metódus

Két bemenő paramtére van, az email és a jelszó string típusként. A metódus visszatér egy Observer objektummal, ami kapcsolódik az REST API /login végpontjához POST metódussal.

#### logout metódus

Bemenő paramétere nincs. Visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /logout végpontjához POST metódussal.

