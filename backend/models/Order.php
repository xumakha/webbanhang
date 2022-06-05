<?php
require_once 'models/Model.php';
class Order extends Model {
    public function getAll($str_search, $params) {

        $sql_select = "SELECT orders.* FROM orders 
                        WHERE TRUE $str_search
                        ORDER BY orders.id ASC
                        ";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }

    public function getOrderDetailById($id) {
        $sql_select = "SELECT * FROM order_details WHERE order_id = $id";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $order_details = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $order_details;
    }

    public function getById($id) {
        $sql_select_one = "SELECT * FROM orders WHERE id = $id";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $obj_select_one->execute();
        $order = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $order;
    }

    public function update($id, $data) {
        $sql_update = "UPDATE orders SET fullname = :fullname, address=:address, mobile=:mobile, email=:email, note=:note, price_total=:price_total, payment_status=:payment_status WHERE id=$id";
        $obj_update = $this->connection->prepare($sql_update);
        $updates = [
            ':fullname' => $data['fullname'],
            ':address' => $data['address'],
            ':mobile' => $data['mobile'],
            ':email' => $data['email'],
            ':note' => $data['note'],
            ':price_total' => $data['price_total'],
            ':payment_status' => $data['payment_status']
        ];
        $is_update = $obj_update->execute($updates);
        return $is_update;
    }

    public function deleteOrder($id) {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM orders WHERE id = $id");
        $is_delete =  $obj_delete->execute();
        return $is_delete;
    }
    public function deleteOrderDetail($id) {
        $obj_delete_order_detail = $this->connection
            ->prepare("DELETE FROM order_details WHERE order_id = $id");
        $is_delete = $obj_delete_order_detail->execute();
        return $is_delete;
    }
}