<?php
    if(isset($_REQUEST["item_id"])){
        echo '
            <div class="col-xs-7">
                <h6 class="text-warning">'.'$item["product_name"]'.'</h6>
                <form method="post" class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="color">Color:</label>
                        <select class="form-control" id="color" name="color">
                            <option>$color1</option>
                            <option>$color2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="size">Size:</label>
                        <select class="form-control" id="size" name="size">
                            <option>$size1</option>
                            <option>$size2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="quantity">Quantity:</label>
                        <input type="number" class="form-control" min="0" id="quantity" name="quantity">
                    </div>
                    <input class="btn btn-secondary float-right" type="button" name="cancle" value="&#x2716;" onclick="cancelEdit(\'e\', this)">
                    <input class="btn btn-secondary float-right" style="margin-right:10px;" type="submit" name="edit" value="&#x270E;" onclick="updateItem(\'e\', this)">
                </form>
            </div>
        ';
    }
?>
