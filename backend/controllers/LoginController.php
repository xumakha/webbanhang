<?php
require_once 'models/User.php';
require_once 'helpers/Helper.php';
class LoginController
{
    //chứa nội dung view
    public $content;
    //chứa nội dung lỗi validate
    public $error;

    /**
     * @param $file string Đường dẫn tới file
     * @param array $variables array Danh sách các biến truyền vào file
     * @return false|string
     */
    public function render($file, $variables = [])
    {
        //Nhập các giá trị của mảng vào các biến có tên tương ứng chính là key của phần tử đó.
        //khi muốn sử dụng biến từ bên ngoài vào trong hàm
        extract($variables);
        //bắt đầu nhớ mọi nội dung kể từ khi khai báo, kiểu như lưu vào bộ nhớ tạm
        ob_start();
        //thông thường nếu ko có ob_start thì sẽ hiển thị 1 dòng echo lên màn hình
        //tuy nhiên do dùng ob_Start nên nội dung của nó đã đc lưu lại, chứ ko hiển thị ra màn hình nữa
        require_once $file;
        //lấy dữ liệu từ bộ nhớ tạm đã lưu khi gọi hàm ob_Start để xử lý, lấy xong rồi xóa luôn dữ liệu đó
        $render_view = ob_get_clean();

        return $render_view;
    }


    public function login()
    {
        $this->page_title = "Login";
        //nếu user đã đăng nhập r thì ko cho truy cập lại trang login, mà chuyển hướng tới backend
        if (isset($_SESSION['user'])) {
            header('Location: index.php?controller=product&action=index&page=1');
            exit();
        }
        if (isset($_POST['submit'])) {
//            die;
            $username = $_POST['username'];
            //do password đang lưu trong CSDL sử dụng cơ chế mã hóa md5 nên cần phải thêm
//            hàm md5 cho password
            $password = $_POST['password'];
            //validate
            if (empty($username) || empty($password)) {
                $this->error = 'Username hoặc password không được để trống';
            }
            $user_model = new User();
            if (empty($this->error)) {
                $user = $user_model->getUser($username);
                if (empty($user)) {
                    $this->error = 'Username ko tồn tại';
                } else {
                    // + Dùng hàm sau để kiểm tra xem mật
                    //khẩu mã hóa có đúng với mật khẩu từ
                    //form gửi lên hay ko
                    // Hàm này chỉ có tác dụng với các mật
                    //khẩu đc mã hóa bằng hàm password_hash
                    $is_same_password = password_verify($password, $user['password']);
                    if ($is_same_password) {
                        $_SESSION['success'] = 'Đăng nhập thành công';
                        //tạo session user để xác định user nào đang login
                        $_SESSION['user'] = $user;
                        header("Location: index.php?controller=home");
                        exit();
                    } else {
                        $this->error = 'Sai tài khoản hoặc mật khẩu';
                    }
                }
            }
        }
        $this->content = $this->render('views/users/login.php');

        require_once 'views/layouts/main_login.php';
    }

