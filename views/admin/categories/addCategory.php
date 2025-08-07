<?php include './views/admin/layout/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Thêm danh mục</h3>
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL . '?act=admin/them-danh-muc'?>" method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                        <a href="<?= BASE_URL . '?act=admin/san-pham'?>" class="btn btn-secondary">Quản lý danh mục</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>