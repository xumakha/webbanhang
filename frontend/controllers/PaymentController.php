<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
Class PaymentController extends Controller {
    public function index() {
        if(isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $method = $_POST['method'];
            if (empty($fullname) || empty($address) || empty($mobile)) {
                $this->error = 'Không được để trống các trường tên, địa chỉ, sdt';
            }
            if (empty($this->error)) {
                // Lưu các thông tin thanh toán vào bản order trước, lấy ra dc id của order
                $order_model = new Order();
                $price_total = 0;
                foreach ($_SESSION['cart'] AS $cart) {
                    $price_total += $cart['price'] * $cart['quantity'];
                }
                $params = [
                    'fullname' => $fullname,
                    'address' => $address,
                    'mobile' => $mobile,
                    'email' => $email,
                    'note' => $note,
                    'price_total' => $price_total,
                    'payment_status' => 0 // Mặc định là đơn hàng mới
                ];
                $order_id = $order_model->insertPayment($params);
                // Lưu thông tin chi tiết đơn hàng vào bảng order_detail
                // orders - order_detail -> 1 - n
                $order_detail_model = new OrderDetail();
                foreach ($_SESSION['cart'] AS $cart) {
                    $params = [
                        'order_id' => $order_id,
                        'product_name' => $cart['name'],
                        'product_price' => $cart['price'],
                        'quantity' => $cart['quantity'],
                    ];
                    $is_insert = $order_detail_model->insertOrderDetail($params);
                }
                // Gửi mail xác nhận thanh toán cho user

                if($method == 0) {
                    $_SESSION['info'] = [
                        'price_total' => $price_total,
                        'fullname' => $fullname,
                        'email' => $email,
                        'mobile' => $mobile
                    ];
                    unset($_SESSION['cart']);
                    header('Location: index.php?controller=payment&action=online');
                    exit();
                } else {
                    unset($_SESSION['cart']);
                    header('Location: index.php?controller=payment&action=thank');
                    exit();
                }
            }
        }
        // Controller gọi view:
        $this->page_title = 'Payment';
        $this->content = $this->render('views/payments/index.php');
        require_once 'views/layouts/main.php';
    }

    public function online() {
        $this->page_title = 'Online Payment';
        $this->content = $this->render('libraries/nganluong/index.php');
        echo $this->content;
    }

    public function thank() {
        $this->page_title = 'Thank You For Purchasing';
        $this->content = $this->render('views/payments/thank.php');
        require_once 'views/layouts/main.php';
    }
}