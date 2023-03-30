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

A backend egy  rest api alkalmazás laravel keretrendszerrel összeállítva.

A következő kontrollerek lettek létrehozva:
```txt
* AuthController - Az authentikációt kezeli
* BaseController - Az üzenetek küldésére szolgál
* BrandController - Márkák megjelenitésére,tárolására törlésére szolgál

* cartItemController - Kosár megjelenitésére,mennyiség növelésére,tárolására,törlésére szolgál

* CategorieController - Kategoriák megjelenitésére,tárolására törlésére szolgál

* EmailController - Email előkészitése az email kliensnek,ősszes feliratkozott személy lekérése

* OrderController - A felhasználó szállitási adatatit,termékeit,mennyiség csökkentését,rendelések emailes elküldését kezeli

* ProductController - Márkák és Kategoriak szürését,termékek CRUD müveleteit kezeli

* UserController - A felhazsnálók megjelenitését,törlését,Admin jog adását,Hirlevél elküldését kezeli.
```


A következő vizuális nézetek lettek beépítve:
```txt
* emails.order-submitted.blade.php - Ez a blade file érkezik meg a felhasználók emailcimére rendelések után. A rendelt termékeinek egy összegzését végzi.

* send.blade.php - A hirlevélre feliratkozók kapják meg, admin felüleltről lehet elküldeni.
```


Az adatbázis feltöltéséhez szükséges seederek és factory-k:
```txt
* BrandFactory - megtervezett márkákkal feltölti az adatbázist
* CategorieFactroy - megtervezett kategoriakkal feltölti az adatbázist

* DatabaseSeeder - Kategoria és Márka factory meghivása, 1 alap admin felhasználó létrehozása.
```

A táblák "JOIN-JA",feltölthetősége,idő ignorálása modellek segitségével lett megvalósitva:
```txt
* Brand - 
    |hasMany->product

* cartItem - 
    |belongsTo -> User    
    |belongsTo-> Product

* Categorie - 
    |hasMany->Product

* newsLetter

* Order - 
    |belongsTo -> User
    |belongsTo -> Product
    |belongsTo -> OrderInformation

* OrderInformations -
    |hasMany ->Order

* Product -
    |belongsTo -> Brand
    |belongsTo -> Categorie
    |belongsTo -> Order
    |hasMany -> cartItem

* User - 
    |hasMany ->Order
    |hasMany ->cartItem
```

Frontendnek adat listák átadását Resources állomákkal hajtottam végre:
```txt
* Brand
* cartItem
* Categorie
* FullUser
* newsLetter
* Order
* OrderInformation
* Product
* User
```

### AuthController Osztály
```txt
Ez a osztály végzi a Regisztrációt, Bejelentkezést,Kijelentkezést. Ezek mind a feltelepitett Sanctummal voltak megvalósithatóak.

#### signIn metódus
 metódus feladata az, hogy bejelentkezési kérés alapján autentikálja az adott felhasználót és visszaadja az autentikáció eredményét. A metódus a Request objektumot kapja paraméterként, amely az űrlapból kapott adatokat tartalmazza. Az autentikáció a Laravel Auth fasszadon keresztül történik, az adatbázisban tárolt felhasználói adatok alapján. Ha az autentikáció sikeres, akkor a metódus létrehoz egy új token-t az autentikált felhasználó számára, majd visszatér az eredményrel.


#### signUp metódus
Az signUp() metódus feladata az, hogy új felhasználót regisztráljon az alkalmazásba. A metódus kap egy Request objektumot paraméterként, amely az űrlapból kapott adatokat tartalmazza. A metódus a Laravel Validator-on keresztül ellenőrzi a bemeneti adatok helyességét. Ha a validáció sikeres, akkor a metódus létrehoz egy új felhasználót az adatbázisban, majd visszatér az eredménnyel.

#### signOut metódus
Az signOut() metódus feladata a felhasználó kijelentkeztetése az alkalmazásból. A metódus meghívja a Laravel auth fasszad currentAccessToken() metódusát, hogy megtalálja az aktuális felhasználóhoz tartozó token-t, majd azt törli az adatbázisból. Végül a metódus visszatér az eredménnyel.
```



