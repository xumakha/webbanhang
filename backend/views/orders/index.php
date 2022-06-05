<?php
?>
<h2>Danh sách đơn hàng</h2>
<br>
<br>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Fullname</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Note</th>
        <th>Total Price</th>
        <th>Payment Status</th>
        <th>Action</th>
    </tr>
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['id'] ?></td>
                <td><?php echo $order['fullname'] ?></td>
                <td><?php echo $order['address'] ?></td>

                <td><?php echo $order['mobile'] ?></td>
                <td><?php echo $order['email'] ?></td>
                <td><?php echo $order['note'] ?></td>
                <td><?php echo $order['price_total'] ?></td>
                <td><?php
                    if($order['payment_status'] == 0) {
                        echo 'Unpaid';
                    } else {
                        echo 'Paid';
                    }
                    ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=order&action=detail&id=" . $order['id'];
                    $url_update = "index.php?controller=order&action=update&id=" . $order['id'];
                    $url_delete = "index.php?controller=order&action=delete&id=" . $order['id'];
                    ?>
                    <a title="Detail" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
                    <a title="Delete" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif; ?>
</table>
<!--<p>--><?php //echo $pages ?><!--</p>-->