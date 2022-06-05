<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
require_once 'models/Category.php';
require_once 'models/News.php';
require_once 'models/Product.php';

class HomeController extends Controller {


    public function index() {
        $this->page_title = "Home";

        $product_model = new Product();
        $products = $product_model->countTotal();

        $user_model = new User();
        $users = $user_model->countTotal();

        $category_model = new Category();
        $categories = $category_model->countTotal();

        $news_model = new News();
        $news = $news_model->countTotal();

        $this->content = $this->render('views/layouts/home.php', [
            'news' => $news,
            'users' => $users,
            'categories' => $categories,
            'products' => $products
        ]);
        require_once 'views/layouts/main.php';
    }
}