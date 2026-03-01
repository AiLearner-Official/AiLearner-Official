# 🧁 Sweet Delights Bakery Management System

## 📌 Project Overview

**Sweet Delights Bakery Management System** is a web-based application developed using PHP and MySQL.  
The system allows users to browse bakery products, register/login, add products to the cart, and submit reviews.

This project demonstrates core web development concepts including:

- User Authentication  
- CRUD Operations  
- Database Connectivity  
- Session Handling  
- Frontend-Backend Integration  

It is suitable for academic submission and beginner-level e-commerce implementation.

---

## 🎯 Project Objectives

- Provide an online bakery product listing system  
- Implement user authentication (Register/Login)  
- Allow customers to add products to cart  
- Enable customers to submit reviews  
- Connect frontend interface with MySQL database  

---

## 🛠️ Technologies Used

- PHP (Backend)
- MySQL (Database)
- HTML5
- CSS3
- JavaScript
- XAMPP (Apache Server)

---

## 🚀 Features

- 🔐 User Registration & Login System  
- 🏠 Homepage with Product Listings  
- 🛒 Add to Cart Functionality  
- 📋 Cart View Page  
- ⭐ Review Submission System  
- 📊 User Dashboard  
- 🔌 Database Connection Test File  
- 🎨 Simple Responsive UI  

---

## ⚙️ Installation & Execution Guide

Follow these steps to run the project locally:

### 1️⃣ Install XAMPP

Download and install XAMPP on your system.

### 2️⃣ Start Apache & MySQL

Open XAMPP Control Panel and start:

- Apache
- MySQL

### 3️⃣ Move Project Folder

1. Extract the project zip file.
2. Copy the `bakery` folder.
3. Paste it inside:
C:\xampp\htdocs\


Final directory should be:


C:\xampp\htdocs\bakery


---

## 🗄️ Database Setup

### Step 1: Open phpMyAdmin

Open your browser and visit:


http://localhost/phpmyadmin


### Step 2: Create Database

Create a new database named:


bakery_db


### Step 3: Import SQL File

1. Click on `bakery_db`
2. Go to **Import**
3. Select file: `bakery_db.sql`
4. Click **Go**

---

## 🔧 Database Configuration

Open the file:


connect.php


Ensure the database credentials are:

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bakery_db";

If your MySQL password is different, update accordingly.

▶️ Running the Project

After setup, open your browser and visit:

http://localhost/bakery

The homepage will load.

📂 Project Structure
bakery/
│
├── index.php
├── auth.php
├── dashboard.php
├── cart.php
├── add_to_cart.php
├── upload_review.php
├── reviews.php
├── connect.php
├── test_db.php
├── bakery_db.sql
├── style.css
├── script.js
├── images/
└── uploads/
🧪 Testing Database Connection

Open:

http://localhost/bakery/test_db.php

If connected successfully, the database is working properly.

🔮 Future Enhancements

Admin Panel for product management

Payment gateway integration

Order history management

Product search and filtering

Email verification system

Improved UI/UX design
