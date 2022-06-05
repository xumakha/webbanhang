<form method="get" action="">
    <input type="hidden" name="controller" value="<?php echo isset($_GET['controller']) ? $_GET['controller'] : '' ?>">
    <input type="hidden" name="action" value="<?php echo isset($_GET['action']) ? $_GET['action'] : '' ?>">
    <div class="search-form" style="display:flex;">
        <input type="text" style="border: 1px solid black;width: 700px;" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>" class="form-control" placeholder="Nhập từ khóa"/>
        <button type="submit" style="width: 100px" class="btn btn-default">Search</button>
    </div>
</form>
<style>
    .fadding-photo:hover { opacity:0.7;}
</style>
<main class="main" id="main">
    <div class="product-wrap fade-in wrapper">
        <div class="product container">
            <?php if (!empty($products)): ?>
                <h1 class="post-list-title">
                    PRODUCTS
                </h1>
                <div class="row">
                    <?php foreach ($products AS $product):
                        $product_link = "index.php?controller=product&action=detail&id=" . $product['id'];
                        $product_cart_add = "them-vao-gio-hang/" . $product['id'] . ".html";
                        ?>
                        <div class="service-link col-md-3 col-sm-6 col-xs-12">
                            <a  href="<?php echo $product_link; ?>" title="<?php echo $product['title'] ?>">
                                <div class="product-list-thumb-container">
                                    <figure class="product-list-image-container">
                                        <div class="image-wrapper">
                                            <img alt="" class="thumbnail fadding-photo" src="../backend/assets/uploads/<?php echo $product['avatar'] ?>">
                                        </div>
                                    </figure>
                                </div>
                                <div class="product-list-thumb-info">
                                    <div class="product-list-item-background"></div>
                                    <div class="product-list-thumb-info-headers">
                                        <div class="product-list-thumb-name fadding-photo"><?php echo $product['title'] ?></div>
                                        <div class="product-list-thumb-price">
                                            <span class="currency_sign"><?php echo $product['price'] ?> VND</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="add-to-cart" data-id="<?php echo $product['id'] ?>">
                                <button class="button add-to-cart-button">Add to Cart</button>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <p><?php echo $pages ?></p>
        </div>
    </div>
</main>
