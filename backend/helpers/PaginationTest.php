<?php
class PaginationTest
{
    // Tạo 1 mảng để lưu cấu hình phân trang
    public $params = [
        'total' => 0, // Khởi tạo tổng số trang mặc định là 0
        'limit' => 0, // Khởi tạo tổng số bản ghi trên 1 trang mặc định là 0
    ];

    //Hàm tạo
    public function __construct($params)
    {
        // Gán mảng param tại nơi gọi class cho thuộc tính params của class đó
        $this->params = $params;

    }

    public function getTotalPage() {
        //Hàm lấy ra tổng số trang trong CSDL
        //Total = 100 , limit = 10 thì có 10 trang
        $total = $this->params['total'];
        $limit = $this->params['limit'];
        $total = ceil($total / $limit);
        return $total;
    }

    // Hàm lấy ra trang hiện tại
    public function getCurrentPage() {
        $page = 1;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        return $page;
    }

    public function getPrevPage($controller, $action) {
        $prev_page = '';
        $current_page = $this->getCurrentPage();
        // Chỉ hiển thị trang prev nếu ko phải trang đầu tiên
        if($current_page > 1) {
            $url_prev = "index.php?controller=$controller&action=$action&page=" . ($current_page - 1);
            $prev_page.= "<li>";
            $prev_page.= "<a href='$url_prev'><</a>";
            $prev_page.= "</li>";
        }
        return $prev_page;
    }

    public function getNextPage($controller, $action) {
        $next_page = '';
        $current_page = $this->getCurrentPage();
        // Chỉ hiện thị trang sau nếu ko phải trang cuối
        $total_page = $this->getTotalPage();
        if($current_page < $total_page) {
            $url_next = "index.php?controller=$controller&action=$action&page=" . ($current_page + 1);
            $next_page.= "<li>";
            $next_page.= "<a href='$url_next'>></a>";
            $next_page.= "</li>";
        }
        return $next_page;
    }

    public function getPagination($arr_params) {
        $controller = $arr_params['controller'];
        $action = $arr_params['action'];
        // Hiển thị cấu trúc phân trang của bootstrap
        $data = '';
        // Nếu chỉ có 1 trang duy nhất thì ko hiển thị phân trang
        $total_page = $this->getTotalPage();
        if($total_page == 1) {
            return '';
        } elseif ($total_page > 1) {
            $data .= "<ul class='pagination'>";
            $data .= $this->getPrevPage($controller, $action);

            //Hiển thị từ trang 1 đến tổng trang
            $current_page = $this->getCurrentPage();

            for($page = 1; $page <= $total_page; $page++) {
                $url_page = "index.php?controller=$controller&action=$action&page=$page";
                $data.= "<li>";
                    if (isset($_GET['page'])) {
                        if($page == $_GET['page']){
                            $data.= "<a style='color: red' href='$url_page'>$page</a>";
                        } else {
                            $data.= "<a href='$url_page'>$page</a>";
                        }
                    } else {
                            $data.= "<a href='$url_page'>$page</a>";
                    }
                $data.= "</li>";
            }
            $data .= $this->getNextPage($controller, $action);
            if(isset($_GET['title'])) {
                $data = '';
            }
            return $data;
        }
    }
}