### BaseController osztály
```txt
A BaseController osztály a Laravel-ben egy központi hely, ahol közös metódusokat lehet definiálni az alkalmazásban használt többi vezérlő számára. Az itt definiált metódusokat bármelyik másik vezérlőben hívhatjuk meg.

#### sendResponse metódus
A sendResponse() metódus egy standard formátumú JSON választ ad vissza, amely success, data és message mezőket tartalmaz.


#### OrderResponse metódus
Ezt külön az ordercontrollerhoz hoztam létre hogy rendesen meg lehssen jeleniteni jsonben az adatokat.

#### sendError metódus
A sendError() metódus egy JSON formátumú hibajelzést generál, amely tartalmazza az error, errorMessage és az opcionális code mezőket, ha szükséges. Ha van hibaüzenet, akkor az errorMessage mezőbe kerül. Ha nincs hibaüzenet, akkor az errorMessage üres marad. Alapértelmezett értékként a metódus a 404 hibakódot adja vissza.
```

### BrandController osztály
```txt
Az osztály a BaseController osztályból örököl,

#### index
Az index metódus lekéri az összes márka rekordot az adatbázisból, átalakítja azokat BrandResources erőforrásokká, majd visszaküldi őket egy  üzenettel.

#### store
A store metódus validálja a kliens által küldött adatokat, majd létrehoz egy új márka rekordot az adatbázisban. Ha a folyamat sikeres, visszaküldi a létrehozott rekordot egy Brand create üzenettel.

#### delete
Az destroy metódus törli az adatbázisból az adott azonosítójú márka rekordot,
```


### CartitemController osztály
```txt
Kosárban lévő termékek kezelésével foglalkozik.

#### Show
show() metódus lekéri az aktuális felhasználóhoz tartozó összes kosár elemet, majd ezt visszaadja JSON formátumban.

#### store
store() metódus fogad egy termék azonosítót, majd hozzáadja azt az aktuális felhasználó kosarához. Ha a termék már szerepel a kosárban, akkor a mennyiségét növeli eggyel, ha pedig még nem szerepel, akkor létrehoz egy új kosár elemet a termékkel és mennyiséggel egyenlő egyel.

#### destroy
destroy() metódus törli a megadott kosár elemet az adatbázisból.
```

```php
public function store($id)
    //when put different item not storeing that, just add plus 1 to the preveous quantity
    {
        $product_id = Product::find($id)->id;
        $cart_item = new CartItem();
        $cart_item->user_id = Auth::id();
        $cart_item->product_id = $product_id;
        $cart_item->quantity += 1;
        //is checking if there is already an existing cart item in the database that has the same user ID and product ID as the current user and product.
        //If there is no such cart item, it will save the new cart item that is being created.
        if(cartItem::where('user_id', Auth::id())->where('product_id', $product_id)->first() == null){
            $cart_item->save();
            return $this->sendResponse([],"Product added to cart");
        }
        else{
            // cartItem::where('user_id', Auth::id())->where('product_id', $product_id)->update(['quantity' => $cart_item->quantity+1]);
            $cart_item = cartItem::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            $cart_item->quantity += 1;
            $cart_item->save();
            return $this->sendResponse([],"Increasing the number of products");
        }
    }
```


