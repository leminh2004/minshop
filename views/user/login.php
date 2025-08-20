<!-- Header -->
<?php include './views/user/layouts/header.php'; ?>

<!-- Navbar -->
<?php include './views/user/layouts/navbar.php'; ?>

<!-- Main -->

<!--================login_part Area =================-->
<section class="login_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Chào mừng trở lại<br>
                            Vui lòng đăng nhập ngay</h3>
                        <form class="row contact_form" action="<?=BASE_URL . '?act=check-login' ?>" method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="email" value=""
                                    placeholder="Username">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value=""
                                    placeholder="Password">
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                   Đăng nhập
                                </button>
                                <div class="col-md-12 form-group">
                                    <a href="<?=BASE_URL. '?act=register'?>" class="text-primary">Bạn chưa có tài khoản?</a>
                                    <a class="lost_pass" href="#">forget password?</a>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->

<!-- Footer -->
<?php include './views/user/layouts/footer.php'; ?>