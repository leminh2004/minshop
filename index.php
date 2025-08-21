<?php
session_start();
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Controllers - Require toàn bộ file Controllers
// Admin
require_once './controllers/admin/AdminProductController.php';
require_once './controllers/admin/AdminCategoryController.php';
require_once './controllers/admin/AdminUserController.php';

// User
require_once './controllers/user/HomeController.php';

// Models - Require toàn bộ file 
// Admin
require_once './models/admin/AdminProduct.php';
require_once './models/admin/AdminCategory.php';
require_once './models/admin/AdminUser.php';


// User
require_once './models/user/Product.php';
require_once './models/user/Category.php';
require_once './models/user/User.php';
require_once './models/user/Comment.php';

// Route
$act = $_GET['act'] ?? '/';

// Nếu đã login thì chặn truy cập lại login/register
if ((isset($_GET['act']) && ($_GET['act'] == 'login' || $_GET['act'] == 'register'))
    && isset($_SESSION['user'])) {
    header("Location: " . BASE_URL);
    exit();
}

if (isset($_GET['act']) && strpos($_GET['act'], 'admin') === 0) {
    if (!isset($_SESSION['user'])) {
        // chưa đăng nhập thì về login
        header("Location: " . BASE_URL . "?act=login");
        exit();
    } else {
        // đã đăng nhập thì kiểm tra role (chỉ role 0 và 1 mới vào được admin)
        if ($_SESSION['user']['role'] != 0 && $_SESSION['user']['role'] != 1) {
            header("Location: " . BASE_URL);
            exit();
        }
    }
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // User - trang chủ
    '/' => (new HomeController())->Home(),
    'danh-sach-san-pham' => (new HomeController())->getAllProduct(),
    'san-pham' => (new HomeController())->detail(),

    // Bình luận
    'post-comment' => (new HomeController())->postCMT(),

    // Register
    'register' => (new HomeController())->formRegister(),
    'check-register' => (new HomeController())->postRegister(),

    // Login user
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),

    // Logout user
    'logout' => (new HomeController())->logout(),
    //Admin
    'admin' => require_once "./views/admin/layout/index.php",

    // Danh mục Admin
    'admin/danh-muc' => (new AdminCategoryController())->show(),
    'admin/form-them-danh-muc' => (new AdminCategoryController())->formAddCategory(),
    'admin/them-danh-muc' => (new AdminCategoryController())->postCategory(),
    'admin/form-sua-danh-muc' => (new AdminCategoryController())->editCate(),
    'admin/sua-danh-muc' => (new AdminCategoryController())->postEditCate(),
    'admin/xoa-danh-muc' => (new AdminCategoryController())->delete(),

    // Sản phẩm Admin
    'admin/san-pham' => (new AdminProductController())->show(),
    'admin/chi-tiet-san-pham' => (new AdminProductController())->detailProduct(),
    'admin/form-them-san-pham' => (new AdminProductController())->formAddProduct(),
    'admin/them-san-pham' => (new AdminProductController())->postProduct(),
    'admin/form-sua-san-pham' => (new AdminProductController())->formEditProduct(),
    'admin/sua-san-pham' => (new AdminProductController())->postEditProduct(),
    'admin/xoa-san-pham' => (new AdminProductController())->delete(),

    // Tài khoản admin
    'admin/tai-khoan' => (new AdminUserController())->show(),
    'admin/form-them-tai-khoan' => (new AdminUserController())->formAddUser(),
    'admin/them-tai-khoan' => (new AdminUserController())->postUser(),
    'admin/form-sua-tai-khoan' => (new AdminUserController())->formEditUser(),
    'admin/sua-tai-khoan' => (new AdminUserController())->postEditUser(),
    'admin/form-doi-mat-khau' => (new AdminUserController())->formChangePass(),
    'admin/doi-mat-khau' => (new AdminUserController())->postChangePass(),
    'admin/xoa-tai-khoan' => (new AdminUserController())->delete(),
};
