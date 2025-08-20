<!-- Header -->
<?php include './views/user/layouts/header.php'; ?>

<!-- Navbar -->
<?php include './views/user/layouts/navbar.php'; ?>

<!-- Main -->
<main>
    <!-- Bắt đầu khu vực Sản phẩm mới -->
    <section class="latest-product-area padding-bottom">
        <div class="container">
            <div class="row product-btn d-flex justify-content-end align-items-end">
                <!-- Section Tittle -->
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="section-tittle mb-10">
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-7">
                    <div class="properties__button f-right">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tất cả</a>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                </div>
            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <?php foreach ($products as $pro) { ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img src="<?= $pro['image'] ?>" alt="">
                                        <div class="new-product">

                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <h4><a href="<?=BASE_URL . '?act=san-pham&id=' . $pro['id']?>"><?= $pro['name'] ?></a></h4>
                                        <div class="price">
                                            <ul>
                                                <li><?= formatPrice($pro['price']) ?></li>
                                                <li class="discount"><?= formatPrice($pro['discount']) ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <!-- End Nav Card -->
        </div>
    </section>
    <!-- Kết thúc khu vực Sản phẩm mới -->
</main>

<!-- Footer -->
<?php include './views/user/layouts/footer.php'; ?>