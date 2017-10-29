<?php
    session_start();
    include_once("./include/db.php");    
    $mysqli = db_connect();
    $query_str = "SELECT * FROM items WHERE for=%who% LIMIT 5";
    $men_featured_products = $mysqli->query(str_replace("%who%","men",$query_str));
    $women_featured_products = $mysqli->query(str_replace("%who%","men",$query_str));
    $kids_featured_products = $mysqli->query(str_replace("%who%","men",$query_str));
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/script.js"></script>
    <link rel="stylesheet" href="/css/styles.css">
    <title>THE SHOEBOX</title>
</head>

<body>
    <main id="main">
        <header>
            <?php include 'partials/nav.php'?>
        </header>
        <section id="hero" class="hero">
            <div class="hero-video-wrapper">
                <video class="hero-video" loop muted autoplay src="/assets/hero.video.mp4"></video>
            </div>
            <div class="hero-title-wrapper">
                <h2 class="hero-title">Lorem ipsum.</h2>
                <p class="hero-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </section>
        <section class="intro" id="feature-product">
            <ul class="product-gallery-wrapper inline">
            <?php
                for ($i = 1; $i <= 8; $i++) {
                    echo '
                    <li>
                        <div class="product-grid-wrapper">
                            <div class="product-image-wrapper">
                                <img src="/assets/products/air-jordan-1-retro-high-flyknit-shoe.jpg" alt="product name"></img>
                            </div>
                            <div class="product-title-wrapper">
                                <h2>product name</h2>
                            </div>
                            <div class="product-title-wrapper">
                                <h4>$ 100.0</h4>
                            </div>
                        </div>
                    </li>
                    ';
                }
            ?>
            </ul>
        </section>
        <!-- <section class="intro" id="women-intro">
            <div class="intro-image-wrapper float-right">
                <div class="intro-image">
                    <img src="/assets/men.jpg" alt="Men">
                </div>
            </div>
        </section>
        <section class="intro" id="kids-intro">
            <div class="intro-image-wrapper">
                <div class="intro-image">
                    <img src="/assets/men.jpg" alt="Men">
                </div>
            </div>
        </section> -->
    </main>
    <?php
        include "partials/cart.php";
        include "partials/footer.php";
    ?>
</body>

</html>