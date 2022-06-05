<?php
require_once 'models/Model.php';

class User extends Model
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $address;
    public $email;
    public $avatar;
    public $jobs;
    public $facebook;
    public $status;
    public $created_at;
    public $updated_at;

    public $str_search;

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['username']) && !empty($_GET['username'])) {
            $username = addslashes($_GET['username']);
            $this->str_search .= " AND users.username LIKE '%$username%'";
        }
    }

    public function countTotal() {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM users WHERE TRUE");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getAll($str_search)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE TRUE $str_search ORDER BY id ASC");
        $obj_select->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function register($data) {
        // + Viết truy vấn
        $sql_insert = "INSERT INTO users(username, password, email) VALUES(:username, :password, :email)";
        // + Cbi obj truy vấn
        $obj_insert = $this->connection->prepare($sql_insert);
        // + Tạo mảng
        $inserts = [
            ':email' => $data['email'],
            ':username' => $data['username'],
            ':password' => $data['password'],

        ];
        // + Thực thi
        return $obj_insert->execute($inserts);
    }

    public function getUser($username)
    {
        $sql_select_one =
            "SELECT * FROM users WHERE username = :username";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $selects = [
            ':username' => $username
        ];
        $obj_select_one->execute($selects);
        $user = $obj_select_one
            ->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function getAllPagination($params = [])
    {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE TRUE $this->str_search
              ORDER BY created_at DESC
              LIMIT $start, $limit");

        $obj_select->execute();
        $users = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function getTotal()
    {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM users WHERE TRUE $this->str_search");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username)
    {
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM users WHERE username='$username'");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function checkEmailExist($email)
    {
        $sql_select_one = "SELECT * FROM users WHERE email=:email";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $selects = [
            ':email' => $email
        ];
        $obj_select_one->execute($selects);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO users(username, password, first_name, last_name, phone, address, email, avatar, jobs, facebook, status)
VALUES(:username, :password, :first_name, :last_name, :phone, :address, :email, :avatar, :jobs, :facebook, :status)");
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':first_name' => $this->first_name,
            ':last_name' => $this->last_name,
            ':phone' => $this->phone,
            ':address' => $this->address,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':jobs' => $this->jobs,
            ':facebook' => $this->facebook,
            ':status' => $this->status,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function update($data)
    {
        $sql_update = "UPDATE users SET first_name=:first_name, last_name=:last_name, phone=:phone, 
            address=:address, email=:email, avatar=:avatar, jobs=:jobs, facebook=:facebook
            WHERE id = :id";
        $obj_update = $this->connection->prepare("$sql_update");
        $arr_update = [
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':phone' => $data['phone'],
            ':address' => $data['address'],
            ':email' => $data['email'],
            ':avatar' => $data['avatar'],
            ':jobs' => $data['jobs'],
            ':facebook' => $data['facebook'],
            ':id' => $data['id']
        ];
        $obj_update->execute($arr_update);
        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM users WHERE id = $id");
        return $obj_delete->execute();
    }

    public function getUserByUsernameAndPassword($username, $password)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE username=:username AND password=:password LIMIT 1");
        $arr_select = [
            ':username' => $username,
            ':password' => $password,
        ];
        $obj_select->execute($arr_select);

        $user = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function insertRegister()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO users(username, password, email)
VALUES(:username, :password, :email)");
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':email' => $this->email,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function updateResetPasswordToken($id, $reset_password_token) {
        $sql_update = "UPDATE users SET reset_password_token=:reset_password_token WHERE id=:id";
        $obj_update = $this->connection->prepare($sql_update);
        $updates = [
            ':reset_password_token' => $reset_password_token,
            ':id' => $id
        ];
        $is_update = $obj_update->execute($updates);
        return $is_update;
    }

    public function getUserByResetPasswordToken($hash) {
        $sql_select_one = "SELECT * FROM users WHERE reset_password_token=:reset_password_token";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $selects = [
            ':reset_password_token' => $hash
        ];
        $obj_select_one->execute($selects);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function updatePasswordReset($id, $password) {
        $sql_update = "UPDATE users SET password=:password, reset_password_token='' WHERE id=:id";
        $obj_update = $this->connection->prepare($sql_update);
        $updates = [
            ':id' => $id,
            ':password' => $password
        ];
        $is_update = $obj_update->execute($updates);
        return $is_update;
    }

    public function changePassword($id, $password_hash) {
        $sql_update = "UPDATE users SET password=:password where id=$id";
        $obj_update = $this->connection->prepare($sql_update);
        $updates = [
            ':password' => $password_hash
        ];
        $is_update = $obj_update->execute($updates);
        return $is_update;
    }

}