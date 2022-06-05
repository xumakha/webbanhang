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
            <?php if (!empty($news)): ?>
                <h1 class="post-list-title">
                    NEWS
                </h1>
                <div class="row">
                    <?php foreach ($news AS $new):?>
                        <div class="service-link col-md-3 col-sm-6 col-xs-12">
                            <a  href="index.php?controller=news&action=detail&id=<?php echo $new['id'] ?>" title="<?php echo $new['name'] ?>">
                                <div class="product-list-thumb-container">
                                    <figure class="product-list-image-container">
                                        <div class="image-wrapper">
                                            <img alt="" class="thumbnail fadding-photo" src="../backend/assets/uploads/<?php echo $new['avatar'] ?>">
                                        </div>
                                    </figure>
                                </div>
                                <div class="product-list-thumb-info">
                                    <div class="product-list-item-background"></div>
                                    <div class="product-list-thumb-info-headers">
                                        <div class="product-list-thumb-name fadding-photo"><?php echo $new['name'] ?></div>
                                        <div class="product-list-thumb-price product-list-thumb-name">
                                            <span class="currency_sign"><?php echo $new['summary'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="index.php?controller=news&action=detail&id=<?php echo $new['id'] ?>">
                                <button class="button add-to-cart-button">Read More</button>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <p><?php echo $pages ?></p>
        </div>
    </div>
</main>





