<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';

class OrderController extends Controller{


    public function index() {
        $this->page_title = 'Orders';

        $order_model = new Order();

        $params = [];
        $str_search = '';
        if(isset($_GET['title'])) {
            $title = $_GET['title'];
            $str_search .= " AND orders.fullname LIKE '%$title%'";
        }
        $orders = $order_model->getAll($str_search, $params);
        $this->content = $this->render('views/orders/index.php', [
            'orders' => $orders
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail() {
        $this->page_title = 'Order Detail';
        $order_model = new Order();
        if(isset($_GET['id']) || is_numeric($_GET['id'])) {
            $id = $_GET['id'];
        }
        $order_details = $order_model->getOrderDetailById($id);
        $this->content = $this->render('views/orders/detail.php', [
            'order_details' => $order_details
        ]);
        require_once 'views/layouts/main.php';
    }

    public function update() {
        $this->page_title = 'Update Order';
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }
        $id = $_GET['id'];
        $order_model = new Order();
        $order = $order_model->getById($id);
        if(isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $price_total = $_POST['price_total'];
            $payment_status = $_POST['status'];

            if(empty($fullname) || empty($address) || empty($mobile) || empty($price_total)) {
                $this->error = 'Phải nhập đủ các trường!';
            }
            if (empty($this->error)) {
                $data = [
                    'fullname' => $fullname,
                    'address' => $address,
                    'mobile' => $mobile,
                    'email' => $email,
                    'note' => $note,
                    'price_total' => $price_total,
                    'payment_status' => $payment_status
                ];
                $order_model = new Order();
                $is_update = $order_model->update($id, $data);

                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công!';
                    header('Location: index.php?controller=order&ation=index');
                    exit();
                }
            }
        }


        $this->content = $this->render('views/orders/update.php', [
            'order' => $order
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=order');
            exit();
        }
        $id = $_GET['id'];
        $order_model = new Order();
        $is_delete0 = $order_model->deleteOrderDetail($id);
        $is_delete1 = $order_model->deleteOrder($id);
        if ($is_delete0 && $is_delete1) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=order');
        exit();
    }
}