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

### git clone https://github.com/david587/Webshop

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

#### signup metódus

Hat bemenő paramétere van, a név, email, telefonszám, jelszó, ismétlő jelszó. A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /register végpontjához POST metódussal.

### EmitterService osztály

Ez az osztály egy eseménykezelő szolgáltatást biztosít, amelyen keresztül az alkalmazásban bármely komponens vagy szolgáltatás eseményeket küldhet egymásnak.

#### onButton metódus

Ez a metódus meghívja az event objektum emit() metódusát, amely elindítja az eseményt. Az emit() metódusnak nincs paramétere, ezért bármilyen típusú adatot át lehet adni az eseményhez.

### ProductsService osztály

Ez az osztály egy adatkezelő szolgáltatás, amely különféle funkciókat biztosít a termékekhez, kosárelemekhez, rendelésekhez, kereséshez és szűrésekhez kapcsolódó háttér API-val való interakcióhoz. Haznál egy products (any típus) és egy host (ebben jelöljük az útvonalat) változót. A konstruktorban megadunk egy HttpClient paramétert http néven. 

#### getProducts metódus

Ez a metódus az összes terméket jeleníti meg, az url a fentebb létrehozott host változóból és a végpontból áll, a kettő között "/".  A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /Products végpontjához GET metódussal.

#### getCartItem metódus

Ez a metódus a kosár termékeit jeleníti meg, az url a fentebb létrehozott host változóból és a végpontból áll, a kettő között "/". Ez a funkció csak bejelentkezés után érhető el. A tokent lekérjük és ez lesz a httpHeaders kulcsértéke. A httpOption a http kérés beállításait kezeli. A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /cartItems/show végpontjához GET metódussal.

#### getRandomFour metódus

Ez a metódus négy random terméket jelenít meg, az url a fentebb létrehozott host változóból és a végpontból áll, a kettő között "/".  A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /Products/Home végpontjához GET metódussal.

#### addToCart metódus

Ez a metódus a termékek kosárhoz adásáért felelős, van egy bemenő paramétere, az id, number típusként. Az url a fentebb létrehozott host változóból, a végpontból és az id-ból áll, közöttük "/" az elválasztó. Ez a funkció csak bejelentkezés után érhető el. A tokent lekérjük és ez lesz a httpHeaders kulcsértéke. A httpOption a http kérés beállításait kezeli. A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /cartItems végpontjához POST metódussal.

#### remove metódus

Ez a metódus a termékek kosárból való törléséért felelős, van egy bemenő paramétere, az id, number típusként. Az url a fentebb létrehozott host változóból, a végpontból és az id-ból áll, közöttük "/" az elválasztó. A tokent lekérjük és ez lesz a httpHeaders kulcsértéke. A httpOption a http kérés beállításait kezeli. A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /cartItems/delete végpontjához DELETE metódussal.

#### newsLetter metódus

Ez a metódus a hírlevélre való feliratkozást kezeli, van egy bemenő paramétere, az email, ami string típus. Az url a fentebb létrehozott host változóból és a végpontból áll, a kettő között "/". Létrehozza a data nevű objektumot, mely a felhasználók email címét tartalmazza. A HttpHeaders objektum segítségével létrehoz egy fejléceket tartalmazó objektumot, amelyet a headers változóban tárol.
Létrehozza a httpOption objektumot, amely a HTTP kérés beállításait tartalmazza. Ebben az esetben csak a fejléc beállításokat. A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /Users/NewsLetter végpontjához POST metódussal.

#### next metódus

Ez a metódus a fizetési adatok kezeléséért felelős. Van három bemenő paramétere, shippingAddress (string típus), phone (number típus) paymentMethod (string típus). Az url a fentebb létrehozott host változóból és a végpontból áll, közöttük "/" az elválasztó.  Ez a funkció csak bejelentkezés után érhető el. A tokent lekérjük és ez lesz a httpHeaders kulcsértéke. Létrehozza a data nevű objektumot, mely a felhasználók szállítási címét, a telefonszámát és a fizetési adatait tartalmazza. Létrehozza a httpOption objektumot, amely a HTTP kérés beállításait tartalmazza.A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /Orders/Store végpontjához POST metódussal.

#### search metódus

