-- luxury_cars.sql
CREATE DATABASE IF NOT EXISTS luxury_cars_db;
USE luxury_cars_db;

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Cars table
CREATE TABLE cars (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    brand VARCHAR(100) NOT NULL,
    price DECIMAL(12,2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description TEXT,
    specifications TEXT,
    status ENUM('available', 'sold') DEFAULT 'available',
    featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bookings table
CREATE TABLE bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    car_id INT NOT NULL,
    booking_date DATE NOT NULL,
    message TEXT,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE CASCADE
);

-- Testimonials table
CREATE TABLE testimonials (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contacts table
CREATE TABLE contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO users (name, email, password, role) VALUES
('Admin User', 'admin@luxurycars.com', '$2y$10$YourHashedPasswordHere', 'admin'),
('John Doe', 'john@example.com', '$2y$10$YourHashedPasswordHere', 'user');

INSERT INTO cars (title, brand, price, image, description, specifications, featured) VALUES
('Mercedes-Benz S-Class', 'Mercedes-Benz', 120000.00, 'mercedes-s-class.jpg', 'Experience unparalleled luxury with the Mercedes-Benz S-Class. The pinnacle of automotive excellence.', 'V8 Engine, 496 HP, 0-60: 4.5s, Luxury Package', TRUE),
('BMW 7 Series', 'BMW', 115000.00, 'bmw-7-series.jpg', 'The ultimate luxury sedan with cutting-edge technology and exceptional comfort.', 'V6 TwinPower Turbo, 335 HP, Executive Package', TRUE),
('Audi A8 L', 'Audi', 110000.00, 'audi-a8.jpg', 'Progressive luxury with innovative technology and timeless design.', 'V6 TFSI, 335 HP, Premium Plus Package', TRUE),
('Porsche 911 Turbo S', 'Porsche', 225000.00, 'porsche-911.jpg', 'Unmatched performance meets daily usability in this iconic sports car.', '3.8L Twin-Turbo, 640 HP, 0-60: 2.6s', FALSE),
('Lamborghini Aventador', 'Lamborghini', 450000.00, 'lamborghini-aventador.jpg', 'The epitome of supercar performance with dramatic Italian design.', 'V12, 740 HP, 0-60: 2.9s', TRUE);

INSERT INTO testimonials (user_name, message, rating) VALUES
('Michael Anderson', 'Exceptional service! The luxury car buying experience was seamless and professional.', 5),
('Sarah Johnson', 'The quality of vehicles is outstanding. The attention to detail is remarkable.', 5),
('Robert Chen', 'Best luxury car dealership I have ever visited. Highly recommended!', 5);