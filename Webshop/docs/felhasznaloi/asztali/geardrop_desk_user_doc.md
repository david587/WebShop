# Gear drop Admin felület
## Felhasználói dokumentáció

Az alkalmazás a termékek és a felhasználók kezelésére. Új termék felvétele és módosítása
ezen felül márkák és kategóriák kezelésére szolgál, illetve a más felhasználónak admin jog
adása és hírlevél elküldése.

## üzembe helyezés

### terminálba megadott parancsok

* 'npm install' a node könyvtár létrehozása
* 'ng serve' a szerver leindítása
* 'npm start' az electron az asztali alkalmazás indítása

## Használata

Bejelentkezés, Az admi kap egy személyre szabott felhasználó nevet és jelszót amivel be tud
jelentkezni.

Products:  

  Products fülön lehet új terméket hozzá adni az add gombra kattintva és már meglévő
  terméket módosítani az edit gomb segítségével és végül törölni a delete gombbal.
  Az add gomb lenyomása után feljön egy újablak amibe az új termék adatait kell beírni, majd a save gombal elmentésre kerül.
  
Users:

  Users fülön láthatók a felhasználók illetve itt lehet admin jogot adni más felhasználóknak, az
  admin gom lenyomásával a felhasználó kap egy dátumot és ez mutatja hogy mikortól admin.
  A delete gom gom lenyomásával lehet törölni az adott felhasználót.
  
Categories:

  Categories fülön láthatóak a termékek kategóriái, az add gombbal lehet új kategóriát hozzáadni.
  Az add gomb lenyomása után feljön egy újablak amibe az új kategóríát adhatun hozzá, majd a save gombal elmentésre kerül.
  
Brands:

  Brands fülön láthatóak a termékek márkái, az add gombbal lehet új márkát hozzáadni.
  Az add gomb lenyomása után feljön egy újablak amibe az új márkát adhatun hozzá, majd a save gombal elmentésre kerül.
  
  Email:
  
  Email fülön láthatóak a hírlevélre felíratkozott email címek, a send email gombal küldjuk ki a hírlevelet a fülön látható email címekre
  
