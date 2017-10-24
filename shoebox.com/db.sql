USE shoebox;

CREATE TABLE products (
    product_id SMALLINT UNSIGNED AUTO_INCREMENT,
    product_name VARCHAR(20) NOT NULL,
    description VARCHAR(200),
    brand VARCHAR(20) NOT NULL,
    gender ENUM('men','women','kids') NOT NULL,
    price FLOAT(6,2) NOT NULL,
    CONSTRAINT pk_product_id PRIMARY KEY (product_id)
);

INSERT INTO products (product_name, description, brand, gender, price) VALUES
("Adidas NMD 500", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.", "Adidas", "men", 100),
("Nike HyperX 300", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.", "Nike", "men", 100),
("New Balance 520", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.", "New Balance", "men", 250),
("Puma 250", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.", "Puma", "women", 109),
("Puma 300", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.", "Puma", "women", 109),
("Puma 880", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.", "Puma", "kid", 69),
("Puma 666", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.", "Puma", "men", 109);

CREATE TABLE product_variants (
    product_variant_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id SMALLINT UNSIGNED NOT NULL,
    size TINYINT UNSIGNED NOT NULL,
    color VARCHAR(20) NOT NULL,
    CONSTRAINT fk_product_id FOREIGN KEY (product_id) REFERENCES products (product_id)
);

INSERT INTO product_variants (product_id, size, color) VALUES 
(1, 42, "Black"),
(1, 35, "Black"),
(1, 36, "Black"),
(1, 42, "Red"),
(1, 39, "Red"),
(1, 42, "Blue"),
(1, 42, "White");

CREATE TABLE users (
    user_id: VARCHAR(36) NOT NULL PRIMARY KEY,
    username: VARCHAR(16) NOT NULL,
    email: VARCHAR(50) NOT NULL,
    hash: VARCHAR(64) NOT NULL,
    CONSTRAINT UNIQUE KEY uk_username
    CONSTRAINT UNIQUE KEY uk_email
);

CREATE TABLE cart_item (
    item_id: INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id: VARCHAR(35),
    product_variant_id: SMALLINT UNSIGNED,
    quantity: TINYINT UNSIGNED,
    CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users,
    CONSTRAINT fk_product_variant_id FOREIGN KEY (product_variant_id) REFERENCES product_variants
);


-- CREATE TABLE order (
--     order_id
-- );

-- CREATE TABLE order_item (
--     order_item_id
-- );


-- CREATE TABLE variants (
--     variant_id: SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
--     variant_name: VARCHAR(15) NOT NULL,
-- );

-- CREATE TABLE variant_values (
--     value_id: SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     product_id: SMALLINT UNSIGNED,
--     variant_name: VARCHAR(15),
--     value: VARCHAR(15),
--     CONSTRAINT fk_product_id FOREIGN KEY (product_id) REFERENCES products
-- );

-- CREATE TABLE product_variants (
--     product_variant_id: SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     product_id: SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
--     product_variant_name: VARCHAR(50),
--     CONSTRAINT fk_product_id FOREIGN KEY (product_id) REFERENCES products,
-- );

-- CREATE TABLE product_variant_details (
--     detail_id: SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     product_variant_id: SMALLINT UNSIGNED,
--     value_id: SMALLINT UNSIGNED,
--     CONSTRAINT fk_product_variant_id FOREIGN KEY (product_variant_id) REFERENCES product_variants,
--     CONSTRAINT fk_value_id FOREIGN KEY (value_id) REFERENCES variant_values
-- );

