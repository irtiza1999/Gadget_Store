<div style="clear:both"></div>
<br />
<h3>Order Details</h3>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>
        <?php
 if(!empty($_SESSION["shopping_cart"]))
 {
    include 'partials/_dbconnect.php';
 $total = 0;
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
 ?>
        <tr>
            <td><?php echo $values["item_id"]; ?></td>
            <td><?php echo $values["item_quantity"]; ?></td>
            <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
            <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                        class="text-danger">Remove</span></a></td>
        </tr>
        <?php
 $total = $total + ($values["item_quantity"] * $values["item_price"]);
 }
 ?>
        <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right">$ <?php echo number_format($total, 2); ?></td>
            <td></td>
        </tr>
        <?php
 }
 ?>