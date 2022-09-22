<?php
include_once("./userStructure.php");
?>

<?= actionOrder();?>
<html>
<div class="container">
    <center>
        <h3>Bestel hier je onvergetelijke etentje</h3>
        <div class="row">
            <?= generateOrderCard() ?>
            <div style="clear:both"></div>
            <br><br><br>
            <div class="table-responsive">
                <h3>Order Details</h3>
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Item Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                        <th width="5%">Action</th>
                    </tr>
                        <?= generateOrderTable(); ?>
                        <?= storeOrder(); ?>
                </table>
            </div>
        </div>
    </center>
</div>
</html>
