
# GearDrop Webshop
## Fejlesztői dokumentáció - desktop

## Felhasznált technológiák:

  - OS: win32 x64
  - Angular CLI: 15.0.3 
  - Node: 18.10.0 
  - Package Manager: npm 8.19.2
  - Electron
  - Bootstrap: 5.3

## Projekt elindítása

## desktop

  - 'npm install' a node könyvtár létrehozása
  - 'ng serve' a szerver leindítása
  - 'npm start' az electron az asztali alkalmazás indítása

## Felépítés

### Könyvtárszerkezet

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


  ### api service metódusai:

  #### getProducts metódus
  
   * A metódus felel a termékek megjelenitésért felel, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Products' végponttal érie, get metódust használ.
   * Nincsen bemeneti paraméterek a metódusban.
   * Visszatérési érték: 'get' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### addProduct metódus
  
  * A metódus felel az új termék felvételért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Products/Store' végponttal érie, post metódust használ, szükséges a token azonosítás.
  * Paraméter: 'data: any': Ez a bemeneti paraméter tartalmazza az adatokat, amelyeket az új termék létrehozásához szeretnénk felhasználni.
  * Visszatérési érték: Visszatérési érték: 'post' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### deleteProduct metódus
  
 * A metódus felel az adott termék töréséért id alapján, url az apihost változóból és az endpoint változóból "/" plusz az adott termék id ból állössze. A Rest Api a 'Products/Delete' végponttal érie, delete metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
 * Paraméter: 'id: number': Ez a bemeneti paraméter tartalmazza azon termék azonosítóját, amelyet törölni szeretnénk.
 * Visszatérési érték: 'delete' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### updateProduct metódus
  
 * A metódus felel a már meglévő retmékek módositásáért, url az apihost változóból és az endpoint plusz az adott termék id ából változóból állössze. A Rest Api a 'Products/Update' végponttal érie, post metódust használ, szükséges az azonosítás.
 * Paraméter: 'product: any': Ez a bemeneti paraméter tartalmazza azon termék objektumot, amelyet módosítani szeretnénk.
 * Visszatérési érték: 'post' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### getUsers metódus
  
 * A metódus felel a felhasználók megjelenítéséért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Users/Show' végponttal érie, get metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
 * Nincsen bemeneti paraméterek a metódusban.
 * Visszatérési érték: 'get' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### giveAdmin metódus 
  
 * A metódus felel az admin jog adásért, url az apihost változóból és az endpoint plusz az id ból változóból állössze. A Rest Api a 'Users/Admin' végponttal érie, post metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
 * Paraméter: 'id: any': Ez a bemeneti paraméter tartalmazza azon felhasználó azonosítóját, akinek admin jogot szeretnénk.
 * Visszatérési érték: 'post' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### getEmails metódus
  
 * A metódus felel az email-ek megjelenitésért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Emails' végponttal érie, get metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
 * Nincsen bemeneti paraméterek a metódusban.
 * Visszatérési érték: 'get' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### sendEmail metódus
  
  * A metódus felel a hírlevelek kiküldéséért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'sendEmail' végponttal érie, get metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
  * Nincsen bemeneti paraméterek a metódusban.
  * Visszatérési érték: 'get' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### deleteUser metódus
  
 * A metódus felel a felhasználó törléséért id alapján,  url az apihost változóból és az endpoint változóból "/" plusz az adott felhasználó id ából állössze. A Rest Api a 'Users/Delete' végponttal érie, delete metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
 * Paraméter: 'id: number': Ez a bemeneti paraméter tartalmazza azon felhasználó azonosítóját, amelyet törölni szeretnénk.
 * Visszatérési érték: 'delete' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### getBrands metódus
  
 * A metódus felel a márkák megjelenitéséért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Brands/Index' végponttal érie, get metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
 * Nincsen bemeneti paraméterek a metódusban.
 * Visszatérési érték: 'get' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### addBrand metódus
  
  * A metódus felel a új márka hozzáadáséet,  url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Brands/Store' végponttal érie, post metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
  * Paraméter: 'data: any': Ez a bemeneti paraméter tartalmazza az adatokat, amelyeket az új márka létrehozásához szeretnénk felhasználni.
  * Visszatérési érték: 'post' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### deleteBrand metódus
  
 * A metódus felel a mátka törléséért, url az apihost változóból és az endpoint "/" plusz az adott márka id ából állössze. A Rest Api a 'Brands/Delete' végponttal érie, delete metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
 * Paraméter: 'id: number': Ez a bemeneti paraméter tartalmazza azon márka azonosítóját, amelyet törölni szeretnénk.
 * Visszatérési érték: 'delete' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### getCategories metódus
  
  * A metódus felel a kategotiák megjelenitéséért, url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Categories/Index' végponttal érie, get metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: 'get' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### addCategorie metódus
  
  * A metódus felel a új katekoria hozzáadáséet,  url az apihost változóból és az endpoint változóból állössze. A Rest Api a 'Categories/Store' végponttal érie, post metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
  * Paraméter: 'data: any': Ez a bemeneti paraméter tartalmazza az adatokat, amelyeket az új kategoria létrehozásához szeretnénk felhasználni.
  * Visszatérési érték: 'post' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### deleteCategorie metódus
  
  * A metódus felel a kategoria törléséért, url az apihost változóból és az endpoint "/" plusz az adott márka id ából állössze. A Rest Api a 'Categories/Delete' végponttal érie, delete metódust használ, szükséges a token azonosítás amit a helyi tárolóban található.
  * Paraméter: 'id: number': Ez a bemeneti paraméter tartalmazza azon kategoria azonosítóját, amelyet törölni szeretnénk.
  * Visszatérési érték: 'delete' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  
  ### auth service metodusai:
  
  #### login
  
  * A metódus felel az admin bejelentkezéséért, url az apihost változóból és az endpoint változóbólából állössze.A Rest Api a 'login' végponttal érie, post metódust használ.
  *  Paraméterek: 'email: string', 'pass: string': Az 'email' bemeneti paraméter tartalmazza az admin email címét, 'pass' bemeneti paraméter tartalmazza az admin jelszavát.
  * Visszatérési érték: 'post' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  #### logout
 
  *  A metódus felel az admin kijelentkeztetéséért, url az apihost változóból és az endpoint változóbólából állössze.A Rest Api a 'LogOut' végponttal érie, post metódust használ.
  *  Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  *  Visszatérési érték: 'post' metódus típusa 'any', amely azt jelzi, hogy a metódus bármilyen típusú választ képes visszaadni.
  
  ####  isLoggedIn
  
  * A metódus azt nézi hogy be van e jelentkezve az admin vagy nincs.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: egy boolean értékkel tér vissza, ami azt jelzi, hogy a felhasználó be van-e jelentkezve vagy sem.
  
  ### emitter service metodusai:
  
  * Két komponens kommunikációját hoza létre
  
  #### onButton
  
  * A medódus létre hozza az event meit metódust és ezzel tud kommunikálmi két metódus.

 ### brands service metodusai:
 
 #### külső változók
 
 * 'brandForm: FormGroup': Egy FormGroup objektum, amely a brand adatokat tartalmazza.
 * 'brands: any[]': Egy tömb, amely tartalmazza a márka adatokat.
 * 'message: any': Egy változó, amely tárolja a üzenetet a sikeres műveletek során.
 * 'errmess: any': Egy változó, amely tárolja a hibaüzenetet sikertelen műveletek esetén.

 #### constructor paraméterei
 
 * 'api: ApiService': Egy szolgáltatás osztály példánya, amely az API kommunikációt végzi.
 * 'formBuilder: FormBuilder': Egy FormBuilder objektum, amelyet a brandForm FormGroup létrehozásához használunk.
 * 'ngZone: NgZone': Egy NgZone objektum, amelyet a showMessage metódus futtatásához használunk.
 
 #### ngOnInit metódus
 
 * Az Angular metódusa, amely az osztály példányosításakor hívódik meg. Itt inicializáljuk a brandForm-ot és meghívjuk a getBrands 
 * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
 * Visszatérési érték: Nincek visszatérési érték.
 
 #### getBrands metódus
 
 * Lekéri a márkákat az API segítségével és beállítja az eredményt a brands tömbbe. Ezen kívül meghívja a showMessage metódust.
 * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
 * Visszatérési érték: Nincek visszatérési érték.
 
 #### onClick metódus
 
 * A gombra kattintva meghívja az 'addBrand' metódus.
 * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
 * Visszatérési érték: Nincek visszatérési érték.
 
 #### addBrand metódus
 
 * Hozzáad egy új márkát az API-n keresztül a brandForm űrlapban megadott érték alapján. Az adatokat elküldi a api.addBrand() metódusnak és megfigyeli a választ.
 * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
 * Visszatérési érték: Nincek visszatérési érték.
 
 #### clearField metódus
 
 * Törli a brandForm mező értékét.
 * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
 * Visszatérési érték: Nincek visszatérési érték.
 
 #### deleteBrand metódus
 
 * Törli a megadott azonosítójú márkát az API-n keresztül. Beállítja az üzenetet, majd meghívja a getBrands és a showMessage metódusokat
 * Paraméter: id: number - A törlendő márkát azonosítója.
 * Visszatérési érték: Nincek visszatérési érték.
 
 #### showMessage metódus
 
 * Beállítja az üzenetet vagy hibaüzenetet, majd a ngZone segítségével beállít egy időzítést, amely 4 másodperc múlva törli az üzenetet és az errmess változó értékét.
 * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
 * Visszatérési érték: Nincek visszatérési érték.
  
  ### brands service metodusai:
  
  #### külső változók
   
  * 'message: any': Egy változó, amely tárolja a üzenetet a sikeres műveletek során.
  * 'errmess: any': Egy változó, amely tárolja a hibaüzenetet sikertelen műveletek esetén.
  
  #### constructor paraméterei
  
  * 'api: ApiService': Egy példány az ApiService osztályból, amely a kategóriákkal kapcsolatos API hívásokat kezeli.
  * 'formBuilder': FormBuilder: Egy példány a FormBuilder osztályból, amely segítséget nyújt a formok kezeléséhez.
  * 'ngZone: NgZone': Egy példány az NgZone osztályból, amely segítséget nyújt a változások aszinkron módon történő frissítéséhez az Angular környezetben.

  
  #### ngOnInit metódus
  
  * Ez a metódus az Angular életciklus hook-jának része, és akkor hívódik meg, amikor a CategoriesComponent inicializálódik.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### getCategories metódus
  
  * Ez a metódus lekéri a kategóriákat az api.getCategories() metódus segítségével, majd beállítja a kategóriák tömbjét és megjeleníti az üzenetet.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### onClick metódus
  
  * Ez a metódus meghívja az addCategories() metódust.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### addCategories metódus
  
  * Ez a metódus hozzáad egy új kategóriát a megadott adatok alapján a this.api.addCategorie() metódus segítségével. Ezután törli a mező tartalmát, frissíti a kategóriákat és megjeleníti az üzenetet.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
   
  #### clearField metódus
  
  * Ez a metódus törli a mező tartalmát a this.categorieForm mező inCategorie értékének üres stringre állításával.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### deleteCategorie metódus
  
  * Ez a metódus törli a kategóriát a megadott azonosító alapján a this.api.deleteCategorie(id) metódus segítségével. Ezután frissíti a kategóriákat és megjeleníti az üzenetet.
  * Paraméter: 'id: number' A törlendő kategória azonosítója.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### showMessage metódus
  
  * Ez a metódus beállítja a message és errmess mezőket üres stringre a ngZone.run() metódus segítségével, majd 4 másodperc múlva törli az üzeneteket.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
   ### dashboard service metodusai:
 
 #### külső változók
 
  * 'name: any': Ez a változó tárolja a "name" értékét a localStorage-ból.

