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

A főoldal az első lap, ami megjelenik számunkra. Lehetőségünk van átnavigálni a többi oldalra. Az első két gomb a Buy Now (a kosárba navigál), Show All (a termékek oldalára navigál), majd négy random terméket jelenít meg az oldal amiket itt a kosarunkba tudunk tenni bejelentkezés után, ha nem vagyunk bejelentkezve a regisztrációra dob minket az oldal. A View More gomb is a termékek oldalra navigál, és végül a hírlevélre való feliratkozás áll módunkban. Az emali cím beírását követően és a submit gombra kattintva kapunk egy üdvözlő emailt.

### Products Page

A termékek oldalon láthatjuk az adatbázisban szereplő összes árut. Itt is lehetőségünk van kosárba tenni bejelentkezés után, illetve a képekre kattintva átnavigál egy másik oldalra, ami az adott cikk információit tartalmazza. Szűrni három féle képpen tudunk, keresősávban, kategóriára, vagy márkára.

### About Page

A "rólunk" oldalon egy leírás található a fantázia vállalkozásunkról.

### Support Page

A támogatói oldal a  céggel való kapcsolatbalépést segíti az infromációk megjelenítésével.

### Register Page

A regisztrációs felület. Rossz formátum esetén hibaüzenet érkezik. Név, Email cím, Lakcím, Telefonszám, Jelszó és Ismétlő jelszó, amit meg kell adni

### Login Page

Bejelentkező felület. Email címet és jelszót meg kell adni.

### Cart Page

A kosár oldalon tudjuk növelni a termékek darabszámát, kitudjuk őket törölni a megvételre váró áruk közül, illetve összeszámolja nekünk az oldal, hogy összesen mennyit kell majd fizetnünk. Checkout gomb átdob a checkout oldalra.

### Checkout Page

Fietési adatok megadása után (szállítási cím, telefonszám, Fietési mód) lehetőségunk van leadni a rendelést, és ezutén kapunk egy emailt a rendelés adatok összegzéséről.

### Navigációs sáv

Minden oldalon megtalálhatjuk a navigációs sávot. A fentebb felasorolt oldalakra tudunk átlépni vele. A Logout gomb is itt helyezkedik el, ami a kijelentkezést biztosítja.

### Lábléc sáv

Ez is minden oldalon megtalálható, a fantázia céggel kapcsolatos nem működő linkeket találjuk az oldalak alján.
