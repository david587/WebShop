
# GearDrop Webshop
## Fejlesztői dokumentáció - desktop

## Felhasznált technológiák:

OS: win32 x64

Angular CLI: 15.0.3 
Node: 18.10.0 
Package Manager: npm 8.19.2
Electron: 


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
  * brands.omponent.html
  * categories.component.html
  * dashboard.component.html
  * email.component.html
  * login.component.html
  * navbar.component.html
  * user.component.html
  
  Nem vizuális komponensek:
  
   * api.service.ts
   * auth.service.ts
   * emitter.service.ts
  
  
