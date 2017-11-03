<?php
    include_once("./include/session.php");
    $hasUser = false;
    if(isLoggedIn()){
        $hasUser = true;
    }
?>
<nav class="top-nav">
    <ul>
        <li><a class="nav-link" href="/">Home</a></li>
        <li class="float-right"><a class="nav-link" href="javascript:void(0)" onclick="openNav()">Cart</a></li>
        <?php
            if($hasUser){
                echo '
                    <li class="float-right">
                        <div class="dropdown">
                            <a href="" class="nav-link">User</a>
                            <div class="dropdown-content">
                                <ul>
                                    <li><a href="" class="nav-link">Profile</a></li>
                                    <li><a href="" class="nav-link">Orders</a></li>
                                    <li><a href="/include/session.php?logout" class="nav-link">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                ';
            }else{
                echo '<li class="float-right"><a class="nav-link" href="/login.php">Login</a></li>';
            }
        ?>
 
    </ul>
</nav>
<nav class="second-nav">
    <ul>
        <li><a class="section-link" href="/shop.php?for=men">Men</a></li>
        <li><a class="section-link" href="/shop.php?for=women">Women</a></li>
        <li><a class="section-link" href="/shop.php?for=kids">Kids</a></li>
    </ul>
</nav>