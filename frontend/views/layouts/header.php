<?php
require_once 'models/Category.php';
?>
<style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .category_link:hover {background-color: darkgrey;}

    .show {display: block;}
</style>
<div id="fb-root"></div>
<!--<script>(function(d, s, id) {-->
<!--        var js, fjs = d.getElementsByTagName(s)[0];-->
<!--        if (d.getElementById(id)) return;-->
<!--        js = d.createElement(s); js.id = id;-->
<!--        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=1504448526533606&autoLogAppEvents=1';-->
<!--        fjs.parentNode.insertBefore(js, fjs);-->
<!--    }(document, 'script', 'facebook-jssdk'));</script>-->
<span class="ajax-message"></span>
<header>
    <div class="wrapper">
        <nav class="header-nav" role="navigation" aria-label="Main">
            <ul>
                <li><a href="index.php?controller=home&action=index">Home</a></li>

                <li>
                    <div class="dropdown">
                        <a href="#" onclick="myFunction()" class="dropbtn">Categories &#709;</a>
                        <div id="myDropdown" class="dropdown-content">
                            <?php
                            $category_model = new Category();
                            $categories = $category_model->getAll($params = []); ?>
                            <?php foreach ($categories AS $category) : ?>
                                <a class="category_link" href="index.php?controller=product&action=index&category=<?php echo $category['name'] ?>"><?php echo $category['name'] ?></a>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </li>
                <li><a href="index.php?controller=product&action=index">Products</a></li>

                <li><a href="index.php?controller=news&action=index">News</a></li>

                <li><a href="index.php?controller=cart&action=index">Cart</a></li>
                <span class="cart-amount" style="color:#292d32;">
                    <?php
                    $cart_total = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] AS $cart) {
                            $cart_total += $cart['quantity'];
                        }
                    }
                    ?>
                    <?php echo $cart_total; ?>
                </span>

            </ul>
        </nav>

        <div class="branding">
            <a href="index.php?controller=home&action=index" title="Home">
                <img src="assets/images/wtf.png" width="40%" height="40%">
                <h1 class="store-header" style="text-align: center">Laptop Center</h1>
            </a>
        </div>
    </div>

    <nav class="header-nav mobile-nav" aria-label="Mobile Main" role="navigation">
        <ul>
            <li>
                <a href="index.php?controller=product&action=index">Products</a>
            </li>
            <li>
                <a href="index.php?controller=home&action=contact">Contact</a>
            </li>
            <li>
                <a href="index.php?controller=cart&action=index">Cart</a>
            </li>
            <li>
                <a href="index.php?controller=news&action=index">News</a>
            </li>
        </ul>
    </nav>
</header>
<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
