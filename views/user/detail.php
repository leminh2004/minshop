<!-- Header -->
<?php include './views/user/layouts/header.php'; ?>

<!-- Navbar -->
<?php include './views/user/layouts/navbar.php'; ?>

<!-- Main -->
<main>
    <div class="container my-5">
        <div class="row">
            <!-- Ảnh sản phẩm -->
            <div class="col-md-6">
                <img src="<?= BASE_URL . $product['image'] ?>" class="img-fluid w-100" alt="<?= $product['name'] ?>">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-6">
                <!-- Tên sản phẩm -->
                <h2><?= $product['name'] ?></h2>

                <!-- Lượt xem -->
                <p class="text-muted">Lượt xem: <?= $product['views'] ?? 0 ?></p>

                <!-- Giá sản phẩm -->
                <div class="mb-3">
                    <?php if (!empty($product['discount']) && $product['discount'] < $product['price']) { ?>
                        <span class="text-danger h4"><?= formatPrice($product['discount']) ?></span>
                        <span class="text-muted"><del><?= formatPrice($product['price']) ?></del></span>
                    <?php } else { ?>
                        <span class="text-danger h4"><?= formatPrice($product['price']) ?></span>
                    <?php } ?>
                </div>

                <!-- Nút hành động -->
                <div class="d-flex">
                    <!-- Nút thêm vào giỏ hàng -->
                    <button class="btn btn-outline-primary me-3 d-flex align-items-center px-4 py-2">
                        <i class="bi bi-cart-plus me-2"></i> Thêm Vào Giỏ Hàng
                    </button>
                </div>
            </div>
        </div>

        <!-- Chi tiết sản phẩm -->
        <div class="mt-5">
            <h4>Chi tiết sản phẩm</h4>
            <p><?= nl2br($product['description']) ?? "Chưa có mô tả chi tiết" ?></p>
        </div>

        <!-- Bình luận -->
        <div class="mt-5">
            <h4>Bình luận</h4>
            <form method="post" action="">
                <div class="mb-3">
                    <textarea class="form-control" name="comment" rows="3" placeholder="Nhập bình luận của bạn..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
            </form>

            <div class="mt-4">
                <?php if (!empty($comments)) { ?>
                    <?php foreach ($comments as $cmt) { ?>
                        <div class="border p-2 mb-2">
                            <strong><?= $cmt['user'] ?></strong> <br>
                            <span><?= $cmt['content'] ?></span>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-muted">Chưa có bình luận nào.</p>
                <?php } ?>
            </div>
        </div>

        <!-- Sản phẩm hot gần đây -->
        <div class="mt-5">
            <h4>Sản phẩm hot gần đây</h4>
            <div class="row">
                <?php foreach ($featuredProduct as $pro) { ?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-product mb-60 border p-2">
                            <div class="product-img text-center">
                                <img src="<?= $pro['image'] ?>" class="img-fluid" alt="">
                            </div>
                            <div class="product-caption text-center mt-2">
                                <h5><a href="<?= BASE_URL . '?act=products&id=' . $pro['id'] ?>"><?= $pro['name'] ?></a></h5>
                                <div class="price">
                                    <?php if (!empty($pro['discount']) && $pro['discount'] < $pro['price']) { ?>
                                        <span class="text-danger"><?= formatPrice($pro['discount']) ?></span>
                                        <span class="text-muted"><del><?= formatPrice($pro['price']) ?></del></span>
                                    <?php } else { ?>
                                        <span class="text-danger"><?= formatPrice($pro['price']) ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</main>

<!-- Footer -->
<?php include './views/user/layouts/footer.php'; ?>