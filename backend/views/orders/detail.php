<?php
?>
<h2>Chi tiết đơn hàng số <?php echo $_GET['id'] ?></h2>
<br>
<br>
<table class="table table-bordered">
    <tr>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Quantity</th>
    </tr>
    <?php if (!empty($order_details)): ?>
        <?php foreach ($order_details as $order_detail): ?>
            <tr>
                <td><?php echo $order_detail['product_name'] ?></td>
                <td><?php echo $order_detail['product_price'] ?></td>
                <td><?php echo $order_detail['quantity'] ?></td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif; ?>

</table>
<a href="index.php?controller=order&action=index" class="btn btn-default">Back</a>
