-- LFTMS DB schema
CREATE DATABASE IF NOT EXISTS lftms; USE lftms;
CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100), email VARCHAR(120) UNIQUE, password VARCHAR(255), role ENUM('admin','farmer','transporter'), phone VARCHAR(20), created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE species (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) NOT NULL, min_do FLOAT DEFAULT 4.0, max_do FLOAT DEFAULT 10.0, min_temp FLOAT DEFAULT 15.0, max_temp FLOAT DEFAULT 30.0, min_ph FLOAT DEFAULT 6.5, max_ph FLOAT DEFAULT 8.5);
CREATE TABLE vehicles (id INT AUTO_INCREMENT PRIMARY KEY, vehicle_no VARCHAR(50), capacity_kg INT DEFAULT 0, driver_name VARCHAR(100), driver_phone VARCHAR(20), created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE bookings (id INT AUTO_INCREMENT PRIMARY KEY, farmer_id INT NOT NULL, species_id INT NOT NULL, vehicle_id INT DEFAULT NULL, quantity_kg INT NOT NULL, source VARCHAR(150), destination VARCHAR(150), start_time DATETIME DEFAULT NULL, end_time DATETIME DEFAULT NULL, status ENUM('pending','assigned','in_transit','delivered','cancelled') DEFAULT 'pending', created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (farmer_id) REFERENCES users(id), FOREIGN KEY (species_id) REFERENCES species(id), FOREIGN KEY (vehicle_id) REFERENCES vehicles(id));
CREATE TABLE trip_positions (id INT AUTO_INCREMENT PRIMARY KEY, booking_id INT NOT NULL, lat DOUBLE NOT NULL, lng DOUBLE NOT NULL, recorded_at DATETIME DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (booking_id) REFERENCES bookings(id));
CREATE TABLE water_logs (id INT AUTO_INCREMENT PRIMARY KEY, booking_id INT NOT NULL, recorded_at DATETIME DEFAULT CURRENT_TIMESTAMP, temperature FLOAT, do_level FLOAT, ph_level FLOAT, notes VARCHAR(255), FOREIGN KEY (booking_id) REFERENCES bookings(id));
CREATE TABLE feedback (id INT AUTO_INCREMENT PRIMARY KEY, booking_id INT, user_id INT, rating TINYINT, comments TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
-- sample species
INSERT INTO species (name,min_do,max_do,min_temp,max_temp,min_ph,max_ph) VALUES ('Catla',4.0,8.0,18.0,30.0,6.5,8.5),('Rohu',4.0,8.0,18.0,30.0,6.5,8.5);
