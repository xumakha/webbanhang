<?php
require_once 'models/Model.php';
class Product extends Model
{
    public $str_search = '';
    public $str_category = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND products.title LIKE '%{$_GET['title']}%'";

        }
        if(isset($_GET['category']) && !empty($_GET['category'])) {
            $this->str_category .= "AND categories.name = '{$_GET['category']}'";
        }
    }

    public function countTotal() {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getProductInHomePage($str_search, $params)
    {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        //do cả 2 bảng products và categories đều có trường name, nên cần phải thay đổi lại tên cột cho 1 trong 2 bảng
        $sql_select = "SELECT products.*, categories.name 
          AS category_name FROM products
          INNER JOIN categories ON products.category_id = categories.id
          WHERE TRUE $str_search AND products.amount > 0 $this->str_category
          LIMIT $start, $limit";

        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();

        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function getById($id) {
        $sql_select_one = "SELECT products.*, categories.name 
          AS category_name FROM products
          INNER JOIN categories ON products.category_id = categories.id WHERE products.id = $id AND products.amount > 0";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $obj_select_one->execute();
        $product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public function getByCategory($category_name) {
        $sql_select = "SELECT products.*, categories.name 
          AS category_name FROM products
              where categories.name = dell
          INNER JOIN categories ON products.category_id = categories.id
          ";
    }
}
?>