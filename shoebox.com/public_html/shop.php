<?php
    session_start();
    include_once("./include/db.php");
    $mysqli = db_connect();
    $for = $_GET["for"];
    if ($for == null) {
        $for = "men";
    }
    $stmt = "SELECT * FROM products WHERE gender = '".$for."';";
    $brands_stmt = "SELECT DISTINCT brand FROM products";
    $color_stmt = "SELECT DISTINCT color FROM product_variants";
    $products = $mysqli->query($stmt);
    $brands = $mysqli->query($brands_stmt);
    $colors = $mysqli->query($color_stmt);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/script.js"></script>
    <link rel="stylesheet" href="/css/styles.css">
    <title>SHOEBOX | Shop</title>
</head>
<body>
    <main id="main">
        <header>
            <?php include 'partials/nav.php'?>
        </header>
        <div class="container shop-container">
            <div class="filter-column-container">
                <div class="filter-container" id="filter">
                    <h1 class="headline">Filters</h2>
                    <span class="keyline-horizontal keyline-grey"></span>
                    <h3>Brand</h3>
                    <!-- <span class="keyline-horizontal keyline-grey"></span> -->
                    <div class="filter-section" id="filter-brand">
                        <?php
                            if($brands->num_rows > 0){
                                
                                while($brand = $brands->fetch_assoc()){
                                    echo '
                                        <div class="check-box-wrapper"><label><input type="checkbox">'.$brand["brand"].'</label></div>
                                    ';
                                }
                            }
                        ?>
                    </div>
                    <h3>Color</h3>
                    <!-- <span class="keyline-horizontal keyline-grey"></span> -->
                    <div class="filter-section" id="filter-color">
                        <?php
                            if($colors->num_rows > 0){
                                while($color = $colors->fetch_assoc()){
                                    echo '
                                        <div class="color-cube bg-'.$color['color'].'"></div>
                                    ';
                                }
                            }
                        ?>
                    </div>    
                    <div class="filter-section" id="filter-price">
                            
                    </div>        
                </div>
            </div>
            <div class="product-list-container" id="product-list">
                <?php 
                    if($products->num_rows > 0){
                        while($item = $products->fetch_assoc()){
                            echo '   
                                <div class="product-grid-wrapper" onclick="navToDetailPage(\''.$item["product_id"].'\')">
                                    <div class="product-image-wrapper">
                                        <img src="/assets/products/air-jordan-1-retro-high-flyknit-shoe.jpg" alt="product name"></img>
                                    </div>
                                    <div class="product-title-wrapper">
                                        <h2>'.$item["product_name"].'</h2>
                                    </div>
                                    <div class="product-title-wrapper">
                                        <h4>'.$item["price"].'</h4>
                                    </div>
                                </div>
                            ';
                        }
                    }else{
                        echo '
                            <h2>No matching content</h2>
                        ';
                    }
                ?>
            </div>

        </div>
    </main>
    <?php
        include "partials/cart.php";
        include "partials/footer.php";
    ?>
</body>
<script type="text/javascript">
    function navToDetailPage(productId){
        window.location.href = '/product.php?id=' + productId;
    }
</script>