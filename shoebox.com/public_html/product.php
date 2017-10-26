<?php
    include_once("./include/db.php");
    $mysqli = db_connect();
    $product_id = $_GET["id"];
    if ($product_id == null) {
        $product_id = "men";
    }
    $stmt = "SELECT * FROM products WHERE product_id = ".$product_id.";";
    $result = $mysqli->query($stmt);
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