CREATE DATABASE IF NOT EXISTS shop_db;
USE shop_db;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT
);

INSERT INTO products (name, price, description) VALUES
('Смартфон', 1600,00, 'Модерен смартфон с висока производителност '),
('Лаптоп', 2400.00, 'Мощен геймърски лаптоп за работа, игри и стрийминг'),
('Таблет', 800.00, 'Компактен таблет с голям екран и дълъг живот на батерията'),
('Смарт часовник', 700.00, 'Смарт часовник с множество функции за здраве и фитнес');
