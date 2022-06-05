<div class="lte-dashboard">
    <div class="row">
        <div class='col-xs-12'>

        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class='col-xs-12'>
            <div class='box box-header'>
                <div class='box-header'>
                    <h3 class="box-title"><i class="fa fa-edit"></i> Form cập nhật đơn hàng</h3>
                </div>
                <div class='box-body'>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fullname">Nhập tên khách hàng</label>
                            <input type="text" name="fullname" value="<?php echo $order['fullname'] ?>"
                                   class="form-control" id="title"/>
                        </div>
                        <div class="form-group">
                            <label for="address">Nhập địa chỉ</label>
                            <input type="text" name="address" value="<?php echo $order['address'] ?>"
                                   class="form-control" id="address"/>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="number" name="mobile" value="<?php echo $order['mobile'] ?>"
                                   class="form-control" id="mobile"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Nhập email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $order['email'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="note">Nhập ghi chú</label>
                            <input type="text" name="note" id="note" class="form-control" value="<?php echo $order['note'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="price">Nhập giá tổng</label>
                            <input type="number" name="price_total" id="price" class="form-control" value="<?php echo $order['price_total'] ?>" />
                        </div>
                        <?php
                        $status = '';
                        if($order['payment_status'] == 0) {
                            $status = 'checked';
                        } else {
                            $status = 'checked';
                        }
                        ?>
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" class="form-control" id="status">
                                <?php
                                $selected_disabled = '';
                                $selected_active = '';
                                if ($order['payment_status'] == 0) {
                                    $selected_disabled = 'selected';
                                } else {
                                    $selected_active = 'selected';
                                }
                                if (isset($_POST['status'])) {
                                    switch ($_POST['status']) {
                                        case 0:
                                            $selected_disabled = 'selected';
                                            break;
                                        case 1:
                                            $selected_active = 'selected';
                                            break;
                                    }
                                }
                                ?>

                                <option value="1" <?php echo $selected_active ?>>Đã thanh toán</option>
                                <option value="0" <?php echo $selected_disabled; ?>>Chưa thanh toán</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
                            <a href="index.php?controller=order&action=index" class="btn btn-default">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>