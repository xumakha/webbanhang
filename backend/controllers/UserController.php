<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller
{
    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: index.php?controller=login&action=login');
        exit();
    }

    public function delete()
    {
        $user_model = new User();
        $id = $_GET['id'];
        $is_delete = $user_model->delete($id);
        if($is_delete) {
            $_SESSION['success'] = 'Xóa thành công!';
            header('Location: index.php?controller=user');
            exit();
        }
    }

    public function update() {
        $this->page_title = "Update User";
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?controller=user&action=index');
            exit();
        }
        $id = $_GET['id'];
        $user_model = new User();
        $user = $user_model->getById($id);

        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $jobs = $_POST['jobs'];
            $facebook = $_POST['facebook'];



            if(empty($email)) {
                $this->error = 'Không được để trống email!';
            }
            //nếu ko có lỗi thì tiến hành save dữ liệu
            if (empty($this->error)) {
                $filename = $user['avatar'];
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
                $data = [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'phone' => $phone,
                    'address' => $address,
                    'email' => $email,
                    'jobs' => $jobs,
                    'avatar' => $filename,
                    'facebook' => $facebook,
                    'id' => $id
                ];
                $is_update = $user_model->update($data);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=user');
                exit();
            }

        }
        $this->content = $this->render('views/users/update.php', [
            'user' => $user
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail()
        {

        }

    public function index()
        {
            $this->page_title = 'Users';

            $str_search = '';
            if(isset($_GET['title'])) {
                $title = $_GET['title'];
                $str_search .= " AND users.username LIKE '%$title%'";
            }

            $user_model = new User();
            $users = $user_model->getAll($str_search);
            $this->content = $this->render('views/users/index.php', [
                'users' => $users
            ]);
            require_once 'views/layouts/main.php';
        }

    public function changePassword() {
        $this->page_title = 'Đổi mật khẩu';
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header('Location: index.php?controller=user&action=index');
            exit();
        }
        $id = $_GET['id'];
        if(isset($_POST['submit'])) {
            $password = $_POST['password'];
            $new_password = $_POST['new_password'];
            $new_password_confirm = $_POST['new_password_confirm'];
            $user_model = new User();
            $user = $user_model->getById($id);
            if(!password_verify($password, $user['password'])) {
                $this->error = 'Mật khẩu cũ không khớp';
            } else if($new_password != $new_password_confirm) {
                $this->error = 'Mật khẩu nhập lại phải trùng mật khẩu mới';
            }
            if(empty($this->error)) {
                $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);
                $is_update = $user_model->changePassword($id, $new_password_hash);
                if($is_update) {
                    $_SESSION['success'] = 'Đổi mật khẩu thành công!';
                    unset($_SESSION['user']);
                    header('Location: index.php?controller=login&action=login');
                    exit();
                }
            }
        }
        $this->content = $this->render('views/users/change_password.php');
        require_once 'views/layouts/main.php';
    }
}
