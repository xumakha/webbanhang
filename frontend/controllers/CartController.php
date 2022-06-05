<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
class CartController extends Controller {
    public function index() {
        if (isset($_POST['submit'])) {
            // Để ý trường hợp số lượng sản phẩm là số âm !


            // Lặp mảng giỏ hàng để set lại số lượng mới cho từng sản phẩm trong giỏ
            foreach ($_SESSION['cart'] AS $product_id => $cart) {
                // - Xử lý check nếu số lượng là số âm, thì báo lỗi và ko thực hiện update quantity

                $_SESSION['cart'][$product_id]['quantity'] = $_POST[$product_id];
            }

            $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
        }


        // Gọi view để hiển thị
        $this->page_title = 'Cart';
        $this->content = $this->render('views/carts/index.php');
        require_once 'views/layouts/main.php';
    }
    public function delete() {
        unset($_SESSION['cart'][$_GET['id']]);
        header('Location: index.php?controller=cart&action=index');
        exit();
    }
    public function deleteCart() {
        unset($_SESSION['cart']);
        header('Location: index.php?controller=cart&action=index');
        exit();
    }
    public function add() {
        $product_id = $_GET['product_id'];
        $product_model = new Product();
        $product = $product_model->getById($product_id);
        echo "<pre>";
        print_r($product);
        echo "</pre>";
        $cart_item = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quantity' => 1
        ];
        // Xử lý logic thêm sản phẩm vào giỏ hàng sử dụng session:
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $cart_item;
        } else {
            // Thêm 1 sản phẩm đã tồn tại trong giỏ
            if(isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            } else {
                // Thêm 1 sản phẩm mới chưa có trong giỏ
                $_SESSION['cart'][$product_id] = $cart_item;
            }
        }
        echo "<pre>";
        print_r($_SESSION['cart']);
        echo "</pre>";
    }
}