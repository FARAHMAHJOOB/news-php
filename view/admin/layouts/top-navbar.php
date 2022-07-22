<?php
use Auth\Auth;
 $logedUser = Auth::user();
?>
<nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container">
        <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>

        <a class="navbar-brand" href="index-hlf-2.html"> <img alt="..." class="navbar-brand-img main-logo" src="<?= asset('public/admin/img/brand/logo-dark.png') ?>">
        </a>

        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 ml-lg-auto">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fe fe-search"></i></span>
                    </div><input class="form-control" placeholder="جستجو ..." type="text">
                </div>
            </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center ">
            <li class="nav-item d-none d-md-flex">
                <div class="dropdown d-none d-md-flex mt-2 ">
                    <a class="nav-link full-screen-link pl-0 pr-0"><i class="fe fe-maximize-2 floating " id="fullscreen-button"></i></a>
                </div>
            </li>

            <li class="nav-item dropdown d-none d-md-flex">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link pl-0" data-toggle="dropdown" href="#" role="button">
                    <div class="media align-items-center">
                        <i class="fe fe-bell f-30 "></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
                    <a href="#" class="dropdown-item d-flex">
                        <div>
                            <strong>تعدادی از پست های شما پسندیده شد</strong>
                            <div class="small text-muted">5 ساعت قبل</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                        <div>
                            <strong> 3 دیدگاه جدید</strong>
                            <div class="small text-muted">3 ساعت قبل</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                        <div>
                            <strong> محصول شما شما ثبت شد</strong>
                            <div class="small text-muted">45 دقیقه قبل</div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center">مشاهده همه اعلان ها</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0" data-toggle="dropdown" href="#" role="button">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="<?= asset($logedUser['profile_photo_path'])  ?>"></span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 "><?= $logedUser['fullName'] ?? $logedUser['email']  ?></span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">خوش آمدید !</h6>
                    </div>
                    <a class="dropdown-item" href="user-profile.html"><i class="fe fe-user"></i> <span>پروفایل من</span></a>
                    <a class="dropdown-item" href="#"><i class="fe fe-settings"></i>
                        <span>تنظیمات</span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= url('logout')  ?>"><i class="fe fe-log-out"></i> <span>خروج</span></a>
                </div>
            </li>
        </ul>
    </div>
</nav>