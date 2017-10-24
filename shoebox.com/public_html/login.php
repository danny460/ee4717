<?php
    session_start();
    include_once("./include/db.php");
    include_once("./include/session.php");
    $mysqli = db_connect();
    
    

    if (!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = login($username, $password);
        if($result === "Success"){
            createSession();
            echo "Login in successful";
        }else{
            echo "Login in failed";
        }
    }

    function login($username, $password){
        return "Success";
    }

    function createSession($username, $userid){
        $_SESSION['login'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
        header("location: /index.php");
    }

    function signup($username, $email, $password){
        
    }

    function hash_SHA256($plaintext){
        return hash("sha256", $plaintext);
    }
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
                    <form action="login.php" method="post">
                        <div>
                            <label for="username">Username:</label>
                            <input type="text" name="username" value="">    
                        </div>
                        <div>
                            <label for="password">Password:</label>
                            <input type="password" name="password">
                        </div>
                        <input type="submit" value="Login">
                    </form>
                ';
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