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