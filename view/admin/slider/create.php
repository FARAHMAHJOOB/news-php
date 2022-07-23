<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>
<div class="card shadow mt-4">
    <div class="card-header d-flex justify-content-between">
        <h2 class="mb-0">اسلاید جدید</h2>
        <a href="<?= url('admin/slider')  ?>" class="btn btn-primary btn-sm">برگشت</a>
    </div>
    <div class="card-body">
        <form action="<?= url('admin/slider/store')  ?>" method="POST" id="form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-label mb-2">تصویر</div>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input" name="example-file-input-custom">
                            <label class="custom-file-label">انتخاب تصویر</label>
                            <span role="alert" class="text-danger text-sm">
                                <?= flash('invalidInputs')['image'] ?? ''   ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">آدرس url</label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="آدرس url" value="<?= old('url')  ?>">
                        <span role="alert" class="text-danger text-sm">
                            <?= flash('invalidInputs')['url'] ?? ''   ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-12 mt-4 text-left">
                    <button class="btn btn-sm btn-success">ثبت</button>
                </div>
            </div>
        </form>
    </div>
</div>ّ

<?php require_once(BASE_PATH . '/view/admin/layouts/master-bottom-section.php')   ?>