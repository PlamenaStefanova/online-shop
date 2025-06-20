CREATE DATABASE IF NOT EXISTS equestrian_db;
USE equestrian_db;


CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);


CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);

CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    equipment_id INT,
    quantity INT DEFAULT 1,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (equipment_id) REFERENCES equipment(id)
);

INSERT INTO categories (name) VALUES
('Екипировка'), ('Уроци'), ('Аксесоари');

INSERT INTO equipment (name, price, description, category_id) VALUES
('Състезателно седло', 1500.00, 'Професионално кожено седло за състезания по прескачане', 1),
('Юлар с олово', 120.00, 'Издръжлив юлар с метално олово за контрол върху коня', 3),
('Конски ботуши', 300.00, 'Защита за краката на коня по време на тренировки и състезания', 1),
('Урок по езда', 80.00, 'Индивидуален урок с професионален инструктор', 2);
