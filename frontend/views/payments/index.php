<?php
//require_once 'helpers/Helper.php';
?>
<div class="fade-in container">
    <h2>Checkout</h2>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h5 class="center-align">Thông tin khách hàng</h5>
                <h4 style="color: red">
                    <?php if (isset($_SESSION['success'])) {?>
                        <div class="alert1" id="autovanish">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['error'])) {?>
                        <div class="alert" id="autovanish">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php } ?>

                    <!-- /.side-bar-->
                    <!-- main content -->
                    <?php if (isset($this->error)) {?>
                        <div class="alert" id="autovanish">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <?php
                            echo $this->error;
                            ?>
                        </div>
                    <?php } ?>
                </h4>
                <div class="form-group">
                    <label>Họ tên khách hàng</label>
                    <input type="text" name="fullname" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input type="number" min="0" name="mobile" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" min="0" name="email" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Ghi chú thêm</label>
                    <textarea name="note" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Chọn phương thức thanh toán</label>
                    <br />
                    <input type="radio" name="method" checked value="1" /> COD (dựa vào địa chỉ của bạn) <br />
                    <input type="radio" name="method" value="0" /> Thanh toán trực tuyến <br />

                </div>
                <input type="submit" name="submit" value="Thanh toán" class="btn btn-dark">
                <a href="index.php?controller=cart&action=index" class="btn btn-secondary">Về trang giỏ hàng</a>
            </div>
            <div class="col-md-6 col-sm-6">
                <h5 class="center-align">Thông tin đơn hàng của bạn</h5>
                <?php
                //biến lưu tổng giá trị đơn hàng
                $total = 0;

                if (isset($_SESSION['cart'])): ?>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th width="40%">Tên sản phẩm</th>
                            <th width="12%">Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php foreach ($_SESSION['cart'] AS $product_id => $cart): ?>
                            <?php
                            $price_total = $cart['price'] * $cart['quantity'];
                            $total += $price_total;
                            ?>
                            <tr>
                                <td>
                                    <?php if (!empty($cart['avatar'])): ?>
                                        <img class="product-avatar img-responsive"
                                             src="../backend/assets/uploads/<?php echo $cart['avatar']; ?>" width="60"/>
                                    <?php endif; ?>
                                    <div class="content-product">
                                        <a href="<?php echo $product_link; ?>" class="content-product-a">
                                            <?php echo $cart['name']; ?>
                                        </a>
                                    </div>
                                </td>
                                <td>
                              <span class="product-amount">
                                  <?php echo $cart['quantity']; ?>
                              </span>
                                </td>
                                <td>
                              <span class="product-price-payment">
                                 <?php echo number_format($cart['price'], 0, '.', '.') ?> vnđ
                              </span>
                                </td>
                                <td>
                              <span class="product-price-payment">

                                  <?php echo number_format($price_total, 0, '.', '.') ?> vnđ
                              </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="5" class="product-total">
                                Tổng giá trị đơn hàng:
                                <span class="product-price">
                                <?php echo number_format($total, 0, '.', '.') ?> vnđ
                            </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </form>
</div>