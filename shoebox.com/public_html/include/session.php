<?php
    function isLoggedIn() { 
        if(isset($_SESSION['username']) AND isset($_SESSION['login'])) 
            return true; 
        else 
            return false; 
    }
?>