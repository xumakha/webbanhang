<?php
require_once 'models/Model.php';

class News extends Model{
    public $id;
    public $category_id;
    public $title;
    public $avatar;
    public $price;
    public $name;
    public $amount;
    public $summary;
    public $content;
    public $created_at;
    public $updated_at;

    public function countTotal() {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM news WHERE TRUE");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
    public function getNews($str_search, $arr_params) {
        $page = $arr_params['page'];
        $limit = $arr_params['limit'];
        $start = ($page - 1) * $limit;
        $sql_select = "SELECT news.*, categories.name AS category_name FROM news 
                        INNER JOIN categories ON categories.id = news.category_id
                        WHERE TRUE $str_search
                        ORDER BY news.id ASC
                        LIMIT $start, $limit";
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
    public function insert($arrs) {
        $sql_insert = "INSERT INTO news(category_id, name, avatar, summary, content) 
                                VALUES (:category_id, :name, :avatar, :summary, :content)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':category_id' => $arrs['category_id'],
            ':name' => $arrs['name'],
            ':avatar' => $arrs['avatar'],
            ':summary' => $arrs['summary'],
            ':content' => $arrs['content']
        ];
        $is_insert = $obj_insert->execute($inserts);
        return $is_insert;
    }
    public function update($id, $arrs) {
        $sql_update = "UPDATE news SET category_id=:category_id, name=:name, avatar=:avatar, summary=:summary,content=:content WHERE id = $id";
        $obj_update = $this->connection->prepare($sql_update);
        $updates = [
            ':category_id' => $arrs['category_id'],
            'name' => $arrs['name'],
            'avatar' => $arrs['avatar'],
            'summary' => $arrs['summary'],
            'content' => $arrs['content']
        ];
        $is_update = $obj_update->execute($updates);
        return $is_update;
    }
    public function delete($id) {
        $sql_delete = "DELETE FROM news WHERE id=$id";
        $obj_delete = $this->connection->prepare($sql_delete);
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }
}