Ez a metódus az adatok közötti keresést teszi lehetővé. Van egy bemenő paramétere, a name (string típus). Az url a fentebb létrehozott host változóból és a végpontból áll, közöttük "/" az elválasztó. Létrehozza a data nevű objektumot, mely az adatok nevét tartalmazza.  A HttpHeaders objektum segítségével létrehoz egy fejléceket tartalmazó objektumot, amelyet a headers változóban tárol. Létrehozza a httpOption objektumot, amely a HTTP kérés beállításait tartalmazza. Ebben az esetben csak a fejléc beállításokat.  A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /Products/Search végpontjához GET metódussal.

#### brand metódus

Ez a metódus a márkára való szűrést teszi számunkra lehetővé. Van egy bemenő paramétere, name (any típusú). Az url a fentebb létrehozott host változóból és a végpontból áll, közöttük "/" az elválasztó. Létrehozza a data nevű objektumot, mely az adatok nevét tartalmazza. A HttpHeaders objektum segítségével létrehoz egy fejléceket tartalmazó objektumot, amelyet a headers változóban tárol. Létrehozza a httpOption objektumot, amely a HTTP kérés beállításait tartalmazza. Ebben az esetben csak a fejléc beállításokat.  A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /Products/Brands végpontjához GET metódussal.

#### categorie metódus

Ez a metódus a márkára való szűrést teszi számunkra lehetővé. Van egy bemenő paramétere, name (any típusú). Az url a fentebb létrehozott host változóból és a végpontból áll, közöttük "/" az elválasztó. Létrehozza a data nevű objektumot, mely az adatok nevét tartalmazza. A HttpHeaders objektum segítségével létrehoz egy fejléceket tartalmazó objektumot, amelyet a headers változóban tárol. Létrehozza a httpOption objektumot, amely a HTTP kérés beállításait tartalmazza. Ebben az esetben csak a fejléc beállításokat.  A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /Products/Categories végpontjához GET metódussal.

#### getProduct metódus

Ez a metódus a képre kattintva egy újoldalon jeleníti meg az adott terméket és azok adatait. Van egy bemenő paramétere, id (number típusú). Az url a fentebb létrehozott host változóból és a végpontból áll, közöttük "/" az elválasztó. A végpont a termékek egy adott azonosítója alapján való lekérdezését teszi lehetővé. Létrehozza a data nevű objektumot, amely az id azonosítóját tartalmazza. A HttpHeaders objektum segítségével létrehoz egy fejléceket tartalmazó objektumot, amelyet a headers változóban tárol. Létrehozza a httpOption objektumot, amely a HTTP kérés beállításait tartalmazza. Ebben az esetben a fejléc és a paraméterek beállításait is tartalmazza. A metódus visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /Products/Show/:id végpontjához GET metódussal, ahol az :id az adott termék azonosítója.

### CartComponent osztály

Ennek az osztálynak a célja az, hogy megjelenítse a felhasználó kosarában lévő termékeket. Az alkalmazás használja a ProductsService szolgáltatást a REST API hívások végrehajtásához. 

#### ngOnInit metódus

Ez a metódus meghívja a getCartItem() metódust.

#### getTotalPrice metódus

Ez a metódus kiszámítja az összes termék árát a kosárban.

#### getCartItem

Ez a metódust elkéri az összes terméket a kosárból és megjeleníti azokat.

#### remove metódus

Ez a metódus eltávolít egy adott terméket a kosárból az azonosítója alapján.

#### addToCart

Ez a metódus hozzáad egy terméket a kosárhoz azonosító alapján.

#### showMessage metódus

Ez a metódus megjeleníti az üzenetet a felhasználónak, majd eltávolítja azt a megadott időtartam után.

### CheckoutComponent osztály

Ennek az osztálynak az a célja, hogy belérje a fizetésiadatokat és kezelje azokat. Az alkalmazás használja a ProductsService szolgáltatást a REST API hívások végrehajtásához.

#### ngOnInit metódus

Ez a metódus inicializálja az űrlapot a FormBuilder segítségével, létrehozva egy nextForm nevű űrlapot, amely három mezőt tartalmaz: shippingAddress, phone és paymentMethod.

#### next metódus

Ez a metódus továbblendíti a felhasználót az ellenőrzési folyamatban.

### HomeComponent osztály

Ez az osztály felelős az alkalmazás kezdőoldalának megjelenítéséért, valamint az újságírói feliratkozások kezeléséért. Az osztály használja a ProductsService szolgáltatást a REST API hívások végrehajtásához.

