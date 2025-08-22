<?php include './views/admin/layout/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Đổi mật khẩu tài khoản #<?=$user['email']?></h3>
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL . '?act=admin/doi-mat-khau&id=' . $user['id'] ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$user['id']?>">
                        <div class="form-group mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới">
                            <?php if (isset($_SESSION['error']['password'])) { ?>
                                <span class="text-danger"><?= $_SESSION['error']['password'] ?></span>
                            <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                        <a href="<?= BASE_URL . '?act=admin/tai-khoan' ?>" class="btn btn-secondary">Quản lý tài khoản</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>