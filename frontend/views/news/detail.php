<?php
?>


<!DOCTYPE html>
<html>


<body id="product_page" class="theme">
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=1504448526533606&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<main class="main" id="main">
    <div class="fade-in wrapper">
        <div class="product-page">
            <h1 class="product-title has-dash"><?php echo $news['name'] ?></h1>
        </div>
        <div class="product-images post-list-title product-images-slideshow">
            <ul class="slides">
                <li>
                    <img alt="News-image" src="../backend/assets/uploads/<?php echo $news['avatar'] ?>">
                </li>
            </ul>
        </div>

        <div class="product-details">

            <div class="product-description">
                <p><?php echo $news['content'] ?></p>
            </div>
        </div>
    </div>
</main>



<!--<aside class="related-products-container wrapper under_image" role="complementary" aria-label="Related products">-->
<!---->
<!---->
<!--    <ul class="prev-next-products">-->
<!--        <li><a title="View Previous product" href="https://laravel.bigcartel.com//product/laravel-cosmic-dragon-shirt">Previous product</a></li>-->
<!--        <li><a title="View Next product" href="https://laravel.bigcartel.com//product/laravel-shine-shirt">Next product</a></li>-->
<!--    </ul>-->
<!---->
<!--</aside>-->


<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/api.usd.js"></script>
<script src="asset/js/theme.js"></script>

<script>
    var show_sold_out_product_options = 'false';
    Product.find('laravel-sunrise-mug', processProduct)
</script>

</body>
</html>
