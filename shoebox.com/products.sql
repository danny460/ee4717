DELETE FROM cart_items WHERE item_id IS NOT NULL;
DELETE FROM orders WHERE order_id IS NOT NULL;
DELETE FROM product_variants WHERE product_variant_id IS NOT NULL;
DELETE FROM products WHERE product_id IS NOT NULL;
INSERT INTO products (product_id, product_name, description, brand, gender, price, pic_url) VALUES
    /*men*/
    (1, 'NIKE AIR FORCE 1', 'Air Force On The 1st High Tube Couple Sports Shoes 315123 Pure White', 'nike', 'men', 159.00, 'NIKE_AIR_FORCE_1.jpg'),
    /*blue*/
    (2, 'NIKE ROSHERUN', 'Couple Shoes 511882', 'nike', 'men', 76.00,  'NIKE_ROSHERUN.jpg'),
    /*white/red*/
    (3, 'Nike Flyknit', 'Nike Flyknit Max Braided Mesh Breathable Couple Running Shoes', 'nike', 'men', 155.00,  'Nike_Flyknit.jpg'),
    /*grey*/
    (4, 'EQT Support Ultra Primeknit King Push','A collaboration with the hip-hop artist, these shoes flash an adaptive adidas Primeknit upper with premium carp skin overlays and translucent details.', 'adidas', 'men', 339.00,  'DB0181_SL_eCom.jpg'),
    /*brown*/
    (5, 'Crazy Explosive 2017 Primeknit','Built for dizzying dunks and mean chase-down blocks, these basketball shoes cater to Andrew Wiggins\' high-flying game.', 'adidas', 'men', 259.00,  'BY4468_SL_eCom.jpg'),
    /*white/black/blue*/
    (6, 'Ultraboost All Terrain LTD','The highly responsive boost midsole in these men\'s running shoes delivers an energy-returning ride while a water-repellent upper wraps your foot in support and comfort.', 'adidas', 'men', 379.00,  'CG3003_SL_eCom.jpg'),
    /*black*/
/*women*/
    (51, 'Swift Run','Inspired by throwback sporty style, these women\'s shoes find the perfect balance between comfort and cushioning.', 'adidas', 'women', 149.00,  'CG4145_SL_eCom.jpg'),
    /*black/white*/
    (52, 'Iniki Runner','A celebrated adidas heritage runner gets a fresh update in these women\'s shoes. Built in a two-way stretch mesh and vintage suede upper, the archival look pops with an unexpected shiny mesh tongue.', 'adidas', 'women', 189.00,  'BY9095_SL_eCom.jpg'),
    /*pink*/
/*kids*/
    (101, 'AIR JORDAN XI RETRO THREE-QUARTER', 'The Air Jordan XI Retro Three-Quarter Toddler Shoe features the plush cushioning, unique lines and durability of the original, delivering the lasting comfort and bold look that made it famous.', 'nike', 'kids', 105.00, 'air-jordan-xi-retro-three-quarter-shoe.jpg'),
    (102, 'Superstar 360 Supercolor', 'A fresh take on the iconic adidas Originals Superstar trainer, these infants\' shoes stand out with bold colour and iridescent 3-Stripes.', 'adidas', 'kids', 69.00, 'BZ0554_SL_eCom.jpg');

INSERT INTO product_variants (product_id, size, color) VALUES 
(1, 35, "White"),
(1, 36, "White"),
(1, 37, "White"),
(1, 38, "White"),
(1, 39, "White"),
(1, 40, "White"),
(1, 41, "White"),
(1, 42, "White"),
(2, 35, "White"),
(2, 36, "White"),
(2, 37, "White"),
(2, 38, "White"),
(2, 39, "White"),
(2, 40, "White"),
(2, 41, "White"),
(2, 42, "White"),
(2, 35, "Red"),
(2, 36, "Red"),
(2, 37, "Red"),
(2, 38, "Red"),
(2, 39, "Red"),
(2, 40, "Red"),
(2, 41, "Red"),
(2, 42, "Red"),
(3, 35, "Grey"),
(3, 36, "Grey"),
(3, 37, "Grey"),
(3, 38, "Grey"),
(3, 39, "Grey"),
(3, 40, "Grey"),
(3, 41, "Grey"),
(3, 42, "Grey"),
(4, 35, "Brown"),
(4, 36, "Brown"),
(4, 37, "Brown"),
(4, 38, "Brown"),
(4, 39, "Brown"),
(4, 40, "Brown"),
(4, 41, "Brown"),
(4, 42, "Brown"),
(5, 35, "White"),
(5, 36, "White"),
(5, 37, "White"),
(5, 38, "White"),
(5, 39, "White"),
(5, 40, "White"),
(5, 41, "White"),
(5, 42, "White"),
(5, 35, "Black"),
(5, 36, "Black"),
(5, 37, "Black"),
(5, 38, "Black"),
(5, 39, "Black"),
(5, 40, "Black"),
(5, 41, "Black"),
(5, 42, "Black"),
(5, 35, "Blue"),
(5, 36, "Blue"),
(5, 37, "Blue"),
(5, 38, "Blue"),
(5, 39, "Blue"),
(5, 40, "Blue"),
(5, 41, "Blue"),
(5, 42, "Blue"),
(6, 35, "Black"),
(6, 36, "Black"),
(6, 37, "Black"),
(6, 38, "Black"),
(6, 39, "Black"),
(6, 40, "Black"),
(6, 41, "Black"),
(6, 42, "Black"),

(51, 35, "Black"),
(51, 36, "Black"),
(51, 37, "Black"),
(51, 38, "Black"),
(51, 39, "Black"),
(51, 40, "Black"),
(51, 41, "Black"),
(51, 42, "Black"),
(51, 35, "White"),
(51, 36, "White"),
(51, 37, "White"),
(51, 38, "White"),
(51, 39, "White"),
(51, 40, "White"),
(51, 41, "White"),
(51, 42, "White"),
(52, 35, "Pink"),
(52, 36, "Pink"),
(52, 37, "Pink"),
(52, 38, "Pink"),
(52, 39, "Pink"),
(52, 40, "Pink"),
(52, 41, "Pink"),
(52, 42, "Pink"),

(101, 35, "White"),
(101, 36, "White"),
(101, 37, "White"),
(101, 38, "White"),
(101, 39, "White"),
(101, 40, "White"),
(101, 41, "White"),
(101, 42, "White"),
(102, 35, "Yellow"),
(102, 36, "Yellow"),
(102, 37, "Yellow"),
(102, 38, "Yellow"),
(102, 39, "Yellow"),
(102, 40, "Yellow"),
(102, 41, "Yellow"),
(102, 42, "Yellow");