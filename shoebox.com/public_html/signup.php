<?php
    session_start();
    include_once("./include/session.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/js/script.js"></script>
    <link rel="stylesheet" href="/css/styles.css">
    <title>Shoebox | Login</title>
</head>
<body>
    <main id="main">
        <header>
            <?php include 'partials/nav.php'?>
        </header>
        <?php
            if(isLoggedIn()){
                echo '<h3>You have already logged in. Redirecting back to home page in <span id="counter">3</span> seconds...<br></h3>If not redirecting, <a style="color:blue;" href="/index.php">click here</a>';
                header( "refresh: 3;url=index.php" );                
            }else{
                echo '
                    <form action="/include/session.php" method="post">
                        <div>
                            <label for="email">Email:</label>
                            <input class="input-txt" type="email" name="email" value="">    
                        </div>
                    ';
                echo '
                        <div>
                            <label for="username">Username:</label>
                            <input class="input-txt" type="text" name="username" value="">    
                        </div>
                    ';
                if (isset($_GET['email_error'])){
                    echo '<div><span style="color:red;">Email is already used.<a href="/login.php">Login instead</a></span></div>';   
                }
                echo '
                        <div>
                            <label for="password">Password:</label>
                            <input class="input-txt" type="password" name="password">
                        </div>
                    ';
                if (isset($_GET['user_error'])){
                    echo '<div><span style="color:red;">Username is already used.</span></div>';   
                }
                echo '
                        <input class="btn" type="submit" value="signup" name="signup">
                    </form>
                ';
                if (isset($_GET['error'])){
                    echo '<div><span style="color:red;">Unknown error. Please retry later.</span></div>';   
                }
            }
        ?>
        
    </main>
    <?php
        include "partials/cart.php";
        include "partials/footer.php";
    ?>
</body>
<script type="text/javascript">
    function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML)<=0) {
            location.href = 'login.php';
        }
            i.innerHTML = parseInt(i.innerHTML)-1;
        }
    if(document.getElementById('counter') !== null){
        setInterval(function(){ countdown(); },1000);
    }
</script>