


CREATE DATABASE IF NOT EXISTS ecommerce_db;
USE ecommerce_db;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image_path VARCHAR(255),
    pdf_path VARCHAR(255) NULL,
    created_by INT NULL,
    updated_by INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);


CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    image_path VARCHAR(255) NULL,
    created_by INT NULL,
    updated_by INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);


CREATE TABLE pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(50) NOT NULL UNIQUE,
    title VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    updated_by INT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);


CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(200),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO users (name, email, password, role) VALUES
('Administrator', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

INSERT INTO pages (slug, title, content) VALUES
('home', 'Faqja Kryesore', '<h4>Zbulo Koleksionin</h4><h1>Oferte Mujore</h1><p>Shiko me shume & deri ne 70% zbritje</p>'),
('about', 'Rreth nesh', '<h2>Kush jemi ne?</h2><p>Jemi nje dyqan online per skincare dhe bukuri. Shesim produkte te mira nga marka te njohura.</p><p>Dorëzim i shpejtë.</p>');

INSERT INTO products (title, description, price, image_path, created_by) VALUES
('Butta Drop Body Cream', 'Butta Drop Whipped Oil Body Cream with Tropical Oils + Shea Butter', 39.90, 'images/skincare/skincare1.webp', 1),
('SPF 30 Sunscreen', 'SPF 30 Sunscreen with Niacinamide + Kalahari Melon', 37.50, 'images/skincare/skincare2.webp', 1),
('Fenty Treatz Lip Oil', 'Fenty Treatz Hydrating + Strengthening Lip Oil', 29.90, 'images/skincare/skincare3.webp', 1);

INSERT INTO news (title, content, image_path, created_by) VALUES
('Oferta e re', 'Deri ne 70% zbritje ne shumicen e artikujve. Shiko koleksionin!', 'images/skincare/promotion.png', 1),
('Dorëzim falas', 'Tani dergojme falas per porosi mbi 50€.', 'images/skincare/shipping.png', 1);
