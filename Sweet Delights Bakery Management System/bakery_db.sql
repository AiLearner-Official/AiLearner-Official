-- Create the database
CREATE DATABASE IF NOT EXISTS bakery_db;
USE bakery_db;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert some sample users (optional)
-- Passwords are hashed versions of "password123"
INSERT INTO users (name, email, password) VALUES
('John Doe', 'john@example.com', '$2y$10$YourHashedPasswordHere'),
('Jane Smith', 'jane@example.com', '$2y$10$YourHashedPasswordHere');

-- Create products table (optional, for your bakery items)
CREATE TABLE IF NOT EXISTS products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    category VARCHAR(50)
);

-- Insert sample products
INSERT INTO products (name, description, price, category) VALUES
('Chocolate Cake', 'Rich chocolate cake with frosting', 25.99, 'Cakes'),
('Croissant', 'Fresh butter croissant', 3.50, 'Pastries'),
('Blueberry Muffin', 'Muffin with fresh blueberries', 4.25, 'Muffins'),
('Baguette', 'Traditional French bread', 2.99, 'Bread');

-- Create orders table (optional, for future use)
CREATE TABLE IF NOT EXISTS orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11),
    total DECIMAL(10,2),
    status VARCHAR(50) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);