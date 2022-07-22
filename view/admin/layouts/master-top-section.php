<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <?php require_once(BASE_PATH . '/view/admin/layouts/head-tag.php')   ?>
</head>


<body class="app sidebar-mini rtl">
    <div id="global-loader"></div>
    <div class="page">
        <div class="page-main">
            <!-- app-content-->
            <div class="app-content ">
                <div class="side-app">
                    <div class="main-content">
                        <div class="p-2 d-block d-sm-none navbar-sm-search">
                            <!-- Form -->
                            <form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div><input class="form-control" placeholder="جستجو ..." type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Top navbar -->
                        <?php require_once(BASE_PATH . '/view/admin/layouts/top-navbar.php')   ?>
                        <!-- Top navbar-->

                        <!--Horizontal-menu-->
                        <?php require_once(BASE_PATH . '/view/admin/layouts/top-menu.php')   ?>
                        <!--Horizontal-menu-->

                        <!-- Page content -->
                        <div class="container">
                            <?php require_once(BASE_PATH . '/view/admin/alerts/toast/error.php')   ?>
                            <?php require_once(BASE_PATH . '/view/admin/alerts/toast/success.php')   ?>
                            <!-- main content -->