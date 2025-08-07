<?php include './views/admin/layout/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Thêm sản phẩm</h3>
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL . '?act=admin/them-san-pham' ?>" method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                        </div>
                        <!-- <div class="form-group mb-3">
                            <label for="image" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control" name="image">
                        </div> -->
                        <div class=" row mb-3">
                            <div class="form-group col-md-6">
                                <label class="form-label">Giá sản phẩm</label>
                                <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label">Giá khuyến mãi</label>
                                <input type="text" class="form-control" name="discount" placeholder="Nhập giá khuyến mãi">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Danh mục</label>
                            <select class="form-control" name="category_id">
                                <option value="">Chọn danh mục</option>
                                <?php foreach ($listCategory as $cate) { ?>
                                    <option value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-6">
                                <label class="form-label">Số lượng</label>
                                <input type="text" class="form-control" name="quantity" placeholder="Nhập số lượng">
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label">Ngày nhập</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="description" rows="5"></textarea>
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