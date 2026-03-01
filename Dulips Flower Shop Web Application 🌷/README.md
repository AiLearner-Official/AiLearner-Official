# 🌷 How to Run Dulips Flower Shop Project

## 1️⃣ Install Requirements

Install a local server environment:

-   XAMPP (Recommended)
-   WAMP
-   MAMP

------------------------------------------------------------------------

## 2️⃣ Move Project Folder

1.  Extract the project zip file
2.  Copy the **dulips** folder
3.  Paste it inside:

```{=html}
<!-- -->
```
    xampp/htdocs/

------------------------------------------------------------------------

## 3️⃣ Create Database

1.  Open **phpMyAdmin**
2.  Create a new database:

```{=html}
<!-- -->
```
    flower_shop

3.  Import the file:

```{=html}
<!-- -->
```
    flower_shop.sql

------------------------------------------------------------------------

## 4️⃣ Configure Database Connection

Open file:

    config.php

Update credentials if needed:

``` php
$host = "localhost";
$username = "root";
$password = "";
$database = "flower_shop";
```

------------------------------------------------------------------------

## 5️⃣ Run the Project

1.  Start **Apache** and **MySQL** from XAMPP
2.  Open browser and go to:

```{=html}
<!-- -->
```
    http://localhost/dulips/

------------------------------------------------------------------------

## ✅ Done

Signup → Login → Use Flower Shop System
