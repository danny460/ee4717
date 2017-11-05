<?php
    $hasItem = false;
    include_once("./include/db.php");
    $mysqli = db_connect();
    $items = dbGetCartItems($_SESSION["userid"]);
    if($items->num_rows>0){
        $hasItem = true;
    }
?>
<div id="cartSidenav" class="cart-side-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div id="content" class="sidenav-container">
        <div class="title-container">
            <?php
                if (!$hasItem){
                    echo '
                        <h1>Shopping Cart</h1>
                        <p><span class="hint-txt">Your shopping cart is empty </span>😢</p>
                    ';
                }else{
                    echo '
                        <h3>
                            Shopping Cart <small>('.$items->num_rows.')</small>
                        </h3>
                    ';
                }
            ?>
        </div>
        <form action="/order.php" method="post">
            <div class="order-container">
                <ul>
                    <?php
                        $items = dbGetCartItems($_SESSION["userid"]);
                        if($items->num_rows>0){
                            while($item = $items->fetch_assoc()){
                                echo '
                                    <li>
                                        <div id="cart-item-container" class="container">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        <img src="/assets/products/air-jordan-1-retro-high-flyknit-shoe.jpg" alt="" class="img-fulid" style="max-width:100%;height:auto;">
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <h6 class="text-warning">'.$item["product_name"].'</h6>
                                                        <h6 id="size">Size:  '.$item["size"].'</h6>
                                                        <h6 id="color">Color:  '.$item["color"].'</h6>
                                                        <h6 id="qty">Quantity:  '.$item["quantity"].'</h5>
                                                        <input class="btn btn-secondary" type="button" name="modify" value="Edit" onclick="editItem(\'e\', this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                ';
                            }
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