### CategorieController osztály
```txt
A kategóriákkal kapcsolatos műveleteket végzi el

#### Index
index() metódus visszaadja az összes kategóriát, 
CategorieResources::collection() segítségével átalakítva. A válasz "OK" üzenettel van ellátva.

#### Store
store(Request $request) metódus fogad egy Request objektumot, amelynek categorie mezője kötelező. Ha a validáció sikertelen, akkor a hibaüzenetet küldi vissza a sendError() metódussal. Ha a validáció sikeres, akkor létrehoz egy új kategóriát a megadott adatokkal és visszaküldi azt a CategorieResources átalakításával, az üzenet "Categorie létrehozva".

#### destroy
destroy($id) metódus törli a megadott ID-jú kategóriát. A válasz "Categorie törölve" üzenettel van ellátva.
```



### EmailController osztály
```txt
Az email küldéssel és az feliratkozók email címének lekérdezésével foglalkozik.

#### sendEmail
sendEmail() metódus az összes feliratkozóknak elküld egy emailt, amelyben egy előre definiált üzenet szerepel.

#### Emails
Emails() metódus az összes feliratkozó email címét lekérdezi az adatbázisból és visszaküldi ezeket egy NewsLetterResources erőforrás gyűjteményben.
```


### OrderController osztály
```txt
 az ügyfél által készített rendeléseket kezeli és kezdeményezi az e-mail értesítést az új rendelésekről.

#### Store
Az "store" függvény felelős azért, hogy elmentse a felhasználó kosarában lévő összes elemet a megrendelési adatbázisban. A függvény paraméterként kap egy HTTP kérést (Request), amely tartalmazza a szállítási címet, a telefonszámot és a fizetési módot. Először létrehoz egy új "ModelsOrderInformations" objektumot, amelyben elmenti ezeket az adatokat.

Ezután lekéri az összes kosár elemet, amelyekhez hozzárendeli a megfelelő felhasználót és terméket, majd eltárolja azokat az adatbázisban. Az árukészletet is frissíti a termékekhez tartozó mennyiséggel.

#### showUserItems
Végül az "showUserItems" függvényt hívja meg, amely elkészíti az e-mailt a megfelelő adatokkal, majd elküldi azt a felhasználó által megadott e-mail címre.
```

```php
public function store(Request $request)
    {
        $order_Information = new ModelsOrderInformations();
        $order_Information->shippingAddress =$request->shippingAddress;
        $order_Information->phone = $request->phone;
        $order_Information->paymentMethod = $request->paymentMethod;
        $order_Information->save();

        $allSorted = cartItem::where("user_id",Auth::id())->get();
        foreach($allSorted as $cartItem) {
            $order_item = new Order();
            $order_item->user_id = Auth::id();
            $order_item->product_id = $cartItem->product_id;

            $product = Product::find($cartItem->product_id);
            $product->inStock = $product->inStock - 1;
            $product->save();
            $order_item->quantity = $cartItem->quantity;
            $order_item->order_information_id = $order_Information->id;
            $order_item->save();
        }
        $user = User::where("id",Auth::id())->first();
        $emailAdd = $user->email;
        $this->showUserItems($emailAdd);

        return $this->sendResponse([],"All cart items added to Orders.");
    }

    public function showUserItems($emailAdd)
    {
        $userOrder = cartItem::where("user_id",Auth::id())->get();
        //get the lastest id
        $userOrder_id = Order::where("user_id", Auth::id())->latest('order_information_id')->value('order_information_id');
        $shippingData = OrderInformations::where("id",$userOrder_id)->get();
        $UserData = User::where("id",Auth::id())->first();
        $user = $UserData->toArray();
        $shipping = $shippingData->toArray();
        $order = $userOrder;

        // Send email
        $email = config('mail.from.address');
        Mail::to($emailAdd)->send(new OrderSubmitted($user,$email,$order,$shipping));
    }
```


