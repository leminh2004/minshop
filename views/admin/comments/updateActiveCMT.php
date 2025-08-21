<?php include './views/admin/layout/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Sửa trạng thái bình luận #<?=$cmt['id']?></h3>
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL . '?act=admin/sua-binh-luan&id=' . $cmt['id']?>" method="POST">
                        <div class="form-group mb-3">
                            <input type="hidden" name="id" value="<?=$cmt['id']?>">
                            <label class="form-label">Active</label>
                            <select class="form-control" name="active" >
                                    <option value="" >Chọn Role</option>
                                    <option value="1" <?= $cmt['active'] == 1 ? 'selected' : '' ?>>Hiện</option>
                                    <option value="2" <?= $cmt['active'] == 2 ? 'selected' : '' ?>>Ẩn</option>
                            </select>
                            <?php if (isset($_SESSION['error']['role'])) { ?>
                                <span class="text-danger"><?= $_SESSION['error']['role'] ?></span>
                            <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa trạng thái</button>
                        <a href="<?= BASE_URL . '?act=admin/binh-luan' ?>" class="btn btn-secondary">Quản lý bình luận</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>