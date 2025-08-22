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
                    <h1>Quản lý tài khoản</h1>
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
                            <a href="<?= BASE_URL . '?act=admin/form-them-tai-khoan' ?>" class="btn btn-primary">Thêm tài khoản</a>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>STT</th>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $user): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td class="text-truncate" style="max-width: 200px;"><?= $user['email']; ?></td>
                                            <td><?= $user['name'] ?> </td>
                                            <td>
                                                <?php if ($user['role'] == 0): ?>
                                                    Quản trị viên cấp cao
                                                <?php elseif ($user['role'] == 1): ?>
                                                    Quản trị viên
                                                <?php else: ?>
                                                    Người dùng
                                                <?php endif; ?></td>
                                            <td class="d-flex gap-1 justify-content-center">
                                                <!-- if 1 -->
                                                <?php if ($_SESSION['user']['role'] == 0): ?>
                                                    <a href="<?= BASE_URL . '?act=admin/form-sua-tai-khoan&id=' . $user['id'] ?>">
                                                        <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                                                    </a>
                                                    <a href="<?= BASE_URL . '?act=admin/form-doi-mat-khau&id=' . $user['id'] ?>">
                                                        <button class="btn btn-warning"><i class="fas fa-key mr-1"></i></button>
                                                    </a>
                                                    <a href="<?= BASE_URL . '?act=admin/xoa-tai-khoan&id=' . $user['id'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm không?')">
                                                        <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </a>
                                                <?php elseif ($_SESSION['user']['role'] == 1): ?>

                                                    <?php if ($user['role'] == 0 || $user['role'] == 1): ?>
                                                        
                                                        <?php if ($user['email'] != $_SESSION['user']['email']): ?>
                                                            <a href="<?= BASE_URL . '?act=admin/form-sua-tai-khoan&id=' . $user['id'] ?>" style="pointer-events: none; opacity: 0.6;">
                                                                <button class="btn btn-warning" disabled><i class="fas fa-cogs"></i></button>
                                                            </a>
                                                            <a href="<?= BASE_URL . '?act=admin/form-doi-mat-khau&id=' . $user['id'] ?>" style="pointer-events: none; opacity: 0.6;">
                                                                <button class="btn btn-warning" disabled><i class="fas fa-key mr-1"></i></button>
                                                            </a>
                                                            <a href="<?= BASE_URL . '?act=admin/xoa-tai-khoan&id=' . $user['id'] ?>" style="pointer-events: none; opacity: 0.6;">
                                                                <button class="btn btn-danger" disabled><i class="far fa-trash-alt"></i></button>
                                                            </a>
                                                        <?php elseif($_SESSION['user']['name'] == $user['name']): ?>
                                                            <a href="<?= BASE_URL . '?act=admin/form-sua-tai-khoan&id=' . $user['id'] ?>">
                                                                <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                                                            </a>
                                                            <a href="<?= BASE_URL . '?act=admin/form-doi-mat-khau&id=' . $user['id'] ?>">
                                                                <button class="btn btn-warning"><i class="fas fa-key mr-1"></i></button>
                                                            </a>
                                                            <a href="<?= BASE_URL . '?act=admin/xoa-tai-khoan&id=' . $user['id'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm không?')">
                                                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php elseif($user['role'] == 2): ?>
                                                        <a href="<?= BASE_URL . '?act=admin/form-sua-tai-khoan&id=' . $user['id'] ?>">
                                                            <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                                                        </a>
                                                        <a href="<?= BASE_URL . '?act=admin/form-doi-mat-khau&id=' . $user['id'] ?>">
                                                            <button class="btn btn-warning"><i class="fas fa-key mr-1"></i></button>
                                                        </a>
                                                        <a href="<?= BASE_URL . '?act=admin/xoa-tai-khoan&id=' . $user['id'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm không?')">
                                                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                            </table>
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