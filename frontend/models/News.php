<?php
require_once 'models/Model.php';

class News extends Model{
    public function countTotal() {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM news WHERE TRUE");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getNews($str_search, $params) {
        $page = $params['page'];
        $limit = $params['limit'];
        $start = ($page - 1) * $limit;
        $sql_select = "SELECT * FROM news WHERE TRUE $str_search LIMIT $start, $limit";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $news = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    }

    public function getNewsById($id) {
        $sql_select = "SELECT * FROM news WHERE id=$id";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $news = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $news;
    }
}