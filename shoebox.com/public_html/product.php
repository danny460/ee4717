<?php
    session_start();
    include_once("./include/db.php");
    include_once("./include/session.php");
    $mysqli = db_connect();
    if (!isset($_GET["id"])) {
        header('location:/shop.php');
    }
    $product_id = $_GET["id"];
    if(isset($_POST["submit"]) && isset($_POST["color"]) && isset($_POST["size"]) && isset($_POST["qty"]) && $_POST["qty"] > 0){
        if(isLoggedIn()){
            dbAddToCart($_SESSION["userid"], $product_id,$_POST["color"], $_POST["size"], $_POST["qty"]);
            unset($_POST["submit"]);
        }else{
            promptLogin();
        }
    };
    $product_query = "SELECT * FROM products WHERE product_id = $product_id;";
    $color_query = "SELECT DISTINCT color FROM product_variants WHERE product_id = $product_id;";
    $size_query = "SELECT DISTINCT size FROM product_variants WHERE product_id = $product_id ORDER BY size;";
    
    $color_result = $mysqli->query($color_query);
    $size_result = $mysqli->query($size_query);
    
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/script.js"></script>
    <?php
        $product_result = $mysqli->query($product_query);
        $item = $product_result->fetch_assoc();
        echo '<title>SHOEBOX | '.$item["product_name"].'</title>';
    ?>
</head>
<body>
    <main id="main">
        <header>
            <?php include 'partials/nav.php'?>
        </header>
        
        <div class="container">
            <div class="col-sm-12">
                <div class="row">
                    <div id="item-gallery-container" class="col-sm-4">
                        <div class="row" id="image-row">
                            <a href="/assets/products/air-jordan-1-retro-high-flyknit-shoe.jpg">
                                <img class="img-fluid" style="max-width:100%;height:auto;" id="product-image" src="/assets/products/air-jordan-1-retro-high-flyknit-shoe.jpg" alt="">
                            </a>
                        </div>    
                    </div>
                    <div id="item-details-container" class="col-sm-8">
                            <?php echo  '<form action="product.php?id='.$product_id.'" method="post">'; ?>
                            <?php
                                $product_result = $mysqli->query($product_query);
                                if($product_result->num_rows == 1){
                                    $item = $product_result->fetch_assoc();
                                    echo '
                                        <div id="title-row" class="col-sm-8">
                                            <h1>'.$item['product_name'].'</h1>
                                            <p>'.$item['description'].'</p>
                                        <div>
                                    ';
                                }
                                echo '<div id="color-row" class="col-sm-8">';
                                echo '<h5>Color</h5>';
                                if($color_result->num_rows > 0){
                                    while($color = $color_result->fetch_assoc()){
                                        echo '
                                            <div class="selection-cube bg-'.$color['color'].'">
                                                <label>
                                                    <input type="radio" value="'.$color['color'].'" name="color"
                                        ';
                                        if(isset($_POST["colors"])){
                                            if(in_array($color["color"], $_POST["colors"])){
                                                echo ' checked ';
                                            }
                                        }           
                                        echo '
                                            ><span>&#x2714;</span>
                                                </label>
                                            </div>
                                        ';
                                    }
                                }
                                echo '</div>';
                                echo '<div id="size-row" class="col-sm-8">';
                                echo '<h5>Size</h5>';
                                if($size_result->num_rows > 0){
                                    while($item = $size_result->fetch_assoc()){
                                        echo '
                                            <div class="selection-cube size-cube bg-white">
                                                <label>
                                                    <input type="radio" value="'.$item['size'].'" name="size"><span>'.$item['size'].'</span>
                                                </label>
                                            </div>
                                        ';
                                    }
                                }
                                echo '</div>'
                            ?>
                                <div id="quantity-row" class="col-sm-8">
                                    <h5>Quantity</h5>
                                    <input type="number" value="0" name="qty">
                                </div>
                                <div id="submit-row" class="col-sm-8">
                                    <input class="btn" type="submit" value="add to cart" name="submit">
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        include "partials/cart.php";
        include "partials/footer.php";
    ?>
</body>