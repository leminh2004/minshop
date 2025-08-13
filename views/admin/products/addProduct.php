<?php include './views/admin/layout/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Thêm sản phẩm</h3>
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL . '?act=admin/them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" value="<?= $_SESSION['old']['name'] ?? '' ?>" placeholder="Tên sản phẩm">
                            <?php if (isset($_SESSION['error']['name'])) { ?>
                                <span class="text-danger"><?= $_SESSION['error']['name'] ?></span>
                            <?php } ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class=" row mb-3">
                            <div class="form-group col-md-6">
                                <label class="form-label">Giá sản phẩm</label>
                                <input type="number" class="form-control" name="price" value="<?= $_SESSION['old']['price'] ?? '' ?>" placeholder="Nhập giá sản phẩm">
                                <?php if (isset($_SESSION['error']['price'])) { ?>
                                    <span class="text-danger"><?= $_SESSION['error']['price'] ?></span>
                                <?php } ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label">Giá khuyến mãi</label>
                                <input type="number" class="form-control" name="discount" value="<?= $_SESSION['old']['discount'] ?? '' ?>" placeholder="Nhập giá khuyến mãi">
                                <?php if (isset($_SESSION['error']['discount'])) { ?>
                                    <span class="text-danger"><?= $_SESSION['error']['discount'] ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Danh mục</label>
                            <select class="form-control" name="category_id">
                                <option value="">Chọn danh mục</option>
                                <?php foreach ($listCategory as $cate) { ?>
                                    <option value="<?= $cate['id'] ?>"
                                        <?php if (!empty($_SESSION['old']['category_id']) && $_SESSION['old']['category_id'] == $cate['id']) echo 'selected'; ?>>
                                        <?= $cate['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?php if (isset($_SESSION['error']['category'])) { ?>
                                <span class="text-danger"><?= $_SESSION['error']['category'] ?></span>
                            <?php } ?>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-6">
                                <label class="form-label">Số lượng</label>
                                <input type="text" class="form-control" name="quantity" value="<?= $_SESSION['old']['quantity'] ?? '' ?>" placeholder="Nhập số lượng">
                                <?php if (isset($_SESSION['error']['quantity'])) { ?>
                                    <span class="text-danger"><?= $_SESSION['error']['quantity'] ?></span>
                                <?php } ?>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label">Ngày nhập</label>
                                <input type="date" class="form-control" value="<?= $_SESSION['old']['date'] ?? '' ?>" name="date">
                                <?php if (isset($_SESSION['error']['date'])) { ?>
                                    <span class="text-danger"><?= $_SESSION['error']['date'] ?></span>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="description" rows="5"><?= $_SESSION['old']['description'] ?? '' ?></textarea>
                            <?php if (isset($_SESSION['error']['description'])) { ?>
                                <span class="text-danger"><?= $_SESSION['error']['description'] ?></span>
                            <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                        <a href="<?= BASE_URL . '?act=admin/san-pham' ?>" class="btn btn-secondary">Quản lý sản phẩm</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>