<?php require_once(BASE_PATH . '/view/auth/layouts/master-top-section.php')   ?>
<section class="row mt-5">
    <section class="login-wrapper border-primary-tm bg-light mx-auto col-10 col-md-3 text-right py-5">
        <section class="login-title mx-2">ثبت نام</section>
        <span role="alert" class="text-danger text-sm">
            <?= flash('registerErrors') ?? ''   ?>
        </span>
        <form method="post" action="<?= url('register') ?>">
            <div class="login-input-text mx-2 mb-4">
                <input class="border rounded text-right px-2" type="text" name="email" placeholder="ایمیل" required>
                <span role="alert" class="text-danger text-sm">
                    <?= flash('invalidInputs')['email'] ?? ''   ?>
                </span>

            </div>

            <div class="login-input-text mx-2 mb-4">
                <input class="border rounded text-right px-2" type="password" name="password" placeholder="رمز عبور" required>
                <span role="alert" class="text-danger text-sm">
                    <?= flash('invalidInputs')['password'] ?? ''   ?>
                </span>
            </div>
            
            <div class="login-input-text mx-2 mb-4">
                <input class="border rounded text-right px-2" type="password" name="confirm-password" placeholder="تکرار رمز عبور" required>
                <span role="alert" class="text-danger text-sm">
                    <?= flash('invalidInputs')['confirm-password'] ?? ''   ?>
                </span>
            </div>

            <section class="login-btn d-grid g-2 text-center"><button class="btn btn-primary py-2 px-3 w-75">تایید</button>
            </section>
        </form>
        <div class="text-center p-t-136">
            <a class="txt2" href="<?=  url('login-form')  ?>">
                ورود به حساب کاربری
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>
    </section>
</section>
<?php require_once(BASE_PATH . '/view/auth/layouts/master-buttom-section.php')   ?>