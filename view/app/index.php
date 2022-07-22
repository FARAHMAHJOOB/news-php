<?php
require_once BASE_PATH . '/view/app/layouts/header.php';
?>


<div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
                <div class="container no-padding">
                        <div class="row small-gutters">
                                <div class="col-lg-8 top-post-left">
                                        <?php if (isset($topSelectedPosts[0])) { ?>
                                                <div class="feature-image-thumb relative">
                                                        <div class="overlay overlay-bg"></div>
                                                        <img class="img-fluid" src="<?= asset($topSelectedPosts[0]['image']) ?>" alt="">
                                                </div>
                                                <div class="top-post-details">
                                                        <ul class="tags">
                                                                <li><a href="#"><?= $topSelectedPosts[0]['category'] ?></a></li>
                                                        </ul>
                                                        <a href="image-post.html">
                                                                <h3><?= $topSelectedPosts[0]['title'] ?></h3>
                                                        </a>
                                                        <ul class="meta">
                                                                <li><a href="#"><span class="lnr lnr-user"></span><?= $topSelectedPosts[0]['name'] ?></a></li>
                                                                <li><a href="#"><?= jalaliData($topSelectedPosts[0]['created_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                                                <li><a href="#"><?= $topSelectedPosts[0]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                                        </ul>
                                                </div>
                                </div>
                        <?php }
                        ?>
                        <div class="col-lg-4 top-post-right">
                                <?php if (isset($topSelectedPosts[1])) { ?>
                                        <div class="single-top-post">
                                                <div class="feature-image-thumb relative">
                                                        <div class="overlay overlay-bg"></div>
                                                        <img class="img-fluid" src="<?= asset($topSelectedPosts[1]['image']) ?>" alt="">
                                                </div>
                                                <div class="top-post-details">
                                                        <ul class="tags">
                                                                <li><a href="#"><?= $topSelectedPosts[1]['category'] ?></a></li>
                                                        </ul>
                                                        <a href="image-post.html">
                                                                <h4><?= $topSelectedPosts[1]['title'] ?></h4>
                                                        </a>
                                                        <ul class="meta">
                                                                <li><a href="#"><span class="lnr lnr-user"></span><?= $topSelectedPosts[1]['name'] ?></a></li>
                                                                <li><a href="#"><?= jalaliData($topSelectedPosts[1]['created_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                                                <li><a href="#"><?= $topSelectedPosts[1]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                                        </ul>
                                                </div>
                                        </div>
                                <?php }
                                if (isset($topSelectedPosts[2])) {
                                ?>
                                        <div class="single-top-post mt-10">
                                                <div class="feature-image-thumb relative">
                                                        <div class="overlay overlay-bg"></div>
                                                        <img class="img-fluid" src="<?= asset($topSelectedPosts[2]['image']) ?>" alt="">
                                                </div>
                                                <div class="top-post-details">
                                                        <ul class="tags">
                                                                <li><a href="#"><?= $topSelectedPosts[2]['category'] ?></a></li>
                                                        </ul>
                                                        <a href="image-post.html">
                                                                <h4><?= $topSelectedPosts[2]['title'] ?></h4>
                                                        </a>
                                                        <ul class="meta">
                                                                <li><a href="#"><span class="lnr lnr-user"></span><?= $topSelectedPosts[2]['name'] ?></a></li>
                                                                <li><a href="#"><?= jalaliData($topSelectedPosts[2]['created_at']) ?><span class="lnr lnr-calendar-full"></span></a></li>
                                                                <li><a href="#"><?= $topSelectedPosts[2]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                                        </ul>
                                                </div>
                                        </div>
                                <?php
                                } ?>
                        </div>
                        <div class="col-lg-12">
                                <div class="news-tracker-wrap">
                                        <h6><span>خبر فوری:</span> <a href="#">مربی تیم ایران اخراج شد</a></h6>
                                </div>
                        </div>
                        </div>
                </div>
        </section>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
                <div class="container no-padding">
                        <div class="row">
                                <div class="col-lg-8 post-list">
                                        <!-- Start latest-post Area -->
                                        <div class="latest-post-wrap">
                                                <h4 class="cat-title">آخرین اخبار</h4>
                                                <div class="single-latest-post row align-items-center">
                                                        <div class="col-lg-5 post-left">
                                                                <div class="feature-img relative">
                                                                        <div class="overlay overlay-bg"></div>
                                                                        <img class="img-fluid" src="img/l1.jpg" alt="">
                                                                </div>
                                                                <ul class="tags">
                                                                        <li><a href="#">دسته بندی</a></li>
                                                                </ul>
                                                        </div>
                                                        <div class="col-lg-7 post-right">
                                                                <a href="image-post.html">
                                                                        <h4>عنوان</h4>
                                                                </a>
                                                                <ul class="meta">
                                                                        <li><a href="#"><span class="lnr lnr-user"></span>ادمین</a></li>
                                                                        <li><a href="#">۱۳۳۹/۲/۴<span class="lnr lnr-calendar-full"></span></a></li>
                                                                        <li><a href="#"> ۵<span class="lnr lnr-bubble"></span></a></li>
                                                                </ul>
                                                                <p class="excert">
                                                                        خلاصه متن خبر
                                                                </p>
                                                        </div>
                                                </div>
                                                <div class="single-latest-post row align-items-center">
                                                        <div class="col-lg-5 post-left">
                                                                <div class="feature-img relative">
                                                                        <div class="overlay overlay-bg"></div>
                                                                        <img class="img-fluid" src="img/l1.jpg" alt="">
                                                                </div>
                                                                <ul class="tags">
                                                                        <li><a href="#">دسته بندی</a></li>
                                                                </ul>
                                                        </div>
                                                        <div class="col-lg-7 post-right">
                                                                <a href="image-post.html">
                                                                        <h4>عنوان</h4>
                                                                </a>
                                                                <ul class="meta">
                                                                        <li><a href="#"><span class="lnr lnr-user"></span>ادمین</a></li>
                                                                        <li><a href="#">۱۳۳۹/۲/۴<span class="lnr lnr-calendar-full"></span></a></li>
                                                                        <li><a href="#"> ۵<span class="lnr lnr-bubble"></span></a></li>
                                                                </ul>
                                                                <p class="excert">
                                                                        خلاصه متن خبر
                                                                </p>
                                                        </div>
                                                </div>
                                                <div class="single-latest-post row align-items-center">
                                                        <div class="col-lg-5 post-left">
                                                                <div class="feature-img relative">
                                                                        <div class="overlay overlay-bg"></div>
                                                                        <img class="img-fluid" src="img/l1.jpg" alt="">
                                                                </div>
                                                                <ul class="tags">
                                                                        <li><a href="#">دسته بندی</a></li>
                                                                </ul>
                                                        </div>
                                                        <div class="col-lg-7 post-right">
                                                                <a href="image-post.html">
                                                                        <h4>عنوان</h4>
                                                                </a>
                                                                <ul class="meta">
                                                                        <li><a href="#"><span class="lnr lnr-user"></span>ادمین</a></li>
                                                                        <li><a href="#">۱۳۳۹/۲/۴<span class="lnr lnr-calendar-full"></span></a></li>
                                                                        <li><a href="#"> ۵<span class="lnr lnr-bubble"></span></a></li>
                                                                </ul>
                                                                <p class="excert">
                                                                        خلاصه متن خبر
                                                                </p>
                                                        </div>
                                                </div>
                                                <div class="single-latest-post row align-items-center">
                                                        <div class="col-lg-5 post-left">
                                                                <div class="feature-img relative">
                                                                        <div class="overlay overlay-bg"></div>
                                                                        <img class="img-fluid" src="img/l1.jpg" alt="">
                                                                </div>
                                                                <ul class="tags">
                                                                        <li><a href="#">دسته بندی</a></li>
                                                                </ul>
                                                        </div>
                                                        <div class="col-lg-7 post-right">
                                                                <a href="image-post.html">
                                                                        <h4>عنوان</h4>
                                                                </a>
                                                                <ul class="meta">
                                                                        <li><a href="#"><span class="lnr lnr-user"></span>ادمین</a></li>
                                                                        <li><a href="#">۱۳۳۹/۲/۴<span class="lnr lnr-calendar-full"></span></a></li>
                                                                        <li><a href="#"> ۵<span class="lnr lnr-bubble"></span></a></li>
                                                                </ul>
                                                                <p class="excert">
                                                                        خلاصه متن خبر
                                                                </p>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- End latest-post Area -->

                                        <!-- Start banner-ads Area -->
                                        <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                                                <img class="img-fluid" src="img/banner-ad.jpg" alt="">
                                        </div>
                                        <!-- End banner-ads Area -->
                                        <!-- Start popular-post Area -->
                                        <div class="popular-post-wrap">
                                                <h4 class="title">اخبار پربازدید</h4>
                                                <div class="feature-post relative">
                                                        <div class="feature-img relative">
                                                                <div class="overlay overlay-bg"></div>
                                                                <img class="img-fluid" src="img/f1.jpg" alt="">
                                                        </div>
                                                        <div class="details">
                                                                <ul class="tags">
                                                                        <li><a href="#">دسته بندی</a></li>
                                                                </ul>
                                                                <a href="image-post.html">
                                                                        <h3>عنوان</h3>
                                                                </a>
                                                                <ul class="meta">
                                                                        <li><a href="#"><span class="lnr lnr-user"></span>ادمین</a></li>
                                                                        <li><a href="#">۱۳۳۹/۲/۴<span class="lnr lnr-calendar-full"></span></a></li>
                                                                        <li><a href="#">۷<span class="lnr lnr-bubble"></span></a></li>
                                                                </ul>
                                                        </div>
                                                </div>
                                                <div class="row mt-20 medium-gutters">
                                                        <div class="col-lg-6 single-popular-post">
                                                                <div class="feature-img-wrap relative">
                                                                        <div class="feature-img relative">
                                                                                <div class="overlay overlay-bg"></div>
                                                                                <img class="img-fluid" src="img/f2.jpg" alt="">
                                                                        </div>
                                                                        <ul class="tags">
                                                                                <li><a href="#">دسته بندی</a></li>
                                                                        </ul>
                                                                </div>
                                                                <div class="details">
                                                                        <a href="image-post.html">
                                                                                <h4>عنوان</h4>
                                                                        </a>
                                                                        <ul class="meta">
                                                                                <li><a href="#"><span class="lnr lnr-user"></span>ادمین</a></li>
                                                                                <li><a href="#">۱۳۳۹/۲/۴<span class="lnr lnr-calendar-full"></span></a></li>
                                                                                <li><a href="#"> ۵<span class="lnr lnr-bubble"></span></a></li>
                                                                        </ul>
                                                                        <p class="excert">
                                                                                خلاصه متن خبر
                                                                        </p>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-6 single-popular-post">
                                                                <div class="feature-img-wrap relative">
                                                                        <div class="feature-img relative">
                                                                                <div class="overlay overlay-bg"></div>
                                                                                <img class="img-fluid" src="img/f3.jpg" alt="">
                                                                        </div>
                                                                        <ul class="tags">
                                                                                <li><a href="#">دسته بندی</a></li>
                                                                        </ul>
                                                                </div>
                                                                <div class="details">
                                                                        <a href="image-post.html">
                                                                                <h4>عنوان</h4>
                                                                        </a>
                                                                        <ul class="meta">
                                                                                <li><a href="#"><span class="lnr lnr-user"></span>ادمین</a></li>
                                                                                <li><a href="#">۱۳۳۹/۲/۴<span class="lnr lnr-calendar-full"></span></a></li>
                                                                                <li><a href="#">۷<span class="lnr lnr-bubble"></span></a></li>
                                                                        </ul>
                                                                        <p class="excert">
                                                                                خلاصه متن خبر
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- End popular-post Area -->
                                </div>

                                <?php
                                require_once BASE_PATH . '/view/app/layouts/sidebar.php';
                                ?>
                        </div>
                </div>
        </section>
        <!-- End latest-post Area -->
</div>


<?php
require_once BASE_PATH . '/view/app/layouts/footer.php';
?>