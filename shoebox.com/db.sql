USE shoebox;

CREATE TABLE products (
    product_id: SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name: VARCHAR(20) NOT NULL,
    description: VARCHAR(50),
    brand: VARCHAR(20) NOT NULL,
    gender: ENUM('men','women','kids') NOT NULL,
    price: FLOAT(6,2) NOT NULL,
);

CREATE TABLE product_variants (
    product_variant_id: SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id: SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    size: TINYINT UNSIGNED NOT NULL,
    color: VARCHAR(20) NOT NULL,
    CONSTRAINT fk_product_id FOREIGN KEY (product_id) REFERENCES products,
);

CREATE TABLE users (
    user_id: VARCHAR(36) NOT NULL PRIMARY KEY,
    username: VARCHAR(16),
    email: VARCHAR(50),
    hash: VARCHAR(256),
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

