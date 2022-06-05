<?php
require_once 'models/Model.php';

class Contact extends Model {
    public function getAll() {
        $sql_select = "SELECT * FROM contacts";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $contacts = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;
    }

    public function deleteContact($id) {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM contacts WHERE id = $id");
        $is_delete =  $obj_delete->execute();
        return $is_delete;
    }
}