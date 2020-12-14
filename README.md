# Költségkövető

A program egy költségkövető weblapot reprezentál, amiben a felhasználó havonta tudja rögzíteni a költségeit és bevételeit.
A költségek és bevételek kategorizálva szerepelnek a weboldalon. 
A program használatához szükséges egy felhasználói fiók. Amit az oldalon történő regisztráció biztosít.
**Regisztrációhoz szükséges adatok:**
* **A felhasználó teljes neve**
* **A felhasználó email címe**
* **A későbbi bejelentkezéshez szükséges jelszó**

A regisztráció után a bejelentkezés oldal következik, ahol a felhasználó beléphet az **email cim** és a hozzá tartozó **jelszó** megadásával. A weboldal **6 fő** funkciót lát el.

**1. Költségek rögzítése:**
* **7 különböző költség kategóría közül választhat a felhasználó:**
    *  **Utazás**
    * **Élelmiszer**
    * **Vásárlás**
    * **Ajandék**
    * **Egészségügy**
    * **Család**
    * **Szabadidő**

**2. Bevételek rögzítése:**
* **2 különböző bevétel kategóría közül választhat a felhasználó:**
    * **Fizetés**
    * **Egyéb bevétel**

**3. Áttekintés:**
A felhasználónak lehetősége van arra, hogy megtekintse havi felosztásban összegezve a költségeket, amelyeket korábban már rögzített. Ezt egy táblázatban tudja megtenni, amely a legfrísebb adatok szerint van sorba rendezve.

**4. Beállítások:**
A felhasználó itt tudja a fiókjához tartozó adatokat módosítani.
Ehhez a következő adatokat kell megadnia:
* **A felhasználó teljes neve**
* **A későbbi bejelentkezéshez szükséges új jelszó**
* **Az aktuális jelszó**

**5. Hónap váltás**
A költésgek rögzítése oldalon és a bevételek rögzítése oldalon lehetősége van a felhasználónak arra, hogy az elöző hónapokban rögzített adatokat megtekintse és szerkessze azokat. 

**6. Elözmények**
A költésgek rögzítése oldalon és a bevételek rögzítése oldalon a felhasználónak lehetősége van arra, hogy az adott hónapban megtekintse, mely időpontokban rögzített költséget vagy bevételt és az adott trankzakciónak az összegét.

# A program használatához szükséges programok

A program futtatásához a `XAMPP 7.4.11` verziója szükséges!
A `XAMPP` applikációban az `APACHE` és a `MYSQL` elindítására is szükségünk van.

# Használati útmutató
A program futtatásához szükséges elhelyezni a fájl tartalmát a `XAMPP/htdocs` mappában.

A program megfelelő mükődéséhez importálni kell a `phpMyAdmin` felületén az adatbázist. 
A `phpMyAdmin` elérhető a `XAMPP` applikációban az `Admin` fülre kattintva.
Az importáláshoz szükséges sql script:
https://github.com/norbert15/cost-tracker/blob/main/cost_tracker.sql

A folyamatok elvégzése után a következő oldalon érhető el a weboldal:
http://localhost/cost-tracker/login/login-page.php

# Felhasznált technológiák
* **JQuery 3.5.1**
* **JavaScript**
* **HTML5**
* **CSS**
* **Bootstrap 4.5.3**
* **PHP 5.2.0**