<?php
class HomeController
{
    public $modelProduct;
    public $modelCategory;
    public $modelUser;
    public $modelCMT;

    public function __construct()
    {
        $this->modelProduct = new Product();
        $this->modelCategory = new Category();
        $this->modelUser = new User();
        $this->modelCMT = new Comment();
    }

    public function home()
    {
        if (version_compare(PHP_VERSION, '1.0.0', '<')) {
            die('Yêu cầu PHP 8.0 trở lên');
        }

        $products = $this->modelProduct->productsLimit();
        $newProduct = $this->modelProduct->newProduct();
        $featuredProduct = $this->modelProduct->featured();
        require_once './views/user/index.php';
    }

    public function getAllProduct()
    {
        $products = $this->modelProduct->all();
        require_once './views/user/products.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $product = $this->modelProduct->find($id);
        $featuredProduct = $this->modelProduct->featured();
        $comments = $this->modelCMT->show($id,);
        require_once './views/user/detail.php';
    }

    public function postCMT()
    {
        
        $user_id = $_SESSION['user']['id'];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $content = $_POST['content'];
            $product_id  = $_POST['product_id'];
            $errors = [];
            if(empty($content)){
                $errors['content'] = "Vui lòng nhập nội dung";
            }
            $_SESSION['error'] = $errors;
            
            // var_dump($errors);die;
            if(empty($errors)){
                $test = $this->modelCMT->post($content, $user_id, $product_id);
                //  var_dump($test);die;
                unset($_SESSION['error']);
                header('Location:' . BASE_URL . '?act=san-pham&id=' . $product_id);
            }else{
                $_SESSION['flash'] = true;
                header('Location:' . BASE_URL . '?act=san-pham&id=' . $product_id);

            }
        }

    }

    public function formRegister()
    {
        require_once './views/user/register.php';
    }

    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $checkEmail = $this->modelUser->checkEmail($email);

            $errors = [];
            if (empty($name)) {
                $errors['name'] = "Vui lòng nhập tên";
            }
            if (empty($email)) {
                $errors['email'] = "Vui lòng nhập email";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "Vui lòng nhập đúng định dạng";
            }elseif(!$checkEmail){
                $errors['email'] = "Email đã tồn tại";
            }
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập mật khẩu";
            }
            $_SESSION['error'] = $errors;

            // var_dump($errors['email']);die;

            if(empty($errors))
            {
                $this->modelUser->register($name, $email, $password);
                unset($_SESSION['old']);
                unset($_SESSION['error']);
                header('Location:' . '?act=login');
                exit();
            }else{
                $_SESSION['old'] = $_POST;
                $_SESSION['flash'] = true;
                header('Location:' . '?act=register');
            }
        }
    }

    public function formLogin()
    {
        require_once './views/user/login.php';
        exit();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->modelUser->login($email,  $password);
            // var_dump($email);


            if ($user['email'] == $email) {
                $_SESSION['user'] = $user;
                // var_dump($_SESSION['user']);
                // die;
                header('Location:' . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header('Location:' . BASE_URL . '?act=login');
            }
        }
    }

    public function logout()
    {
        if ($_SESSION['user']) {
            unset($_SESSION['user']);
            header('Location:' . BASE_URL);
        }
    }
}
