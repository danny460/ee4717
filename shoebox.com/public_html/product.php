<?php
    include_once("./include/db.php");
    $mysqli = db_connect();
    $product_id = $_GET["id"];
    if ($product_id == null) {
        $product_id = "men";
    }
    $product_query = "SELECT * FROM products WHERE product_id = ".$product_id.";";
    $color_query = "SELECT DISTINCT color FROM product_variants WHERE product_id = ".$product_id.";";
    $size_query = "SELECT DISTINCT size FROM product_variants WHERE product_id = ".$product_id.";";
    $product_result = $mysqli->query($product_query);
    $color_result = $mysqli->query($color_query);
    $size_result = $mysqli->query($size_query);    
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
            <div class="item-gallery-container">
                <div id="product-image-wrapper" class="product-image-wrapper image-wrapper-responsive">
                    <img id="product-image" src="/assets/products/air-jordan-1-retro-high-flyknit-shoe.jpg" alt="">
                </div>
            </div>
            <div class="item-details-container">
                <form action="product.php" method="post">
                <?php 
                    if($product_result->num_rows == 1){
                        $item = $product_result->fetch_assoc();
                        echo '<h1>'.$item['product_name'].'</h1>';
                        echo '<p>'.$item['description'].'</p>';
                    }
                    echo '<div class="option-container">';
                    echo '<h4>Color</h4>';
                    if($color_result->num_rows > 0){
                        while($color = $color_result->fetch_assoc()){
                            echo '
                                <div class="color-cube bg-'.$color['color'].'"></div>
                            ';
                        }
                    }
                    echo '</div>';
                    echo '<div class="option-container">';
                    echo '<h4>Size</h4>';
                    if($size_result->num_rows > 0){
                        while($size = $size_result->fetch_assoc()){
                            echo '<div class="size-cube"><p class="cube-content">'.$size['size'].'</p></div>';
                        }
                    }
                    echo '</div>'
                ?>
                <div class="option-container">
                    <input type="button" value="ADD TO CART">
                </div>
                
                </form>
            </div>
            
        </div>
    </main>

        <div class="product-left-wrapper">
            <div class="product-image-wrapper">
                <img src="/assets/products/air-jordan-1-retro-high-flyknit-shoe.jpg" alt="product name"></img>
            </div>
        </div>

        <div class = "product-right-wrapper">
            <div class="product-title-wrapper">
                <h2>product name</h2>
            </div>
            <div class="product-title-wrapper">
                <h4>$ 100.0</h4>
            </div>
            <div class="product-title-wrapper">
                <h4>COLOR: white/red/black</h4>
            </div
            <div class="product-title-wrapper">
                <h5>Color:</h5>
                <form action="">
                  <input type="radio" name="color" value="white"> white
                  <input type="radio" name="color" value="red"> red
                  <input type="radio" name="color" value="black"> black
                </form>
                <h5>Size:</h5>
                <form action="">
                   <input type="radio" name="size" value="39"> 39
                  <input type="radio" name="size" value="40"> 40
                  <input type="radio" name="size" value="41"> 41
                  <input type="radio" name="size" value="42"> 42
                   <input type="radio" name="size" value="43"> 43
                </form>
                <label for="quantity">Quantity: </label>
                <input type="number" id="quantity" style="width:90px;"/><br><pre>
                <input type = "submit"  value = "Add to cart" />
            </div>
        </div>

    <?php
        include "partials/cart.php";
        include "partials/footer.php";
    ?>
</body>
<script>
    var imgWrapper = document.getElementById("product-image-wrapper");
    var img = document.getElementById("product-image");
    window.addEventListener('resize', function(){
        var wWidth = window.innerWidth;
    });
</script>