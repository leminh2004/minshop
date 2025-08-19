<!-- Header -->
<?php include './views/user/layouts/header.php'; ?>

<!-- Navbar -->
<?php include './views/user/layouts/navbar.php'; ?>

<!-- Main -->
<main>
    <!-- slider Area Start -->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height" data-background="./assets/user/assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                            <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                <img src="./assets/user/assets/img/hero/hero_man.png" alt="">
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                            <div class="hero__caption">
                                <span data-animation="fadeInRight" data-delay=".4s">Sale 60%</span>
                                <h1 data-animation="fadeInRight" data-delay=".6s">Winter <br> Collection</h1>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                    <a href="" class="btn hero-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height" data-background="./assets/user/assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                            <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                <img src="./assets/user/assets/img/hero/hero_man.png" alt="">
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                            <div class="hero__caption">
                                <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span>
                                <h1 data-animation="fadeInRight" data-delay=".6s">Winter <br> Collection</h1>
                                <p data-animation="fadeInRight" data-delay=".8s">Best Cloth Collection By 2020!</p>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                    <a href="industries.html" class="btn hero-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Bắt đầu khu vực Danh mục-->
    <section class="category-area section-padding30">
        <div class="container-fluid">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-85">
                        <h2>Mua sắm theo danh mục</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="single-category mb-30">
                        <div class="category-img">
                            <img src="./assets/user/assets/img/categori/cat1.jpg" alt="">
                            <div class="category-caption">
                                <h2>Owmen`s</h2>
                                <span class="best"><a href="#">Best New Deals</a></span>
                                <span class="collection">New Collection</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="single-category mb-30">
                        <div class="category-img text-center">
                            <img src="./assets/user/assets/img/categori/cat2.jpg" alt="">
                            <div class="category-caption">
                                <span class="collection">Discount!</span>
                                <h2>Winter Cloth</h2>
                                <p>New Collection</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="single-category mb-30">
                        <div class="category-img">
                            <img src="./assets/user/assets/img/categori/cat3.jpg" alt="">
                            <div class="category-caption">
                                <h2>Man`s Cloth</h2>
                                <span class="best"><a href="#">Best New Deals</a></span>
                                <span class="collection">New Collection</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kết thúc khu vực Danh mục-->

    <!-- Bắt đầu khu vực Sản phẩm mới -->
    <section class="latest-product-area padding-bottom">
        <div class="container">
            <div class="row product-btn d-flex justify-content-end align-items-end">
                <!-- Section Tittle -->
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="section-tittle mb-10">
                        <h2>Sản phẩm mới</h2>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-7">
                    <div class="properties__button f-right">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tất cả</a>
                                <a class="nav-item nav-link" id="nav-new-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Mới nhất</a>
                                <a class="nav-item nav-link" id="nav-Featured-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Nổi bật</a>
                            </div>
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

                <!-- Card two -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-new-tab">
                    <div class="row">
                        <?php foreach ($newProduct as $pro) { ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img src="<?= $pro['image'] ?>" alt="">
                                        <div class="new-product">
                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <h4><a href="#"><?= $pro['name'] ?></a></h4>
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

                <!-- Card three -->
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-Featured-tab">
                    <div class="row">
                        <?php foreach ($featuredProduct as $pro) { ?>
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

    <!-- Shop Method Start-->
    <div class="shop-method-area section-padding30">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40 text-center">
                        <i class="ti-package"></i>
                        <h6>Miễn phí vận chuyển</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40 text-center">
                        <i class="ti-unlock"></i>
                        <h6>Hệ thống thanh toán an toàn</h6>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40 text-center">
                        <i class="ti-reload"></i>
                        <h6>Secure Payment System</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->

    <!-- Gallery Start-->
    <div class="gallery-wrapper lf-padding">
        <div class="gallery-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="gallery-items">
                        <img src="./assets/user/assets/img/gallery/gallery1.jpg" alt="">
                    </div>
                    <div class="gallery-items">
                        <img src="./assets/user/assets/img/gallery/gallery2.jpg" alt="">
                    </div>
                    <div class="gallery-items">
                        <img src="./assets/user/assets/img/gallery/gallery3.jpg" alt="">
                    </div>
                    <div class="gallery-items">
                        <img src="./assets/user/assets/img/gallery/gallery4.jpg" alt="">
                    </div>
                    <div class="gallery-items">
                        <img src="./assets/user/assets/img/gallery/gallery5.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End-->
</main>

<!-- Footer -->
<?php include './views/user/layouts/footer.php'; ?>