<?php
$year = '';
$username = '';
$jobs = '';
$avatar = '';
$user_id = '';
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
    $username = $_SESSION['user']['username'];
    $avatar = $_SESSION['user']['avatar'];
    $year = date('Y', strtotime($_SESSION['user']['created_at']));
}

?>

<nav class="navbar navbar-theme bg-primary navbar-static-top" role="navigation">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php?controller=home&action=index"><span class="fa fa-shield"></span> Pán Hàng</a>
        <a href="#" class='lte-menu-sm visible-xs navbar-brand'>
            <span class="fa fa-list"></span>
        </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gears"></i></a>
                <ul class="dropdown-menu navbar-selector">
                    <li role="presentation" class="dropdown-header font-primary noClick">Navbar Color</li>
                    <li class="font-primary" data-color="bg-primary"><a href="#"><i class="fa fa-gear"></i> Primary <small class="text-muted">(default)</small></a></li>
                    <li class="font-blue" data-color="bg-blue"><a href="#"><i class="fa fa-gear"></i> Blue </a></li>
                    <li class="font-light-blue" data-color="bg-light-blue"><a href="#"><i class="fa fa-gear"></i> Light Blue</a></li>
                    <li class="font-green" data-color="bg-green"><a href="#"><i class="fa fa-gear"></i> Green</a></li>
                    <li class="font-yellow" data-color="bg-yellow"><a href="#"><i class="fa fa-gear"></i> Yellow</a></li>
                    <li class="font-purple" data-color="bg-purple"><a href="#"><i class="fa fa-gear"></i> Purple</a></li>
                    <li class="font-red" data-color="bg-red"><a href="#"><i class="fa fa-gear"></i> Red</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="#" disabled="disabled">Xin Chào, <?php echo $username ?>!</a></li>
                    <li><a href="index.php?controller=user&action=update&id=<?php echo $user_id ?>">Profile</a></li>
                    <li><a href="index.php?controller=user&action=logout">Logout</a></li>
                </ul>
            </li>
        </ul>
        <form method="get" action="" class="navbar-form navbar-right">
            <input type="hidden" name="controller" value="<?php echo isset($_GET['controller']) ? $_GET['controller'] : '' ?>">
            <input type="hidden" name="action" value="<?php echo isset($_GET['action']) ? $_GET['action'] : '' ?>">
            <div class="form-group" style="display:flex;">
                <input type="text" style="width: 300px;" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>" class="form-control" placeholder="Search"/>
                <button type="submit" style="width: 100px; background: whitesmoke" class="form-control"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div><!-- /.navbar-collapse -->
</nav>
<!-- side bar -->
<div class="lte-sidebar col-md-2 col-sm-3 hidden-xs">
    <ul class="lte-sidebar-menu">

        <?php
        if(isset($_GET['controller'])){
            $status = $_GET['controller'];
        }
        ?>
        <li class="<?php if ($status == 'home'){ echo 'active';} ?>"><a href="index.php?controller=home&action=index"><i class="fa fa-home"></i> Home</a></li>

        <li class="<?php if ($status == 'user'){ echo 'active';} ?>"><a href="index.php?controller=user&action=index&page=1"><i class="fa fa-user"></i> Users</a></li>
        <li class="<?php if ($status == 'category'){ echo 'active';} ?>"><a href="index.php?controller=category&action=index&page=1"><i class="fa fa-bars"></i> Categories</a></li>
        <li class="<?php if ($status == 'news'){ echo 'active';} ?>"><a href="index.php?controller=news&action=index&page=1"><i class="fa fa-paperclip"></i> News</a></li>
        <li class="<?php if ($status == 'product'){ echo 'active';} ?>"><a href="index.php?controller=product&action=index&page=1"><i class="fa fa-shopping-cart"></i> Products</a></li>
        <li class="<?php if ($status == 'order'){ echo 'active';} ?>"><a href="index.php?controller=order&action=index&page=1"> <i class="fa fa-forward"></i>  Orders</a></li>
        <li class="<?php if ($status == 'contact'){ echo 'active';} ?>"><a href="index.php?controller=contact&action=index&page=1"> <i class="fa fa-reply-all"></i>  Feedback</a></li>



<!--        <li class="lte-tree">-->
<!--            <a href="#"><i class="fa fa-pagelines"></i> Multilevel Dropdown<i class="pull-right fa fa-angle-right"></i></a>-->
<!--            <ul class="lte-tree-menu">-->
<!--                <li class="lte-tree">-->
<!--                    <a href="#"><i class="fa fa-pagelines"></i> Level 1<i class="pull-right fa fa-angle-right"></i></a>-->
<!--                    <ul class="lte-tree-menu">-->
<!--                        <li class="lte-tree">-->
<!--                            <a href="#"><i class="fa fa-pagelines"></i> Level 2<i class="pull-right fa fa-angle-right"></i></a>-->
<!--                            <ul class="lte-tree-menu">-->
<!--                                <li><a href="#"><i class="fa fa-pagelines"></i> Level 3</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->
    </ul>

</div>

