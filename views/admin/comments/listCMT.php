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

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Content</th>
                                        <th>Username</th>
                                        <th>Product ID</th>
                                        <th>Active</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comments as $cmt): ?>
                                        <tr>
                                            <td><?= $cmt['id'] ?> </td>
                                            <td class="text-truncate" style="max-width: 300px;"><?= $cmt['content'] ?> </td>
                                            <td><?= $cmt['user_name'] ?> </td>
                                            <td><?= $cmt['product_id'] ?> </td>
                                            <td>
                                                <?php if ($cmt['active'] == 1): ?>
                                                    <span class="badge bg-success">Đã Hiện</span>
                                                <?php elseif ($cmt['active'] == 2): ?>
                                                    <span class="badge bg-secondary">Đã Ẩn</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="d-flex gap-1 justify-content-center">
                                                <a href="<?= BASE_URL . '?act=admin/chi-tiet-binh-luan&id=' . $cmt['id'] ?> ">
                                                    <button class="btn btn-success"><i class="far fa-eye"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL . '?act=admin/form-sua-binh-luan&id=' . $cmt['id'] ?>">
                                                    <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Content</th>
                                        <th>Username</th>
                                        <th>Product ID</th>
                                        <th>Active</th>
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