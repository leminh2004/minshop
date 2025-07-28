<?php
class HomeController
{
    public function home()
    {
        if (version_compare(PHP_VERSION, '1.0.0', '<')) {
            die('Yêu cầu PHP 8.0 trở lên');
        }
        echo "Đây là trang chủ";
    }
}
