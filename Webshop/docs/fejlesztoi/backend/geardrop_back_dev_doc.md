# WebshopBackend

## Fejlesztői dokumentáció - Backend

## 2022, 2023

## Fejlesztői nézet

Lépjünk be a Webshop/Webshopbackend könyvtárba:

```bash
cd Webshop/Webshopbackend
```

Most le kell töltenünk a függőségeket. E paranccsokkal lehetséges:

```bash
composer install ->vendor generálása
.env ->file létrehozása
php artisan key:generate ->kulcs generálás
php artisan migrate:fresh --seed ->adatbázis feltöltése
```

A Backend indítása:

```bash
php artisan serve
```

## Felépítés

### Könyvtárszerszerkezet

```txt
WebshopBackend/
|-app/
    |-Http/
        controllers/
            |-AuthController
            |-BaseController
            |-BrandController
            |-cartItemController
            |-CategorieController
            |-Controller
            |-EmailController
            |-OrderController
            |-ProductController
            |-UserController

        |-middleware/
            |-CheckAdmin

        |-resources/
            |-Brand
            |-cartItem
            |-Categorie
            |-FullUser
            |-newsLetter
            |-Order
            |-OrderInformation
            |-Product
            |-User

    |-Mail/
        |-OrderSubmitted
        |-SendMailable

    |-Models/
        |-Brand
        |-cartItem
        |-Categorie
        |-newsLetter
        |-Order
        |-orderInfo
        |-OrderInformations
        |-Product
        |-User

|-bootstrap/
|-config/
|-database/
    |-factories/
        |-BrandFactory
        |-CategorieFactory
    
    |-migrations/
        |-userTable
        |-productTable
        |-brandsTable
        |-categoriesTable
        |-orderInfoTable
        |-ordersTable
        |-cartItemTable
        |-newslettersTable
    
    |-seeders/
        |-DatabaseSeeder

|-public/
|-resources/
    |-views/
        |-emails/
            |-order-submitted.blade.php
            |-send.blade.php

|-routes/
    |-api.php

|-storage/
|-tests/
|-vendor/

```

A webes felület egy SPA alkalmazás Angular keretrendszerrel összeállítva.

A következő vizuális komponensek lettek létrehozva:

* app.component - Fő konténer
* class.component - az osztályok kezelése
* institue.component - intézményi oldal
* login.component - beléptető felület
* nopage.component - nem létező oldalak helyett megjelenő lap
* student.component - tanulók megjelenítése kezelése

A következő nem vizuális komponensek lettek beépítve:

* api.service - a tanulók kezelése a REST API felületen
* apiclass.service - az osztályok kezelése a REST API felületen
* auth.guard - Útvonalak védelme
* auth.service - Azonosítás

### AuthService osztály

Az Angularban elérhető HttpClient osztály segítségével elvégzi a beléptetést, a kiléptetést, és lehetőséget ad annak ellenőrzésére, hogy be vagyunk-e jelentkezve.

#### login metódus

Két bemenő paramtére van, a felhasználónév és a jelszó string típusként. A metódus visszatér egy Observer objektummal, ami kapcsolódik az REST API /login végpontjához POSt metódussal.

#### logouot metódus

Bemenő paramétere nincs. Visszatér egy Observer objektummal, ami kapcsolódik a REST API szerver /logout végpontjához POST metódussal.

#### isLoggedIn metódus

Nincs bemenő paramétere. A metódus Window.localStorage tulajdonsággal
currentUser néven elmentett felhasználót keresi. Ha nincs ilyen false értékkel tér vissza. Ha van ilyen a tokennel tér vissza.

### AuthGuard osztály

Az útvonalak védelmét teszi lehetővé, az Angular beépített guard szolgáltatásán keresztül.

#### canActivate metódus

A gurad szolgáltatás esetén ez a metódus egy kötelező elem. Ha be vagyunk jelentkezve vissaztér true értékkel, másként a beléptető felületre navigál.

### ApiService

A tanulók kezelését végzi a REST API szerveren.

#### addStudent metódus

Egyetlen bemenő paramétere tartalmazza, a felvenni kívánt tanuló adatait. Egy Observer objektummal tér vissza, amiből kiolvasható
a szerver válasza.

#### getStudents metódus

Nincs bemenő paramétere. Lekéri az össze felhasználó adatait, majd visszatér egy Observer objektummal, ami szolgáltatja az összes tanuló adatait.

#### getGroupStudents metódus

Egy osztály tanulóit szolgáltatja. Bemenő paramétere a kívánt osztály vagy csoport azonosítója. Visszaad egy Observer objektumot, amiből megkaphatók az osztály tanulói.

#### deleteStudent metódus

Egy tanuló törlésére szolgál. Bemenő paramétere, a törltendő tanuló azonosítója. A törléshez azonosítást használ. Visszatér a szerver válaszával, egy Observer objektum formájában.

#### updateStudent metódus

