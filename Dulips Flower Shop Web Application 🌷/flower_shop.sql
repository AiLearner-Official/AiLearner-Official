CREATE DATABASE flower_shop_db;
USE flower_shop_db;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    image_url VARCHAR(255),
    discount_percent INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT,
    total_price DECIMAL(10, 2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);


INSERT INTO products (name, description, price, category, image_url, discount_percent) VALUES
('White Bouquets', 'Beautiful white flower arrangement', 1490.00, 'Bouquets', 'images/download__31_-removebg-preview.png', 40),
('Purple Daisy', 'Vibrant purple daisy bouquet', 2120.00, 'Daisies', 'images/download__29_-removebg-preview.png', 40),
('Pink Petals', 'Soft pink petal arrangement', 1290.00, 'Roses', 'images/download__27_-removebg-preview.png', 30),
('Flora Sense', 'Mixed floral bouquet', 3229.00, 'Mixed', 'images/flower_bouqet-removebg-preview.png', 30),
('The Daffodils', 'Bright yellow daffodils', 4100.00, 'Spring Flowers', 'images/download__32_-removebg-preview.png', 20);