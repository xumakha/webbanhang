<?php
require_once 'models/News.php';
require_once 'controllers/Controller.php';
require_once 'helpers/PaginationTest.php';
class NewsController extends Controller{
    public function index() {
        $this->page_title = 'News';

        $str_search = '';
        if(isset($_GET['title'])) {
            $title = $_GET['title'];
            $str_search .= " AND news.name LIKE '%$title%'";
        }
        $news_model = new News();
        $params = [
            'total' => $news_model->countTotal(),
            'limit' => 8, //giới hạn 5 bản ghi 1 trang
            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'controller' => 'news',
            'action' => 'index',
            'full_mode' => FALSE,
        ];

        $pagination = new PaginationTest($params);
        $pages = $pagination->getPagination($params);

        $news = $news_model->getNews($str_search, $params);
        $this->content = $this->render('views/news/index.php', [
            'news' => $news,
            'pages' => $pages
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail() {
        $id = $_GET['id'];
        $news_model = new News();
        $news = $news_model->getNewsById($id);
        $this->page_title = $news['name'];

        $this->content = $this->render('views/news/detail.php', [
            'news' => $news
        ]);
        require_once 'views/layouts/main.php';
    }
}