### ProductController osztály
```
termékekhez kapcsolódó funkciók kezelése, beleértve a kategóriák és márkák szerinti rendezést, a termékek létrehozását, szerkesztését, törlését, keresését és megjelenítését teszi lehetővé. 

#### sortCategories
Ez a metódus a kategóriák alapján történő szűrést valósítja meg. A $request paraméterben megkapott keresési kifejezést felhasználva kikeresi a kategória azonosítóját az adatbázisból, majd a kategóriához tartozó összes terméket lekérdezi az adatbázisból.

#### sortBrands
Ez a metódus a márkák alapján történő szűrést valósítja meg. A $request paraméterben megkapott keresési kifejezést felhasználva kikeresi a márkához tartozó azonosítót az adatbázisból, majd a márkához tartozó összes terméket lekérdezi az adatbázisból.

#### index
Ez a metódus az összes termék lekérdezését valósítja meg oldalakra bontva. Az oldalszámot a $request paraméterben megadott érték határozza meg, ha az nincs megadva, akkor az első oldalt jeleníti meg. Az oldalonként megjelenő termékek számát a $perPage változó határozza meg, amelynek alapértéke 10.

#### home
Ez a metódus a főoldal megjelenítéséért felelős. Az összes terméket lekérdezi az adatbázisból, majd véletlenszerűen kiválasztja közülük az első négyet. Ha az összes termék száma kevesebb, mint négy, akkor a visszatérési érték üres tömb lesz. A visszatérési érték egy JSON objektum, amely a véletlenszerűen kiválasztott négy termék adatait tartalmazza.

#### store
Ez a metódus a termék létrehozásáért felelős. A $request paraméterben megkapott adatokat ellenőrzi a validátornál, majd az adatbázisba menti

#### show
A show metódus egy Product objektumot keres a megadott $id alapján az adatbázisból. Ha az objektum nem létezik, akkor hibaüzenetet ad vissza. Ha az objektum megtalálható, akkor a ProductResources objektum létrehozása után az objektumot visszaküldi a felhasználónak.

#### update
Az update metódus a felhasználó által megadott adatok alapján frissíti a Product objektumot, amelyet a $id alapján talált meg a kódban. A metódus ellenőrzi, hogy minden szükséges mező kitöltött-e, ha nincs, akkor hibaüzenetet ad vissza. Ha minden adat rendben van, akkor a $request által kapott adatok alapján az adatbázisban frissíti a Product objektumot és visszaküldi a frissített objektumot a felhasználónak.

#### destroy
A destroy metódus a megadott $id alapján törli a Product objektumot az adatbázisból. Ha sikerült törölni az objektumot, akkor üres tömböt küld vissza.

#### search
A search metódus a felhasználó által megadott szövegre keres a Product objektumok között. A metódus megvizsgálja, hogy a megadott szöveg megegyezik-e a Brand vagy a Categorie objektumok valamelyikével, és ha igen, akkor a megfelelő id-t eltárolja. Ezután a Product objektumok között keres a megadott szövegre és a tárolt id-k között. Ha talál megfelelő objektumot, akkor ezeket visszaküldi a felhasználónak.
```


### UserController osztály
```txt
az alkalmazás különböző felhasználói műveleteit végzik.

#### listUsers
A "listUsers" metódus a rendszerben tárolt összes felhasználót lekéri és visszaadja a megfelelő JSON formátumban.

#### deleteUsers
A "deleteUsers" metódus egy felhasználót töröl az adatbázisból az azonosítója alapján.

#### AdminAccess
Az "AdminAccess" metódus beállítja az adott felhasználó admin jogosultságát az azonosítója alapján. Ehhez a metódus megtalálja a felhasználót az azonosítója alapján, majd beállítja az "admin_since" mező értékét az aktuális dátumra.

#### newsLetter
A "newsLetter" metódus lehetővé teszi a felhasználók számára, hogy feliratkozzanak a Hirlevélre . Az felhasználó által megadott e-mail címet ellenőrzi, hogy egyedi-e és érvényes-e. Ha a validáció sikeres, akkor az felhasználó e-mail címe hozzáadódik az adatbázishoz, és visszatér a megfelelő JSON formátumban. Ha a validáció nem sikerül, akkor a metódus hibajelzést ad vissza a hibák adataival.
```