#### ngOnInit metódus

  * Ez a metódus az Angular életciklus hook-jának része, és akkor hívódik meg, amikor a DashboardComponent inicializálódik. Ebben az esetben a metódus meghívja a getname() metódust.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.

#### getname metódus

  * Ez a metódus a localStorage-ból lekéri a "name" kulcshoz tartozó értéket, majd beállítja azt a "name" nevű változóban.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.

 ### email service metodusai:
  
  #### külső változók
  
  * 'emailForm !: FormGroup': Ez a változó tárolja az email formját.
  * 'emails:any = []': Ez a változó tárolja az emaileket tömbeb.
  * 'message!:any': Ez a változó tárolja az üzenetet, amelyet megjelenítünk az email műveletek eredményével kapcsolatban.
  
  #### constructor paraméterei
  
  * 'api: ApiService': Ez a változó tárolja az ApiService osztály egy példányát, amelyet a komponens használ a HTTP kérések végrehajtásához.
  * 'ngZone: NgZone': Ez a változó tárolja az NgZone osztály egy példányát, amelyet a komponens használ a zone-ok közötti aszinkronitás kezeléséhez.
  
  #### ngOnInit metódus
  
  * Ez a metódus az Angular életciklus hook-jának része, és akkor hívódik meg, amikor az EmailComponent inicializálódik. Ebben az esetben a metódus meghívja az getEmails() metódust.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### getEmails metódus
  
  * Ez a metódus lekéri az emaileket az api.getEmails() metódus segítségével, majd beállítja az "emails" tömböt és megjeleníti az üzenetet.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### sendEmail metódus
  
  * Ez a metódus elküldi az emailt az api.sendEmail() metódus segítségével. Ha a kérés sikeres, megjeleníti az üzenetet. Ha hiba történik, a "message" változó értékét "sikeresen elküldve!"-re állítja, majd megjeleníti az üzenetet.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### showMessage metódus
  
  * Ez a metódus beállítja a "message" változót üres stringre a ngZone.run() metódus segítségével, majd 4 másodperc múlva törli az üzenetet.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
   ### login service metodusai:
  
  #### külső változók
  
  * 'loginForm !: FormGroup': Ez a változó tárolja a bejelentkezési űrlapot.
  
  #### constructor paraméterei
  
  * 'formBuilder: FormBuilder': A FormBuilder osztály egy példánya, amelyet a komponens használ az űrlap létrehozásához és kezeléséhez.
  * 'auth: AuthService': Az AuthService osztály egy példánya, amelyet a komponens használ a bejelentkezési műveletek végrehajtásához és az autentikációhoz.
  * 'router: Router': A Router osztály egy példánya, amelyet a komponens használ a navigációhoz és az útvonalak kezeléséhez.
  * 'emit: EmitterService': Az EmitterService osztály egy példánya, amelyet a komponens használ az események kibocsátásához.
  
  #### ngOnInit metódus
  
  * Ez a metódus az Angular életciklus hook-jának része, és akkor hívódik meg, amikor a LoginComponent inicializálódik. Ebben az esetben a metódus létrehozza a loginForm űrlapot a formBuilder segítségével.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### login metódus
  
  * Ez a metódus végrehajtja a bejelentkezést. Az email és jelszó adatokat kiolvassa a loginForm űrlapból, majd meghívja az auth.login(email, pass) metódust, hogy azonosító adatokat küldjön az authentikációs szolgáltatásnak. Az eredménytől függően a megfelelő műveleteket hajtja végre, például a token és a felhasználó nevének tárolása a localStorage-ban, az űrlap törlése, a dashboard oldalra navigálás és egy esemény kibocsátása.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.

 ### email service metodusai:
  
  #### külső változók
  
  * 'loginVisible:any': Ez a változó tárolja, hogy a bejelentkezési gomb látható-e a navigációs sávban.
  * 'logoutVisible:any': Ez a változó tárolja, hogy a kijelentkezési gomb látható-e a navigációs sávban.

  #### constructor paraméterei
  
  * 'auth: AuthService': Az AuthService osztály egy példánya, amelyet a komponens használ a bejelentkezési és kijelentkezési műveletek végrehajtásához és az autentikációhoz.
  * 'router: Router': A Router osztály egy példánya, amelyet a komponens használ a navigációhoz és az útvonalak kezeléséhez.
  * 'emit: EmitterService': Az EmitterService osztály egy példánya, amelyet a komponens használ az események kibocsátásához.
  
  #### ngOnInit metódus
  
  * Ez a metódus az Angular életciklus hook-jának része, és akkor hívódik meg, amikor a NavbarComponent inicializálódik. Ebben az esetben a metódus feliratkozik az emit eseményre, és amikor az esemény bekövetkezik, meghívja a hideAuth() metódust.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### hideAuth metódus
  
  * Ez a metódus eldönti, hogy a bejelentkezési és kijelentkezési gombok láthatóak-e a navigációs sávban. Ha a localStorage-ban van token tárolva, akkor a kijelentkezési gomb lesz látható, különben a bejelentkezési gomb. A loginVisible és logoutVisible változók értékét ennek megfelelően állítja be.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
  
  #### logout metódus
  
  * Ez a metódus kijelentkezést hajt végre. Meghívja az auth.logout() metódust, ami törli a token-t a localStorage-ból. Ezután a logoutVisible változót hamisra állítja, és a loginVisible változót igazra állítja. Végül kiírja a token értékét a konzolra.
  * Paraméter: Nincsenek bemeneti paraméterek a metódusban.
  * Visszatérési érték: Nincek visszatérési érték.
   
   ### email service metodusai:
  
  #### külső változók
  
  * 'productForm !: FormGroup': Ez a FormGroup objektum a termék űrlapjához tartozó form csoportot reprezentálja, amely tartalmazza a termék adatait (név, ár, részletek, kép stb.).
  * 'editForm !: FormGroup': Ez a FormGroup objektum a szerkesztett termék űrlapjához tartozó form csoportot reprezentálja, amely tartalmazza a szerkesztett termék adatait (név, ár, részletek, kép stb.).
  * 'products:any = []': Ez az any[] típusú változó tárolja a termékek tömbjét.
  * 'message!:any': Ez az any típusú változó tárolja a üzenetet, amelyet meg kell jeleníteni a felhasználónak.
  * 'errmess: any': Ez az any típusú változó tárolja a hibaüzenetet, amelyet meg kell jeleníteni a felhasználónak.
  
   #### constructor paraméterei
   
   * 'api: ApiService': Az ApiService osztály egy példánya, amelyet a komponens használ az adatok lekérdezéséhez, hozzáadásához, törléséhez és frissítéséhez.
   * 'formBuilder: FormBuilder': A FormBuilder osztály egy példánya, amelyet a komponens használ űrlapok létrehozásához és kezeléséhez.
   * 'ngZone: NgZone': Az NgZone osztály egy példánya, amelyet a komponens használ az aszinkron műveletek kezeléséhez.
   
   #### ngOnInit metódus
   
   * Ez a metódus az OnInit interfész része, és a komponens inicializálásakor fut le. A metódus létrehozza a productForm és editForm FormGroup-okat, beállítja az alapértelmezett értékeket, és meghívja a getProducts metódust az adatok lekérdezéséhez.
   
   #### showMessage metódus
   
   * Ez a metódus a üzenetek (message és errmess) kezelésére szolgál. Beállítja a message és errmess változókat üres értékre, amelyeket a felhasználói felületen megjelenítünk. A metódus a ngZone.run metódust használja az Angular aszinkron műveletek kezelésére, és időzített időzítőt használ a message és errmess értékek törléséhez.
   
   #### getProducts metódus
   
   *Ez a metódus az ApiService segítségével lekéri a termékek adatait. Az előfizetéses megfigyelőt használja, és a válasz függvényét beállítja a products változóra, majd meghívja a showMessage metódust.
   
   #### onClick metódus
   
   * Ez a metódus meghívja az addProduct metódust.
   
   #### addProduct metódus
   
   * Ez a metódus hozzáad egy új terméket az api.addProduct metódus segítségével. Először létrehoz egy data objektumot, amely tartalmazza a termék adatait a productForm FormGroup-ból. Ezután meghívja a clearField metódust, amely törli a productForm mezőit. Az api.addProduct metódust előfizetéses megfigyelővel hívja meg, és a válasz függvényét beállítja a message változóra, majd meghívja a getProducts és showMessage metódusokat.
   
   #### clearField metódus
   
   * Ez a metódus üríti a productForm mezőit, beállítva azok értékét üresre.
   
   #### deleteProduct metódus
   
   * Ez a metódus törli a megadott azonosítójú terméket az api.deleteProduct metódus segítségével. Az id paraméterben adja át a termék azonosítóját. Az api.deleteProduct metódust előfizetéses megfigyelővel hívja meg, és a válasz függvényét beállítja a message változóra, majd meghívja a getProducts és showMessage metódusokat.
   * Paraméter: 'id: number' A törlendő termék azonosítója.
    
   #### editProduct metódus
   
   * Ez a metódus beállítja az editForm FormGroup mezőinek értékét a megadott termék adataival. A product paraméterben adja át a szerkeszteni kívánt termék objektumot. Az editForm.patchValue metódust használja a mezők értékeinek beállítására.
   * Paraméter: 'product: any' A szerkeszteni kívánt termék objektuma.
   
   #### updateProduct metódus
   
   * Ez a metódus frissíti a termék adatait az api.updateProduct metódus segítségével. Először létrehoz egy data objektumot, amely tartalmazza a frissítendő termék adatait az editForm FormGroup mezőiből. Az api.updateProduct metódust előfizetéses megfigyelővel hívja meg, és a válasz függvényét beállítja a message változóra, majd meghívja a getProducts és showMessage metódusokat.
  
  
  
  
  
  
