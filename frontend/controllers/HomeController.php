<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/News.php';
require_once 'models/Home.php';

class HomeController extends Controller {
    public function index() {
        $this->page_title = 'Home';
        $product_model = new Product();
        $news_model = new News();
        $str_search = '';
        $params_product = [
            'total' => $product_model->countTotal(),
            'limit' => 12, //giới hạn bản ghi 1 trang
            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'controller' => 'product',
            'action' => 'index',
            'full_mode' => FALSE,
        ];
        $params_news = [
            'total' => $product_model->countTotal(),
            'limit' => 12, //giới hạn 8 bản ghi 1 trang
            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'controller' => 'product',
            'action' => 'index',
            'full_mode' => FALSE,
        ];
        $products = $product_model->getProductInHomePage($str_search, $params_product);
        $news = $news_model->getNews($str_search, $params_news);
        $this->content = $this->render('views/homes/index.php', [
            'products' => $products,
            'news' => $news
        ]);
        require_once 'views/layouts/main.php';
    }
    public function contact() {
        $this->page_title = 'Contact';
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            if(empty($name) || empty($email) || empty($subject) || empty($message)) {
                $this->error = 'Phải nhập đủ các trường';
            }
            if(empty($this->error)) {
                $arrs = [
                    'name' => $name,
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message
                ];
                $home_model = new Home();
                $is_insert = $home_model->insert($arrs);
                if($is_insert) {
                    $_SESSION['success'] = 'Gửi tin nhắn thành công!';
                    unset($_SESSION['success']);
                    header('Location: index.php?controller=home&action=contact');
                    exit();
                }
            }

        }
        $this->content = $this->render('views/contacts/contact.php');
        require_once 'views/layouts/main.php';
    }
}