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
                    <h1>Chi tiết sản phẩm <?= $product['name'] ?></h1>
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

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <!-- Ảnh sản phẩm -->
                                <div class="col-md-4">
                                    <img src="<?= $product['image'] ?>" width="200px" height="300px" alt="Tên sản phẩm" class="img-fluid rounded shadow">
                                </div>

                                <!-- Thông tin sản phẩm -->
                                <div class="col-md-7">
                                    <h1 class="mb-3"><?= $product['name'] ?></h1>
                                    <p>Giá sản phẩm: <?= $product['price'] ?></p>
                                    <p>Giá khuyến mã: <?= $product['discount'] ?></p>
                                    <p>Danh mục: <?= $product['cate_name'] ?></p>
                                    <p>Số lượng: <?= $product['quantity'] ?></p>
                                    <p>Ngày nhập: <?= $product['date'] ?></p>

                                    <a href="<?= BASE_URL . '?act=admin/form-sua-san-pham&id=' . $product['id'] ?>">
                                        <button class="btn btn-warning btn-lg">Sửa</button>
                                    </a>
                                    <a href="<?= BASE_URL . '?act=admin/xoa-san-pham&id=' . $product['id'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm không?')">
                                        <button class="btn btn-danger btn-lg">Xóa</button>
                                    </a>
                                    <a href="<?= BASE_URL . '?act=admin/san-pham' ?>" class="btn btn-outline-secondary btn-lg">Quay lại</a>
                                </div>
                            </div>

                            <!-- Mô tả chi tiết hơn -->
                            <div class="mt-5">
                                <h3>Mô tả chi tiết</h3>
                                <p>
                                    <?= nl2br($product['description']) ?>
                                </p>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>