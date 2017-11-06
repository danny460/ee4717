<?php
    session_start();
    include_once("./include/db.php");
    $mysqli = db_connect();
    // gender filter
    $for = $_GET["for"];
    if ($for == null) {
        $for = "men";
    }
    // products
    $products = null;
    $stmt = "SELECT * FROM products WHERE gender = '".$for."';";
    $brands_stmt = "SELECT DISTINCT brand FROM products";
    $color_stmt = "SELECT DISTINCT color FROM product_variants";
    // filter
    if (isset($_POST["reset"])){
        unset($_POST["brands"]);
        unset($_POST["colors"]);
    } if (isset($_POST["filter"])){
        $filterStmt = "SELECT * from products WHERE gender = '$for'";
        if(isset($_POST["colors"])){
            if(count($_POST["colors"])){
                $colors = join("','", $_POST["colors"]);
                $filterStmt = $filterStmt." AND product_id IN (SELECT product_id FROM product_variants WHERE color in ('$colors'))";
            }
        }
        if(isset($_POST["brands"])){
            if(count($_POST["brands"])){
                $brands = join("','", $_POST["brands"]);
                $filterStmt = $filterStmt." AND brand IN ('$brands')";
            }
        }
        $filterStmt = $filterStmt.";";
        echo '<h1>QUERY: '.$filterStmt.'</h1>';
        $products = $mysqli->query($filterStmt);
    }else{
        $products = $mysqli->query($stmt);
    }
    
    
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
                    <?php
                        echo '<form action="/shop.php?for='.$for.'" method="post">';
                    ?>                        
                    <input class="btn btn-secondary float-right inline" type="submit" value="apply" name="filter">
                    <input class="btn btn-secondary float-right inline" style="margin-right:15px;" type="submit" value="reset" name="reset">
                    <h1 class="headline">Filters</h2>
                    
                    <span class="keyline-horizontal keyline-grey"></span>
                    <h3>Brand</h3>
                    <!-- <span class="keyline-horizontal keyline-grey"></span> -->
                    <div class="filter-section" id="filter-brand">
                        <?php
                            if($brands->num_rows > 0){
                                
                                while($brand = $brands->fetch_assoc()){
                                    echo '
                                        <div class="check-box-wrapper"><label><input type="checkbox" name="brands[]" value="'.$brand["brand"].'"
                                    ';
                                    if(isset($_POST["brands"])){
                                        if(in_array($brand["brand"], $_POST["brands"])){
                                            echo ' checked ';
                                        }
                                    }
                                    echo '
                                        >'.$brand["brand"].'</label></div>
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
                                        <div class="selection-cube bg-'.$color['color'].'">
                                            <label>
                                                <input type="checkbox" value="'.$color['color'].'" name="colors[]"
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
                        ?>
                    </div>    
                    <div class="filter-section" id="filter-price">
                    </div>        
                    </form>
                </div>
            </div>
            <div class="product-list-container" id="product-list">
                <?php 
                    if($products != null && $products->num_rows > 0){
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
                            <h3 style="width:100%;text-align:center;padding:50px 0;">No matching content</h3>
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