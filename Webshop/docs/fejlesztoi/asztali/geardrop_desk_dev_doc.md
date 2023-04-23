
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
  
  Ez a metódus felel a termékek megjelenitésért felel, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Products' végponttal érie, get metódust használ 
  
  #### addProduct metódus
  
   Ez a metódus felel az új termék felvételért, 
  
  #### deleteProduct metódus
  
  #### updateProduct metódus
  
  #### getUsers metódus
  
  #### giveAdmin metódus
  
  #### getEmails metódus
  
  #### sendEmail metódus
  
 
  
  #### deleteUser metódus
  
  #### getBrands metódus
  
  #### addBrand metódus
  
  #### deleteBrand metódus
  
  #### getCategories metódus
  
  #### addCategorie metódus
  
  #### deleteCategorie metódus
  
  
  
  ### auth service metodusai
  
  #### login
  
  #### logout
  
  ####  isLoggedIn
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
