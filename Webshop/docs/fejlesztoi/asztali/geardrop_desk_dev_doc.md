
# GearDrop Webshop
## Fejlesztői dokumentáció - desktop

## Felhasznált technológiák:

  - OS: win32 x64
  - Angular CLI: 15.0.3 
  - Node: 18.10.0 
  - Package Manager: npm 8.19.2
  - Electron: 
  - Bootstrap: 5.3

## Projekt elindítása

## desktop
  - 'npm install' a node könyvtár létrehozása
  - 'ng serve' a szerver leindítása
  - 'npm start' az electron az asztali alkalmazás indítása

## Felépítés

### Könyvtárszerkezet:

```txt
admin/
  |-.angular/
  |-.vscode/
  |-node_modules/
  |-src/
  |  |-app/
  |  |  |-brands/
  |  |  |-categories/
  |  |  |-dashboard/
  |  |  |-login/
  |  |  |-navbar/
  |  |  |-products/
  |  |  |-shared/
  |  |  |-users/
  |  |  |-app.component.css
  |  |  |-app.component.html
  |  |  |-app.component.ts
  |  |  |-app.component.spec.ts
  |  |  |-app.module.ts
  |  |  -app-routing.module.ts
  |  |-assets/
  |  |-environments/
  |  |-favicon.ico
  |  |-index.html
  |  |-main.ts
  |  |-polyfill.ts
  |  |-styles.css
  |-.editorconfig
  |-.gitignore
  |-angular.json
  |-package-lock.json
  |-package.json
  |-README.md
  |-tsconfig.json
  |tsconfig.spec.json
  ```
  
  Az asztali alkalmazás Angular keretrendszerrel összeállítva amit Electron-al van átalakitva egy asztali alkalmazássá.
  
  Vizuális komponensek:
  
  * app.component.html - 
  * brands.omponent.html - termékek márkái láthatóak
  * categories.component.html - termékek karegóriái láthatóak
  * dashboard.component.html - fő oldal
  * email.component.html - hírlevelek kiküldése
  * login.component.html - bejelentkezési felület
  * navbar.component.html - navigáció oldalak között
  * user.component.html - felhasználók láthatóak
  
  Nem vizuális komponensek:
  
   * api.service.ts - termékek, felhasználók, márkák, katekoriák, emailek kezelése
   * auth.service.ts - Azonosítás
   * emitter.service.ts - komponensek kommunikációjához szükséges


  ### api service metodusai

  #### getProducts metódus
  
   - A metódus felel a termékek megjelenitésért felel, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Products' végponttal érie, get metódust használ.
   - Nincsenek bemeneti paraméterek a metódusban.
   - Visszatérési érték <any>, amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni
  
  #### addProduct metódus
  
   A metódus felel az új termék felvételért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Products/Store' végponttal érie, post metódust használ, szükséges a token azonosítás.
  
  #### deleteProduct metódus
  
  A metódus felel az adott termék töréséért id alapján, url az apihost változóból és az endpoint változóból "/" plusz az adott termék id ból állössze. A Rest Api a 'Products/Delete' végponttal érie, delete metódust használ, szükséges az azonosítás.
  
  #### updateProduct metódus
  
  A metódus felel a már meglévő retmékek módositásáért, url az apihost változóból és az endpoint plusz az adott termék id ából változóból állössze. A Rest Api a 'Products/Update' végponttal érie, post metódust használ, szükséges az azonosítás.
  
  #### getUsers metódus
  
  A metódus felel a felhasználók megjelenítéséért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Users/Show' végponttal érie, get metódust használ, szükséges az azonosítás.
  
  #### giveAdmin metódus 
  
  A metódus felel az admin jog adásért, url az apihost változóból és az endpoint plusz az id ból változóból állössze. A Rest Api a 'Users/Admin' végponttal érie, post metódust használ, szükséges az azonosítás.
  
  #### getEmails metódus
  
  A metódus felel az email-ek megjelenitésért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Emails' végponttal érie, get metódust használ, szükséges az azonosítás.
  
  #### sendEmail metódus
  
   A metódus felel a hírlevelek kiküldéséért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'sendEmail' végponttal érie, get metódust használ, szükséges az azonosítás.
  
  #### deleteUser metódus
  
  A metódus felel a felhasználó törléséért id alapján,  url az apihost változóból és az endpoint változóból "/" plusz az adott felhasználó id ából állössze. A Rest Api a 'Users/Delete' végponttal érie, delete metódust használ, szükséges az azonosítás.
  
  #### getBrands metódus
  
  A metódus felel a márkák megjelenitéséért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Brands/Index' végponttal érie, get metódust használ, szükséges az azonosítás.
  
  #### addBrand metódus
  
   A metódus felel a új márka hozzáadáséet,  url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Brands/Store' végponttal érie, post metódust használ, szükséges az azonosítás.
  
  #### deleteBrand metódus
  
  A metódus felel a mátka törléséért, url az apihost változóból és az endpoint "/" plusz az adott márka id ából állössze. A Rest Api a 'Brands/Delete' végponttal érie, delete metódust használ, szükséges az azonosítás.
  
  #### getCategories metódus
  
   A metódus felel a kategotiák megjelenitéséért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Categories/Index' végponttal érie, get metódust használ, szükséges az azonosítás.
  
  #### addCategorie metódus
  
   A metódus felel a új katekoria hozzáadáséet,  url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Categories/Store' végponttal érie, post metódust használ, szükséges az azonosítás.
  
  #### deleteCategorie metódus
  
   A metódus felel a kategoria törléséért, url az apihost változóból és az endpoint "/" plusz az adott márka id ából állössze. A Rest Api a 'Categories/Delete' végponttal érie, delete metódust használ, szükséges az azonosítás.
  
  
  ### auth service metodusai
  
  #### login
  
  #### logout
  
  ####  isLoggedIn
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
