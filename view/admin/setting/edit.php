<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>
<div class="card shadow mt-4">
    <div class="card-header d-flex justify-content-between">
        <h2 class="mb-0">ویرایش تنظیمات</h2>
        <a href="<?= url('admin/setting')  ?>" class="btn btn-primary btn-sm">برگشت</a>
    </div>
    <div class="card-body">
        <form action="<?= url('admin/setting/update/' . $setting['id'])  ?>" method="POST" id="form" enctype="multipart/form-data">
            <section class="row">
                <section class="col-12">
                    <div class="form-group mb-1">
                        <label for="title">عنوان سایت</label>
                        <input type="text" class="form-control form-control-sm" name="title" id="title" value="<?= old('title' , $setting['title'])  ?>">
                    </div>
                    <span role="alert" class="text-danger text-sm">
                        <?= flash('invalidInputs')['title'] ?? ''   ?>
                    </span>
                </section>
                <section class="col-12 my-2">
                    <div class="form-group mb-1">
                        <label for="description">توضیحات سایت</label>
                        <input type="text" class="form-control form-control-sm" name="description" id="description" value="<?= old('description',$setting['description']) ?>">
                    </div>
                    <span role="alert" class="text-danger text-sm">
                        <?= flash('invalidInputs')['description'] ?? ''   ?>
                    </span>
                </section>

                <section class="col-12 my-2">
                    <div class="form-group mb-1">
                        <label for="keywords">کلمات کلیدی سایت</label>
                        <input type="text" class="form-control form-control-sm" name="keywords" id="keywords" value="<?= old('keywords',$setting['keywords']) ?>">
                    </div>
                    <span role="alert" class="text-danger text-sm">
                        <?= flash('invalidInputs')['keywords'] ?? ''   ?>
                    </span>
                </section>
                <section class="col-12 col-md-6 my-2">
                    <div class="form-group mb-1">
                        <label for="logo">لوگو</label>
                        <input type="file" class="form-control form-control-sm" name="logo" id="logo">
                    </div>
                    <span role="alert" class="text-danger text-sm">
                        <?= flash('invalidInputs')['logo'] ?? ''   ?>
                    </span>
                </section>
                <section class="col-12 col-md-6 my-2">
                    <div class="form-group mb-1">
                        <label class="blue" for="icon">آیکون</label>
                        <input type="file" class="form-control form-control-sm" name="icon" id="icon">
                    </div>
                    <span role="alert" class="text-danger text-sm">
                        <?= flash('invalidInputs')['icon'] ?? ''   ?>
                    </span>
                </section>
                <div class="col-md-12 mt-4 text-left">
                    <button class="btn btn-sm btn-success">ثبت</button>
                </div>
            </section>
        </form>
    </div>
</div>ّ

<?php require_once(BASE_PATH . '/view/admin/layouts/master-bottom-section.php')   ?>