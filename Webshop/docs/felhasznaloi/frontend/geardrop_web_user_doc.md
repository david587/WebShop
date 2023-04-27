# GearDrop Webshop

## Felhasználói dokumentáció - frontend

## 2022, 2023

## Felhasznált technológiák

OS: win32 x64

Angular CLI: 15.0.3 Node: 18.10.0 Package Manager: npm 8.19.2

Tailwind css: @tailwind base; @tailwind components; @tailwind utilities;

## Projekt elindítása

### git clone https://github.com/david587/Webshop

### WebshopBackend

- composer install, hogy létre hozzuk a vendor mappát
- .env mappa létrehozása
- php artisan key:generate a kulcs legenerálásához
- php artisan serve, szerver elindítása

### Webshop

- npm install, a node könyvtár létrehozásához
- ng serve, a szerver elindítása

### Home Page

A főoldal az első lap, ami megjelenik számunkra. Lehetőségünk van átnavigálni a többi oldalra. Az első két gomb a Buy Now (a kosárba navigál), Show All (a termékek oldalára navigál), majd négy random terméket jelenít meg az oldal amiket itt a kosarunkba tudunk tenni. A View More gomb is a termékek oldalra navigál, és végül a hírlevélre való feliratkozás áll módunkban. Az emali cím beírását követően és a submit gombra kattintva kapunk egy üdvözlő emailt.



