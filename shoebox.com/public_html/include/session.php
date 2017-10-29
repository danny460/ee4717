<?php
    include_once("db.php");

    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])){
        login($_POST['username'], $_POST['password']);
    }else if (isset($_POST['signup']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])){
        signup($_POST['email'], $_POST['username'], $_POST['password']);
    }

    function login($username, $password){
        if(checkCredential($username, $password)){
            createSession($username, $password);
            header("location: /index.php");
        }else{
            header("location: /login.php?login_error=1");
        }
    }

    function signup($email, $username, $password){
        $error = 0;
        if(hasEmail($email)){
            $error += 1;
        }
        if(hasUser($email)){
            $error += 2;
        }
        if($error === 1){
            header("location: /signup.php?user_error=1");
        }else if($error === 2){
            header("location: /signup.php?email_error=1");
        }else if($error === 3){
            header("location: /signup.php?user_error=1&email_error=1");
        }else{
            if(registerUser($email, $username, $password)){
                createSession($username, $password);
                header("location: /index.php");
            }else{
                header("location: /signup.php?error=1");
            }
        }
    }

    function hasEmail($email){
        $mysqli = db_connect();
        $stmt = "SELECT * from users where email = '".$email."';";
        $result = $mysqli->query($stmt);
        return $result->num_rows === 1;
    }

    function hasUser($username){
        $mysqli = db_connect();
        $stmt = "SELECT * from users where username = '".$username."';";
        $result = $mysqli->query($stmt);
        return $result->num_rows === 1;
    }

    function checkCredential($username, $password){
        $mysqli = db_connect();
        $hash = hash_SHA256($password);
        $user_query = "SELECT * from users where username = '".$username."' and password = '".$hash."';";
        $result = $mysqli->query($user_query);
        return $result->num_rows === 1;
    }

    function registerUser($email, $username, $password){
        $mysqli = db_connect();
        $hash = hash_SHA256($password);
        $insert_stmt = "INSERT INTO users (user_id, email, username, password) VALUES ( UUID(), '".$email."','".$username."','".$hash."');";
        return $mysqli->query($insert_stmt);
    }

    function createSession($username, $userid){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
    }

    function hash_SHA256($plaintext){
        return hash("sha256", $plaintext);
    }

    function isLoggedIn() { 
        return isset($_SESSION['username']) AND isset($_SESSION['login']);
    }
?>