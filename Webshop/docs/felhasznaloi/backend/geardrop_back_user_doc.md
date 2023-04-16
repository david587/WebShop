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
| Metódus | Elérés                 | Kontroller                    | Leírás                            | Bemenő paraméterek                      | Jogosultság |
| ------- | ---------------------- | ----------------------------  | --------------------------------  | --------------------------------------  | ----------- |
| POST    | /cartItems/{id}        | CartItemController            | Termék hozzáadása a kosárhoz      | Azonosító                               | Login       |
| GET     | /cartItems/show        | CartItemController            | Kosár tartalmának lekérése        | -                                       | Login       |
| DELETE  | /cartItems/delete/{id} | CartItemController            | Termék eltávolítása a kosárból    | Azonosító                               | Login       |
| POST    | /Orders/Store/         | OrderController               | Rendelés létrehozása a kosárból   | -                                       | Login       |
| GET     | /Orders/Show           | OrderController               | Felhasználói rendelések lekérése  | -                                       | Login       |
| POST    | /logOut                | AuthController                | Felhasználó kijelentkeztetése     | -                                       | Login       |

```

# Body-val rendelkező utvonalak

#  /register
#### Json
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
#### Response
```json
{
	"success": true,
	"data": {
		"name": "David33"
	},
	"message": "Sikeres regisztráció"
}
```

#  /login
#### Json
```json
{
	"email":"david@gmail.com",
	"password":"titok"
}
```


#  /Products/Store
#### Json
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
#### Response
```json
{
	"success": true,
	"data": {
		"id": 5,
		"name": "sounz400",
		"price": 10035,
		"details": "new headset",
		"image": "assets\/images\/urage_soundz400.png",
		"inStock": 10,
		"brand_id": "Urage",
		"categorie_id": "Headset"
	},
	"message": "Product Létrehozva"
}
```

#  /Products/Update/{id}
```json
{
	"name":"gamingLog",
	"price":212,
	"details":"now mouse",
	"image":"Product.img",
	"inStock":"",
	"brand_id":"Hp",
	"categorie_id":"Headset"
}
```

# /Products/Search
#### Json
```json
{
	"name": "redragon"
}
```
#### Response
```json
{
	"success": true,
	"data": [
		{
			"id": 6,
			"name": "s",
			"price": 1,
			"details": "22ss",
			"image": "1sasda",
			"inStock": 8888,
			"brand_id": "Redragon",
			"categorie_id": "Keyboard"
		},
		{
			"id": 7,
			"name": "Susan",
			"price": 12212,
			"details": "22ss",
			"image": "ss",
			"inStock": 2,
			"brand_id": "Redragon",
			"categorie_id": "Mouse"
		},
		{
			"id": 8,
			"name": "david",
			"price": 12212,
			"details": "22ss",
			"image": "sa2",
			"inStock": 1,
			"brand_id": "Redragon",
			"categorie_id": "Monitor"
		}
	],
	"message": "OK"
}
```

# /Brands/Store
#### Json
```json
{
	"brand": "Asus"
}
```
#### Response
```json
{
	"success": true,
	"data": {
		"id": 5,
		"brand": "Asus"
	},
	"message": "Brand létrehozva"
}
```

# /Categories/Store
#### Json
```json
{
	"categorie":"Mousepad"
}
```
#### Response
```json
{
	"success": true,
	"data": {
		"categorie": "Mousepad"
	},
	"message": "Categorie létrehozva"
}
```

# /Orders/Store
#### Json
```json
{
	"shippingAddress":"budapest",
	"phone":"3123131",
	"paymentMethod":"Card"
}
```
#### Response
```json
{
	"success": true,
	"data": [],
	"message": "All cart items added to Orders"
}
```
## Ha van már ilyen termék
#### Response
```json
{
	"success": true,
	"data": [],
	"message": "Product quantity increased"
}
```

# /Users/NewsLetter
#### Json
```json
{
	"email": "example@gmail.com"
}
```
#### Response
```json
{
	"success": true,
	"data": {
		"id": 1,
		"SubscribedEmail": "davidbarath08@gmail.com"
	},
	"message": "Subscribed"
}
```

# Body-val nem rendelkező utvonalak:
# /logOut
#### Response
```json

```

### /Products
#### Response
```json
{
	"success": true,
	"data": [],
	"message": "OK"
}
```





