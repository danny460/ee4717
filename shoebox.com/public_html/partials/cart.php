<?php
    $hasItem = false;
    include_once("/include/db.php");
    $mysqli = db_connect();
    $updateQuery = "UPDATE orders SET size = $size, color = $color, quantity = $quantity where item_id = $item_id";
    $result = $mysqli->query($updateQuery);
?>
<!-- <meta http-equiv="refresh" content="10" > -->

<div id="cartSidenav" class="cart-side-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div id="content" class="sidenav-container">
        <div class="title-container">
            <h2>Shopping Cart</h2>
            <?php
                if (!$hasItem){
                    echo '<p><span class="hint-txt">Your shopping cart is empty </span>😢</p>';
                }else{
                    echo "";
                }
            ?>
        </div>
        <form action="/order.php" method="post">
            <div class="order-container">
                <ul>
                    <?php
                        for($i = 0; $i < 10; $i++){
                            echo '
                            <li>
                                <div class="item-container">
                                    <div class="item-image-wrapper inline">
                                        <img src="/assets/products/air-jordan-1-retro-high-flyknit-shoe.jpg" alt="" srcset="">
                                    </div>
                                    <div id="item-info" class="inline">
                                        <p class="hint-txt">Product Name Maybe too long but whatever</p>
                                        <p id="size" class="hint-txt">Size: $size</p>
                                        <p id="color" class="hint-txt" >Color: $color</p>
                                        <p id="qty" class="hint-txt" >Quantity: $quantity</p>
                                        <input type="button" name="modify" onclick="editItem(\'e\', this)">
                                    </div>
                                </div>
                            </li>
                            ';
                        }
                    ?>
                </ul>
            </div>
            <div class="btn-container" style="height:20%">
                <input type="submit" value="Order" class="btn float-right" style="margin: 20px; margin-right: 50px;">
            </div>
                
        </form>
    </div>
</div>
<script>
    function editItem(dummy, src, itemId){
        var container = src.parentNode;
        var pElements = container.getElementsByTagName("p");
        var pSize = pElements[1];
        var pColor = pElements[2];
        var pQty = pElements[3];
        pSize.className += " hidden";
        pColor.className += " hidden";
        pQty.className += " hidden";
        src.className += "hidden";
        var updateBtn = document.createElement("input");
        updateBtn.setAttribute("type", "button");
        updateBtn.setAttribute("name", "update");
        updateBtn.setAttribute("value", "update");
        updateBtn.addEventListener("click", function(){
            updateItem(container);
        });
        var xmlReq = new XMLHttpRequest();
        xmlReq.onreadystatechange = function(){
            if(this.readyState === 4 && this.status === 200){
                console.log(xmlReq.responseText);
                var dummyHTML = document.createElement("html");
                dummyHTML.innerHTML = xmlReq.responseText;
                var responseEl = dummyHTML.getElementsByTagName("div")[0];
                console.log(responseEl);
                container.appendChild(responseEl);
                container.appendChild(updateBtn);
            }
        };        
        xmlReq.open("POST", '/partials/item-edit.php?item_id=1234');
        xmlReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlReq.send();
    }  
    
    function updateItem(container){
        var pElements = container.getElementsByTagName("p");
        pElements[1].className = pElements[1].className.replace(" hidden", "");
        pElements[2].className = pElements[2].className.replace(" hidden", "");
        pElements[3].className = pElements[3].className.replace(" hidden", "");
    }
</script>