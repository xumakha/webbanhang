<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'helpers/PaginationTest.php';
require_once 'models/Category.php';
class ProductController{

    public $content;
    //chứa nội dung lỗi validate
    public $error;
//    Tiêu đề động của trang
    public $page_title;
    public function __construct()
    {
//    echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//    print_r($_SESSION);
//    echo "</pre>";
//    die;
    }



    /**
     * @param $file string Đường dẫn tới file
     * @param array $variables array Danh sách các biến truyền vào file
     * @return false|string
     */
    public function render($file, $variables = []) {

        //Nhập các giá trị của mảng vào các biến có tên tương ứng chính là key của phần tử đó.
        //khi muốn sử dụng biến từ bên ngoài vào trong hàm
        extract($variables);
        //bắt đầu nhớ mọi nội dung kể từ khi khai báo, kiểu như lưu vào bộ nhớ tạm
        ob_start();
        //thông thường nếu ko có ob_start thì sẽ hiển thị 1 dòng echo lên màn hình
        //tuy nhiên do dùng ob_Start nên nội dung của nó đã đc lưu lại, chứ ko hiển thị ra màn hình nữa
        require_once $file;
        //lấy dữ liệu từ bộ nhớ tạm đã lưu khi gọi hàm ob_Start để xử lý, lấy xong rồi xóa luôn dữ liệu đó
        $render_view = ob_get_clean();

        return $render_view;
    }



    public function detail() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID ko hợp lệ';
            $url_redirect = $_SERVER['SCRIPT_NAME'] . '/';
            header("Location: $url_redirect");
            exit();
        }
        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getById($id);
        $this->page_title = $product['title'];


        $this->content = $this->render('views/products/detail.php', [
            'product' => $product,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function index() {
        $this->page_title = 'Products';

        $str_search = '';
        if(isset($_GET['title'])) {
            $title = $_GET['title'];
            $str_search .= " AND products.title LIKE '%$title%'";
        }
        $product_model = new Product();
        $params = [
            'total' => $product_model->countTotal(),
            'limit' => 8, //giới hạn 8 bản ghi 1 trang
            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'controller' => 'product',
            'action' => 'index',
            'full_mode' => FALSE,
            'title' => isset($_GET['title']) ? $_GET['title'] : '',
        ];

        $pagination = new PaginationTest($params);
        $pages = $pagination->getPagination($params);

        $products = $product_model->getProductInHomePage($str_search, $params);
        $this->content = $this->render('views/products/index.php', [
            'products' => $products,
            'pages' => $pages
        ]);
        require_once 'views/layouts/main.php';
    }
    public function contact() {
        $this->content = $this->render('views/contacts/contact.php');
        require_once 'views/layouts/main.php';
    }
}
