<?php
?>
<!DOCTYPE html>
<html>
<body id="cart_page" class="theme">
<main class="main" id="main">
    <div class="fade-in wrapper">
        <h1 class="page-title has-dash">Cart</h1>
        <div class="cart-container">
            <div class="empty-cart-message">
                <p class="empty-cart-message centered-message">
                    Your cart is empty! Sounds like a good time to <a href="/products" title="Start shopping">start shopping</a>.
                </p>
            </div>
            <div class="cart-holder">
                <?php if(!isset($_SESSION['cart'])){ ?>
                    <h1 class="post-list-title1">Your Cart Is Empty</h1>
                    <a href="index.php?controller=home&action=index">
                        <button class="button checkout-btn">Back to homepage</button>
                    </a>
                <?php } ?>
                <?php if (isset($_SESSION['cart'])){ ?>
                    <a href="index.php?controller=cart&action=deleteCart">
                        <button class="button checkout-btn">Delete All</button>
                    </a>
                    <form method="post" action="" id="cart-form" class="cart-form">
                        <input type="hidden" name="cart_submit" value="true">

                        <ul class="cart-items">

                            <?php
                            $total_cart = 0;
                            foreach ($_SESSION['cart'] AS $product_id => $cart): ?>

                                <li class="cart-item">
                                    <img height="10%" width="10%" style="padding: 10px" src="../backend/assets/uploads/<?php echo $cart['avatar'] ?>">
                                    <div class="cart-item-details">
                                        <?php echo $cart['name'] ?>
                                        <div class="cart-item-details-option">

                                            <span class="currency_sign">$</span><?php echo $cart['price'] ?>
                                        </div>

                                        <div class="cart-item-details-unit-price"></div>
                                    </div>
                                    <div class="cart-item-quantity-price">
                                        <div class="cart-item-quantity-holder" data-item-id="258646277">
                                            <label class="visually-hidden" for="item_258646277_qty">Quantity</label>
                                            <input type="number" min="0"
                                                   name="<?php echo $product_id; ?>"
                                                   class="product-amount form-control"
                                                   value="<?php echo $cart['quantity']; ?>">
                                        </div>
                                        <div class="cart-item-details-price" style="">$<?php
                                            $total_item = $cart['price'] * $cart['quantity'];
                                            // Cộng dồn để lấy ra tổng giá trị đơn hàng
                                            $total_cart += $total_item;
                                            echo number_format($total_item);
                                            ?></div>
                                        <a href="index.php?controller=cart&action=delete&id=<?php echo $product_id; ?>">
                                            <button type="button" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="cart-footer">
                            <div class="cart-totals">
                                <div class="cart-subtotal cart-total" aria-live="polite" aria-atomic="true">
                                    Subtotal <span class="cart-subtotal-amount" style="">$<?php echo number_format($total_cart); ?></span>
                                </div>
                            </div>
                            <div class="cart-footer-buttons">
                                <a class="btn btn-dark" href="index.php?controller=payment&action=index">Checkout</a>
                                <input type="submit" class="btn btn-dark button-cart" style="padding: 10px" value="Update Price">
                                <a class="button continue-shopping minimal-button" href="index.php?controller=home">Continue Shopping</a>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
</body>
</html>




