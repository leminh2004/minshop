<?php include './views/admin/layout/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Thêm tài khoản</h3>
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL . '?act=admin/them-tai-khoan' ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= $_SESSION['old']['name'] ?? '' ?>" placeholder="Tên người dùng">
                            <?php if (isset($_SESSION['error']['name'])) { ?>
                                <span class="text-danger"><?= $_SESSION['error']['name'] ?></span>
                            <?php } ?>
                        </div>
                        <div class=" row mb-3">
                            <div class="form-group col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $_SESSION['old']['email'] ?? '' ?>" placeholder="Nhập email">
                                <?php if (isset($_SESSION['error']['email'])) { ?>
                                    <span class="text-danger"><?= $_SESSION['error']['email'] ?></span>
                                <?php } ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" value="<?= $_SESSION['old']['phone'] ?? '' ?>" placeholder="Nhập số điện thoại">
                                <?php if (isset($_SESSION['error']['phone'])) { ?>
                                    <span class="text-danger"><?= $_SESSION['error']['phone'] ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-control" name="role" >
                                <?php if ($_SESSION['user']['role'] == 0): ?>
                                    <option value="" >Chọn Role</option>
                                    <option value="0" <?= isset($_SESSION['old']['role']) && ($_SESSION['old']['role']) == 0 ? 'selected' : '' ?>>Quản trị viên cấp cao</option>
                                    <option value="1" <?= isset($_SESSION['old']['role']) && ($_SESSION['old']['role']) == 1 ? 'selected' : '' ?>>Quản trị viên</option>
                                    <option value="2" <?= isset($_SESSION['old']['role']) && ($_SESSION['old']['role']) == 2 ? 'selected' : '' ?>>Người dùng</option>
                                <?php else: ?>
                                    <option value="">Chọn Role</option>
                                    <option value="2" <?= isset($_SESSION['old']['role']) && ($_SESSION['old']['role']) == 2 ? 'selected' : '' ?>>Người dùng</option>
                                <?php endif; ?>
                            </select>
                            <?php if (isset($_SESSION['error']['role'])) { ?>
                                <span class="text-danger"><?= $_SESSION['error']['role'] ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password"  placeholder="Nhập mật khẩu">
                            <?php if (isset($_SESSION['error']['password'])) { ?>
                                <span class="text-danger"><?= $_SESSION['error']['password'] ?></span>
                            <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm tài khoản</button>
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