<!DOCTYPE html>
<html lang="fa" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title></title>
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="<?= asset('public/app/css/linearicons.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/nice-select.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/main.css') ?>">
</head>

<body>
    <header>

        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
                        <ul>
                            <li><a href="tel:+440 012 3654 896"><span class="lnr lnr-phone-handset"></span><span>+440 012 3654 896</span></a></li>
                            <li><a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span><span>support@colorlib.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                        <a href="index.html">
                            <img class="img-fluid" src="img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                        <img class="img-fluid" src="img/banner-ad.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container main-menu" id="main-menu">
            <div class="row align-items-center justify-content-between">
                <nav id="nav-menu-container d-flex">
                    <?php foreach ($menus as $menu) { ?>
                        <?php if (!empty($menu['childs'])) { ?>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="<?= $menu['url'] ?>" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $menu['name'] ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php foreach ($menu['childs'] as $menuChild) { ?>
                                        <a class="dropdown-item" href="<?= $menuChild['url'] ?>"><?= $menuChild['name'] ?></a>
                                    <?php   }  ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <a class="btn btn-secondary" href="<?= $menu['url'] ?>" role="button">
                                <?= $menu['name'] ?>
                            </a>
                    <?php }
                    }  ?>
                </nav>
                <!-- #nav-menu-container -->
                <div class="navbar-right">
                    <form class="Search">
                        <input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="جستجو">
                        <label for="Search-box" class="Search-box-label">
                            <span class="lnr lnr-magnifier"></span>
                        </label>
                        <span class="Search-close">
                            <span class="lnr lnr-cross"></span>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </header>