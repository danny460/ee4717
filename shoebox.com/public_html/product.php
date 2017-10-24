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
    <?php
        include "partials/cart.php";
        include "partials/footer.php";
    ?>
</body>