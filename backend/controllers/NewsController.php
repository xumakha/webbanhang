<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';
require_once 'models/Category.php';
require_once 'helpers/PaginationTest.php';
class NewsController extends Controller {
    public function index() {
        $this->page_title = 'News';
        $str_search = '';
        if(isset($_GET['title'])) {
            $title = $_GET['title'];
            $str_search .= " AND news.name LIKE '%$title%'";
        }
        $news_model = new News();
        $arr_params = [
            'limit' => 5,
            'total' => $news_model->countTotal(),
            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'controller' => 'news',
            'action' => 'index'
        ];
        $pagination_model = new PaginationTest($arr_params);
        $pages = $pagination_model->getPagination($arr_params);
        $news = $news_model->getNews($str_search, $arr_params);
        $this->content = $this->render('views/news/index.php', [
            'news' => $news,
            'pages' => $pages
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create() {
        $this->page_title = 'Insert news';

        if(isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $summary = $_POST['summary'];
//            $avatar = $_FILES['avatar'];
            $content = $_POST['content'];
            if (empty($name)) {
                $this->error = 'Không được để trống title';
            } else if ($_FILES['avatar']['error'] == 0) {
                //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 10) {
                    $this->error = 'File upload không được quá 10MB';
                }
            }
            if (empty($this->error)) {
                $filename = '';
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = 'assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-news-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                //save dữ liệu vào bảng products

                $arrs = [
                    'category_id' => $category_id,
                    'name' => $name,
                    'summary' => $summary,
                    'avatar' => $filename,
                    'content' => $content
                ];
                $news_model = new News();
                $is_insert = $news_model->insert($arrs);

                if ($is_insert) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=news');
                exit();
            }
        }

        $category_model = new Category();
        $categories = $category_model->getAll();

        $this->content = $this->render('views/news/create.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function update() {
        $this->page_title = 'Update news';
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?controller=user&action=index');
            exit();
        }
        $id = $_GET['id'];
        $news_model = new News();
        $new = $news_model->getNewsById($id);
        if(isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $summary = $_POST['summary'];
//            $avatar = $_FILES['avatar'];
            $content = $_POST['content'];
            if (empty($name)) {
                $this->error = 'Không được để trống title';
            } else if ($_FILES['avatar']['error'] == 0) {
                //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 10) {
                    $this->error = 'File upload không được quá 10MB';
                }
            }
            if (empty($this->error)) {
                $filename = $new['avatar'];
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = 'assets/uploads';
                    //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-product-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                //save dữ liệu vào bảng products


                $arrs = [
                    'category_id' => $category_id,
                    'name' => $name,
                    'summary' => $summary,
                    'avatar' => $filename,
                    'content' => $content
                ];
                $news_model = new News();
                $is_update = $news_model->update($id, $arrs);
                if ($is_update) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=news');
                exit();
            }
        }

        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render('views/news/update.php', [
            'categories' => $categories,
            'new' => $new
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete() {
        $id = $_GET['id'];
        $news_model = new News();
        $is_delete = $news_model->delete($id);

        if (!$is_delete) {
            $_SESSION['error'] = "Xóa thất bại";
        } else {
            $_SESSION['success'] = 'Xóa thành công';
        }
        header('Location: index.php?controller=news');
        exit();
    }
}



