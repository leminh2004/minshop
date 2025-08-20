<?php
// có class chứa các function thực thi xử lý logic 
class AdminUserController
{
    public $modelUser;

    public function __construct()
    {
        $this->modelUser = new AdminUser();
    }

    public function show()
    {
        $users = $this->modelUser->all();
        // var_dump($listProduct);die();
        require_once './views/admin/accounts/listAccount.php';
    }

    public function formAddUser()
    {
        require_once './views/admin/accounts/addAccount.php';
    }

    public function postUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $role = $_POST['role'] ?? '';
            $password = $_POST['password'] ?? '';


            $checkEmail = $this->modelUser->checkEmail($email);
            // Validate

            $errors = [];
            if (empty($name)) {
                $errors['name'] = "Tên không được để trống";
            }
            if (empty($email)) {
                $errors['email'] = "Email không được để trống";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email không hợp lệ";
            } else if (!$checkEmail) {
                $errors['email'] = "Email đã tồn tại";
            }
            if (empty($phone)) {
                $errors['phone'] = "Số điện thoại không được để trống";
            }
            if (!empty($phone)) {
                if (!ctype_digit($phone)) {
                    $errors['phone'] = "Vui lòng nhập số điện thoại hợp lệ";
                } elseif (strlen($phone) != 10) {
                    $errors['phone'] = "Số điện thoại chỉ có 10 kí tự";
                }
            }

            if ($role === '') {
                $errors['role'] = "Vui lòng chọn Role";
            }
            if (empty($password)) {
                $errors['password'] = "Mật khẩu không được để trống";
            }

            $_SESSION['error'] = $errors;
            if (empty($errors)) {

                $test = $this->modelUser->create(
                    $name,
                    $email,
                    $phone,
                    $role,
                    $password
                );
                // var_dump($test);die;
                unset($_SESSION['old']);
                header('Location: ' . BASE_URL . '?act=admin/tai-khoan');
                exit();
            } else {

                $_SESSION['flash'] = true;
                $_SESSION['old'] = $_POST;
                header('Location:' . BASE_URL . '?act=admin/form-them-tai-khoan');
            }
        }
    }

    public function formEditUser()
    {
        $id = $_GET['id'];
        $user = $this->modelUser->find($id);
        require_once './views/admin/accounts/editAccount.php';
    }

    public function postEditUser()
    {
        $checkEmail = true;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'];
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $role = $_POST['role'] ?? '';

            $user = $this->modelUser->find($id);


            if(!empty($user) && $user['email'] != $email)
            {
                $checkEmail = $this->modelUser->checkEmail($email);
            }else{
                $checkEmail = true;
            }
            // Validate

            $errors = [];
            if (empty($name)) {
                $errors['name'] = "Tên không được để trống";
            }
            if (empty($email)) {
                $errors['email'] = "Email không được để trống";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email không hợp lệ";
            } else if (!$checkEmail) {
                $errors['email'] = "Email đã tồn tại";
            }
            if (empty($phone)) {
                $errors['phone'] = "Số điện thoại không được để trống";
            }
            if (!empty($phone)) {
                if (!ctype_digit($phone)) {
                    $errors['phone'] = "Vui lòng nhập số điện thoại hợp lệ";
                } elseif (strlen($phone) != 10) {
                    $errors['phone'] = "Số điện thoại chỉ có 10 kí tự";
                }
            }

            if ($role === '') {
                $errors['role'] = "Vui lòng chọn Role";
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {

                $test = $this->modelUser->update(
                    $id,
                    $name,
                    $email,
                    $phone,
                    $role
                );
                // var_dump($test);die;
                header('Location: ' . BASE_URL . '?act=admin/tai-khoan');
                exit();
            } else {

                $_SESSION['flash'] = true;
                header('Location:' . BASE_URL . '?act=admin/form-sua-tai-khoan&id=' . $id);
            }
        }
    }

        public function formChangePass()
    {
        $id = $_GET['id'];
        $user = $this->modelUser->find($id);
        require_once './views/admin/accounts/changePass.php';
    }

    public function postChangePass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'];
            $password = $_POST['password'] ?? '';

            $user = $this->modelUser->find($id);

            $errors = [];
            if (empty($password)) {
                $errors['password'] = "Mật khẩu không được để trống";
            }

            $_SESSION['error'] = $errors;
            // var_dump($errors);die;
            if (empty($errors)) {

                $test = $this->modelUser->updatePass(
                    $id,
                    $password
                );
                // var_dump($test);die;
                header('Location: ' . BASE_URL . '?act=admin/tai-khoan');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header('Location:' . BASE_URL . '?act=admin/form-doi-mat-khau&id=' . $id);
            }
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->modelUser->delete($id);
        header('Location:' . BASE_URL . '?act=admin/tai-khoan');
    }
}
