<?php
require_once 'controllers/Controller.php';
require_once 'models/Contact.php';

class ContactController extends Controller {
    public function index() {
        $this->page_title = 'Contacts';

        $contact_model = new Contact();
        $contacts = $contact_model->getAll();

        $this->content = $this->render('views/contacts/index.php', [
            'contacts' => $contacts
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=order');
            exit();
        }
        $id = $_GET['id'];
        $contact_model = new Contact();
        $is_delete = $contact_model->deleteContact($id);

        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=contact&action=index');
        exit();
    }
}