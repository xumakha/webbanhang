<?php
require_once 'models/Model.php';
class Home extends Model {
    public function insert($arrs) {
        $sql_insert =
            "INSERT INTO contacts(name, email, subject, message) VALUES(:name, :email, :subject, :message)";
        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':name' => $arrs['name'],
            ':email' => $arrs['email'],
            ':subject' => $arrs['subject'],
            ':message' => $arrs['message']
        ];
        return $obj_insert->execute($arr_insert);
    }
}