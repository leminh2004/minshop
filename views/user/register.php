<!-- Header -->
<?php include './views/user/layouts/header.php'; ?>

<!-- Navbar -->
<?php include './views/user/layouts/navbar.php'; ?>

<!-- Register -->
<section class="login_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Đăng ký thành viên mới</h3>
                        <form class="row contact_form" action="<?= BASE_URL . '?act=check-register' ?>" method="post">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="name" value="<?=$_SESSION['old']['name'] ?? ''?>"
                                    placeholder="Name">
                                <?php if (isset($_SESSION['error']['name'])) {?>
                                    <span class="text-danger"><?= $_SESSION['error']['name'] ?></span>
                                <?php } ?>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" name="email" value="<?=$_SESSION['old']['email'] ?? ''?>"
                                    placeholder="Email">
                                <?php if (isset($_SESSION['error']['email'])){ ?>
                                    <span class="text-danger"><?= $_SESSION['error']['email'] ?></span>
                                <?php }; ?>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" name="password"
                                    placeholder="Password">
                                <?php if (isset($_SESSION['error']['password'])){ ?>
                                    <span class="text-danger"><?= $_SESSION['error']['password'] ?></span>
                                <?php } ?>

                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3" >
                                    Đăng ký
                                </button>
                                <div class="col-md-12 form-group">
                                    <a href="<?= BASE_URL . '?act=login' ?>" class="text-primary">Bạn đã có tài khoản?</a>
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