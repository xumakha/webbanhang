<?php
require_once 'models/Model.php';
class Order extends Model{
    public function insertPayment($params) {
        $sql_insert = "INSERT INTO orders (fullname, address, mobile, email, note, price_total, payment_status) VALUES (:fullname, :address, :mobile, :email, :note, :price_total, :payment_status)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':fullname' => $params['fullname'],
            ':address' => $params['address'],
            ':mobile' => $params['mobile'],
            ':email' => $params['email'],
            ':note' => $params['note'],
            ':price_total' => $params['price_total'],
            ':payment_status' => $params['payment_status'],
        ];
        $is_insert = $obj_insert->execute($inserts);
        $order_id = $this->connection->lastInsertId();
        return $order_id;
    }
}