#### ngOnInit metódus

Ez a metódus meghívja a getRandomFour() metódust. A metódus létrehoz egy űrlapot az újságírói feliratkozások kezelésére, majd megjeleníti az előző oldalról kapott üzenetet a showMessage metódus segítségével.

#### getRandomFour metódus

Ez a metódus véletlenszerűen kiválaszt négy terméket az adatbázisból, majd megjeleníti azokat a kezdőoldalon.

#### addToCart metódus

Ez a metódus hozzáad egy terméket a kosárhoz azonosító alapján.

#### newsLetter metódus

Ez a metódus kezeli az újságírói feliratkozásokat.

#### showMessage metódus

Ez a metódus megjeleníti az üzenetet a felhasználónak, majd eltávolítja azt a megadott időtartam után.

#### path, alt változók

Ezek a változók tartalmazzák a kezdőoldalon megjelenítendő képek elérési útvonalát és alt szövegét. Ezeket a változókat használja a kezdőoldal HTML kódja.

### NavbarComponent osztály

Ez az osztály lehetővé teszi a felhasználó számára a webhely más oldalaira való navigálást, valamint a bejelentkezés és a kijelentkezés lehetőségét. Az osztály használja a AuthService szolgáltatást a REST API hívások végrehajtásához.


#### ngOnInit metódus

Ez a metódus elindítja a hideAuth metódust, és beállítja a authvisible változót. Ezután az EmitterService feliratkozik az eseményekre, és meghívja a hideAuth metódust.

#### hideAuth metódus

Ez a metódus ellenőrzi, hogy a felhasználó be van-e jelentkezve vagy sem.

#### logout metódus

Ez a metódus a kijelentkezést kezeli.

#### onClickToggle metódus

Ez a metódus az navVisible változó értékét állítja be true-ra vagy false-ra, attól függően, hogy az érték korábban false vagy true volt. Ennek eredményeként a navigációs menü kinyílhat vagy bezárhat.


### ProductComponent osztály

Ez az osztály a Products oldalon lévő termékek egyikére kattintva átnavigál egy külön oldalra, ahol az adott termék nagyított képét és leírását találjuk, valamint a termékekkel kapcsolatos lehetőségeket igénybe vehetjük (pl: kosárba tétel).

#### addToCart metódus

Ez a metódus hozzáad egy terméket a kosárhoz azonosító alapján.

#### showMessage metódus

Ez a metódus megjeleníti az üzenetet a felhasználónak, majd eltávolítja azt a megadott időtartam után.

### ProductsComponent osztály

Ez az osztály megjeleníti a termékeket az adatbázisból és a termékekkel kapcsolatos lehetőségeket itt is igénybe lehet venni. Tudunk szűrni márka, kategória és keresés alapján is.

#### ngOnInit metódus

Ez a metódus meghívja a getProducts() metódust, inicializálja a searchForm, brandForm és categorieForm űrlapokat, beállítja és megjeleníti az üzenetet.

#### addToCart metódus

Ez a metódus hozzáad egy terméket a kosárhoz azonosító alapján.

#### search metódus

Ez a metódus a megadott név alapján keresi meg a termékeket a productService segítségével, majd elmenti őket a products változóba.

#### brand metódus

Ez a metódus a megadott márka alapján keresi meg a termékeket a productService segítségével, majd elmenti őket a products változóba.

#### categoria metódus

A metódus a megadott kategória alapján keresi meg a termékeket a productService segítségével, majd elmenti őket a products változóba.

#### showMessage metódus

Ez a metódus megjeleníti az üzenetet a felhasználónak, majd eltávolítja azt a megadott időtartam után.

#### getProduct metódus

Ez a metódus lekéri az egyik termék adatait, majd átirányítja az adott termék oldalára.

### SigninComponent osztály

Ez az osztály felel e bejelentkezésért

#### login metódus

Ez a metódus az email és a jelszó bekérésével bejelentkezteti a regisztrált felhasználót.

#### showMessage metódus

Ez a metódus megjeleníti az üzenetet a felhasználónak, majd eltávolítja azt a megadott időtartam után.


### SignupComponent osztály

Ez az osztály a felhasználó regisztrálásáért felelős.

#### signUp metódus

Ez a metódus a név, az email, a cím, a telefonszám, a jelszó és az ismétlő jelszó bekérése után létrehozza a regisztrációt.