Egy tanuló adatit képes frissíteni. Bemenő első paramétere a frisített tanulói adatok. Második paramétere a tanuló azonosítója. A metódus azonosításhoz tokent küld a REST API szervernek. Visszatérési értéke egy Observer objektum, amely tartalmazza a szerver válaszát.

### ApiclassService osztály

A tanulói osztályok vagy csoportok kezelésére használható.

#### host változó

A REST API eléréshez egy URL-t tartalmaz

#### addClassgroup metódus

A metódus segítségével felvehető egy új osztály. Bemenő paramtére az osztály adatai. A művelethez azonosítást végez, a tárolt token elküldésével. A metódus visszatér egy Observer objektummal, ami tartalmazza a szerver válaszát.

#### getClassgroups metódus

Az összes osztály adatait kérdezi le. Nincs bemenő paramétere. Visszatér egy Observer objektummal, ami tartalmazza az összes osztály adatait.

#### deleteClassgroup metódus

Egy osztály törlésére használható metódus. Bemenő paraméter a törlendő osztály azonosítója. Azonosításhoz a tárolt tokent elküldi a szerver számára. A metódus visszaad egy Observer objektumot, ami tartalmazza a szerver válaszát.

#### updateClassgroup metódus

Egy osztály adatait frissíti. Első bemenő paramétere a frissített adatok, a második a frissítendő osztály azonosítója. A metódus azonosításhoz elküdli a tárolt tokent, majd visszaad egy Observer
objektumot, ami tartalmazza a szerver válaszát.

### Class komponens

A komponens a szokásos Angular komponenseket tartalmazza, plusz egy osztályt, ami modelként szolgál az osztályok tárolására.

A komponens Reaktív űrlapot használ, a következő osztályokkal:

* FormGroup
* FormBuilder

#### classgroupData objektum

Tartalmazza az összes osztály adatait. Ebből renderelődik a táblázat.

#### ClassComponent.addClassgroup metódus

A metódusnak nincs bemenőparamétere. A .html fájlban megjelenített űrlapból olvassa az új komponens nevét, majd eltárolja az apiclass szolgáltatás használatával.

#### ClassComponent.getAllClassgroup metódus

A metódusnak nincs bemenő paramétere. Az apiclass szolgáltaáson keresztül lekéri az összes osztályt, majd betölti a classgroupData objektumba.

#### ClassComponent.deleteClassgroup metódus

A metódus paraméterként fogadja a törlendő osztály azonosítóját. Az apiclass szolgáltatáson keresztül törli a megadott osztályt. Törlés
után újragenerálja a weboldalon a táblázatot.

#### ClassComponent.onEdit metódus

Megjeleníti a szerkesztő űrlapot.

#### ClassComponent.updateClassgorup metódus

Frissíti a megadott osztály. A metódusnak nincs bemenőparamétere. Az adatbázist az apiclass szolgáltatáson keresztül telepíti. A frissítés után újragenerálja a táblázatot.

#### ClassComponent.clickAddClassgroup metódus

Megjeleníti az új osztály hozzáadási lehetőséget.

### InstituteComponent komponens

A programot haszlnáló intézmény adatait
tartalmazza.

#### instituteName változó

Az intézmény nevét tartalmazza.

#### courses objektum

Az intézmény által futtatott tanfolyamok listája.

### LoginComponent komponens

#### loginForm objektum

A beléptető felület űrlapjának leképezése, FormGroup és FormBuilder osztályok használatával.

#### LoginComponent.login() metódus

A beléptető űrlap alapján elvégzi az azonosítást az auth szolgáltatás segítségével. A szervertől kapott tokent és a felhasználónevet eltárolja Window.localStorage tulajdonsággal.

### nopage komponens

Ha nemlétező weboldalra hivatkozik egy látogató, ez a weblapot szolgáljuk ki.

### StudentComponent komponens

A tanulók kezelését végzi ez a komponens.

#### studentForm objetkum

Új tanuló felvételéhez használt űrlap leképezése.

#### studentsData objektum

Az összes tanuló adatait tartalmazza.

#### classgroups objektum

Az összes osztály adatait tartalmazza. Az osztályok válaszhatók a webes felületen.

#### selectedClassgroup objektum

A kiválaszott osztály adatait tartalmazza.

#### onChangeGroupSelect() metódus

Ha változik a kiválasztott osztály, újratölti a tanulókat.

#### StudentComponent.getClassgroups() metódus

A metódus letölti az osztályokat, az apiclass szolgáltatás segítségével, majd betölti a classgroups objektumba.

#### StudentComponent.addStudent() metódus

Új tanulót vesz fel. A tanuló adatait komponens studentForm űrlapjából veszi. Az adatbázisban az auth szolgáltatás segítségével rögzíti az új tanuló adatait.

#### StudentComponent.getAllStudent() metódus

Lekéri az összes tanuló adatát az api szolgáltatáson keresztül,
majd betölti az osztály studentsData objektumába.

#### StudentComponent.getGroupStudent() metódus

Bemenő paraméterként fogadja egy osztály azonosítóját. Az azonosító alapján lekérdezi az osztályba tartozó tanulók adatatit, majd beállítja azokat az osztály studentsData