    /**
     * Đăng ký tài khoản mới, mặc định tất cả các user đều có quyền admin
     */
    public function register()
    {
        $this->page_title = "Register";
        if (isset($_POST['submit'])) {
            $user_model = new User();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $password_confirm = $_POST['password_confirm'];
            $user = $user_model->getUserByUsername($username);
            $emailcheck = $user_model->checkEmailExist($email);
            //check validate
            if (empty($username) || empty($password) || empty($password_confirm) || empty($email)) {
                $this->error = 'Không được để trống các trường';
            } else if ($password != $password_confirm) {
                $this->error = 'Password nhập lại chưa đúng';
            } else if (!empty($user)) {
                $this->error = 'Username này đã tồn tại';
            } else if (!empty($emailcheck)) {
                $this->error = 'Email này đã tồn tại';
            }
            //xử lý lưu dữ liệu khi không có lỗi
            if (empty($this->error)) {
                $password_encrypt = password_hash($password, PASSWORD_BCRYPT);
                $data = [
                    'username' => $username,
                    'email' => $email,
                    'password' => $password_encrypt
                ];
                $is_insert = $user_model->register($data);
                if ($is_insert) {
                    $_SESSION['success'] = 'Đăng ký thành công';
                    header('Location: index.php?controller=login&action=login');
                    exit();
                }
            }
        }

        $this->content = $this->render('views/users/register.php');
        require_once 'views/layouts/main_login.php';
    }
    public function resetPassword() {
        $this->page_title = "Reset Password";
        if(isset($_POST['submit'])) {
//            $username = $_POST['username'];
            $email = $_POST['email'];
            if(empty($this->error)) {
                // Gửi 1 link vào email của user, link chính là url để reset mật khẩu
                // index.php?controller=login&action=checkLinkReset&email=abc@gmail.com
                // Không truyền trực tiếp giá trị của email lên url, mà sẽ cần mã hóa chuỗi email này
                // Cần check xem email đã tồn tại với tài khoản nào chưa
                $user_model = new User();
                $user = $user_model->checkEmailExist($email);
                if(empty($user)) {
                    $this->error = 'Không tồn tại email này trong hệ thống!';
                } else {
                    // - Tạo thêm 1 trường reset_password_token trong bảng users
                    // - Update chuỗi mã hóa email vào trường reset_password_token, demo mã hóa email bằng md5
                    $reset_password_token = md5($email); // Ra 1 chuỗi mã hóa -> update mã hash vào trong csdl
                    $is_update = $user_model->updateResetPasswordToken($user['id'], $reset_password_token);
//                  var_dump($is_update);

                    if($is_update) {
                        //Gửi mail chứa link để reset mật khẩu
                        $url_reset_password = "http://localhost:63342/PHP0721E_demo/PHP0721E-PROJECT/MVC/backend/index.php?controller=login&action=checkLinkReset&hash=$reset_password_token";
                        // Viết hàm gửi mail
                        // Tạo thư mục mvc_cart_frontend/backend/libraries
                        // Copy file PHPMailer vào thư mục bên trên
                        $subject = "Đặt lại mật khẩu";
                        $to = $email;
                        $body = "Nhấn vào <a href='$url_reset_password'>đây</a> để thiết lập lại mật khẩu!";
                        Helper::sendMail($subject, $to, $body);
                        // Cách gọi hàm của class tĩnh trong php
                        $_SESSION['success'] = 'Vui lòng kiểm tra email để lấy lại mật khẩu!';
                        header('Location: index.php?controller=login&action=login');
                        exit();
                    }
                }
            }
        }

        // Gọi view để hiển thị
        $this->content = $this->render('views/users/reset_password.php');
        // chức năng ko cần đăng nhập thì sẽ dùng chung 1 file layout
        require_once 'views/layouts/main_login.php';
    }

    public function checkLinkReset() {
        $this->page_title = 'Reset Password';

        if (isset($_POST['submit'])) {
            $hash = $_GET['hash'];
            // Lấy ra user có mã hash tương ứng
            $user_model = new User();
            $user = $user_model->getUserByResetPasswordToken($hash);
            if(empty($user)) {
                $this->error = 'User không tồn tại!';
            } else {
                $password = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];
                if($password != $password_confirm) {
                    $this->error = 'Mật khẩu nhập lại không khớp!';
                }
                if(empty($this->error)) {
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                    $is_update = $user_model->updatePasswordReset($user['id'], $password_hash);
                    if($is_update) {
                        $_SESSION['success'] = 'Đổi mật khẩu thành công!';
                        header('Location: index.php?controller=login&action=login');
                        exit();
                    }
                }
            }


        }
        $this->content = $this->render('views/users/check_link_reset.php');
        require_once 'views/layouts/main_login.php';
    }



}