<!-- Header -->
<?php include './views/admin/layout/header.php'; ?>
<!-- End header -->

<!-- Navbar -->
<?php include './views/admin/layout/navbar.php'; ?>
<!-- End navbar -->

<!-- Sidebar -->
<?php include './views/admin/layout/sidebar.php'; ?>
<!-- End sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý bình luận</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card shadow-lg border-0 rounded-3 mb-4">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"><i class="fas fa-comment-dots me-2"></i>Chi tiết bình luận</h5>

                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="fw-bold"><i class="fas fa-user me-2"></i>Người bình luận: </label>
                                    <span><?= $cmt['user_name'] ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold"><i class="fas fa-box me-2"></i>Product ID: </label>
                                    <span><a href="<?= BASE_URL . '?act=san-pham&id=' . $cmt['product_id'] ?>"><?=$cmt['product_id'] ?></a></span>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold"><i class="fas fa-align-left me-2"></i>Nội dung:</label>
                                    <p class="border rounded p-2 bg-light"> <?= nl2br($cmt['content']) ?></p>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold"><i class="fas fa-toggle-on me-2"></i>Trạng thái: </label>
                                    <?php if ($cmt['active'] == 1): ?>
                                        <span class="badge bg-success">Đã Hiện</span>
                                    <?php elseif ($cmt['active'] == 2): ?>
                                        <span class="badge bg-secondary">Đã Ẩn</span>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold"><i class="fas fa-clock me-2"></i>Ngày tạo:</label>
                                    <span><?= date('d/m/Y H:i', strtotime($cmt['date'])) ?></span>
                                </div>
                                <a href="<?= BASE_URL . '?act=admin/binh-luan' ?>" class="btn btn-light">
                                    <i class="fas fa-arrow-left me-1"></i> Quay lại
                                </a>
                                <a href="<?= BASE_URL . '?act=admin/form-sua-binh-luan&id=' . $cmt['id'] ?>" class="btn btn-warning"> Sửa trạng thái</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/admin/layout/footer.php'; ?>
<!-- End Footer -->

<!-- Page specific script -->
</body>

</html>