# WebshopBackend

## Felhasználói dokumentáció - Backend

## 2022, 2023

## Backend előkészitése
```txt
Ahhoz hogy igénybe tudjuk venni a megirt api-t, ahhoz a gépünknek a következőket kell tartalmaznia:
|-php 8.0
|
``` 
## Backend használata
```txt
Különböző url Cimek megszólitásával lehet elérni a különböző utvonalakat.
Ezekről az utvonalak eléréséről a fejlesztői dokumentációban lehet tanálni képeket.
```
#### Útvonalak
```txt
Én az utvonalak védésére 2féle laravel middlewaret használtam.
|-Bejelentkezéshez kötött utvonalak
|-Admin hozzáférésű utvonalak
De az admin utvonalak alpjáraton megkapták az Auth middleware-t is. 
```
## Admin utvonalak
```bash
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| Metódus| Elérés                  | Kontroller        | Leírás                                         | Bemenő paraméterek                          | Jogosultság  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| POST   | /Products/Store         | ProductController | Új termék létrehozása                          | Név, ár, részletek, kép URL,                | Login, Admin |
|        |                         |                   |                                                | készlet száma,márka, kategória              |              | |        |                         |                   |                                                |                                             |              |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| POST   | /Products/Update/{id}   | ProductController | Termék frissítése adott azonosítóval           | Azonosító, név, ár, részletek, kép URL,     | Login,Admin  |
|        |                         |                   |                                                | készlet száma, márka, kategória             |              |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| DELETE | /Products/Delete/{id}   | ProductController | Termék törlése adott azonosítóval              | Azonosító                                   | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| GET    | /Brands/Index           | BrandController   | Összes márka lekérése                          | -                                           | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| POST   | /Brands/Store           | BrandController   | Új márka létrehozása                           | Név                                         | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| DELETE | /Brands/Delete/{id}     | BrandController   | Márka törlése adott azonosítóval               | Azonosító                                   | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| GET    | /Categories/Index       | CategorieController | Összes kategória lekérése                    | -                                           | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| POST   | /Categories/Store       | CategorieController | Új kategória létrehozása                     | Név                                         | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| DELETE | /Categories/Delete/{id} | CategorieController | Kategória törlése adott azonosítóval         | Azonosító                                   | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| GET    | /Users/Show             | UserController    | Az összes felhasználó listázása                | -                                           | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| DELETE | /Users/Delete/{id}      | UserController    | Felhasználó törlése adott azonosítóval         | Azonosító                                   | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| POST   |/Users/Admin/{id}        | UserController    | Admin jogosultság adása adott                  | Azonosító                                   | Login,Admin  |
|        |                         |                   |  azonosítóval rendelkező felhasználónak        |                                             |              |  | 	 |                         |                   |                                                |                                             |              |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| GET    | /sendEmail              | EmailController   | Üzenetek küldése eltárolt e-mailekre           | -                                           | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
| GET    | /Emails                 | EmailController   | e-mail címnevsletterTable táblából             | -                                           | Login,Admin  |
+--------+-------------------------+-------------------+------------------------------------------------+---------------------------------------------+--------------+
```

## Felhasználó utvonalak
```bash
| Metódus | Elérés              | Kontroller        | Leírás                           | Bemenő paraméterek                                      | Jogosultság |
| ------- | ------------------- | ----------------- | -------------------------------- | ------------------------------------------------------- | ----------- |
| POST    | /register           | AuthController    | Regisztráció                     | name, address, phone, email, password, confirm_password | -           |
| POST    | /login              | AuthController    | Bejelentkezés | email, password  | -                                                       | -           |
| GET     | /Products           | ProductController | Összes termék listázása          | page (opcionális)                                       | -           |
| GET     | /Products/Home      | ProductController | Random 4 termék listázása        | -                                                       | -           |
| GET     | /Products/Show/{id} | ProductController | Adott azonosítójú termék         | id                                                      | -           |
| GET     | /Products/Categories| ProductController | Kategóriák szerinti rendezés     | -                                                       | -           |
| GET     | /Products/Brands    | ProductController | Márkák szerinti rendezés         | -                                                       | -           |
| POST    | /Users/NewsLetter   | UserController    | Feliratkozás a hírlevélre        | email                                                   | -           |
| GET     | /Products/Search    | ProductController | Keresés a termékek között        | query (keresett szöveg)                                 | -           |
```

## Bejelentkezett felhasználó utvonalai
```bash
| Metódus | Elérés  | Kontroller | Leírás | Bemenő paraméterek | Jogosultság |
| ------- | ------- | ---------- | ------ | ------------------ | ----------- |
| POST    | /cartItems/{id} | CartItemController | Termék hozzáadása a kosárhoz | Azonosító | Login |
| GET     | /cartItems/show | CartItemController | Kosár tartalmának lekérése | - | Login |
| DELETE  | /cartItems/delete/{id} | CartItemController | Termék eltávolítása a kosárból | Azonosító | Login |
| POST    | /Orders/Store/ | OrderController | Rendelés létrehozása a kosárból | - | Login |
| GET     | /Orders/Show | OrderController | Felhasználói rendelések lekérése | - | Login |
| POST    | /logOut | AuthController | Felhasználó kijelentkeztetése | - | Login |

```

## Utvonalak Json kitöltése

###  /register
```json
{
	"name":"David",
	"address":"Magyary",
	"phone":"+2512551253",
	"email":"david@gmail.com",
	"password":"titok",
	"confirm_password":"titok"
}
```

###  /login
```json
{
	"email":"david@gmail.com",
	"password":"titok"
}
```

###  /Products/Store
```json
{
	"name":"g250",
	"price":32322,
	"details":"new key",
	"image":"sss",
	"inStock":10,
	"brand_id":"Urage",
	"categorie_id":"Monitor"
}
```

### /Orders/Store
```json
{
	"shippingAddress":"budapest",
	"phone":"3123131",
	"paymentMethod":"Card"
}
```

### /Users/NewsLetter
```json
{
	"email": "example@gmail.com"
}
```

### /Products/Search
```json
{
	"name": "hp"
}
```

### /Products/Brands
```json
{
	"name": "hp"
}
```

### /Products/categories
```json
{
	"name": "mouse"
}
```




