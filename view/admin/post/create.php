<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>
<div class="card shadow mt-4">
    <div class="card-header d-flex justify-content-between">
        <h2 class="mb-0">خبر جدید</h2>
        <a href="<?= url('admin/post')  ?>" class="btn btn-primary btn-sm">برگشت</a>
    </div>
    <div class="card-body">
        <form action="<?= url('admin/post/store')  ?>" method="POST" id="form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">عنوان خبر</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="عنوان ...">
                        <span role="alert" class="text-danger text-sm">
                            <?= flash('invalidInputs')['title'] ?? ''   ?>
                        </span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="published_at">تاریخ انتشار</label>
                        <input type="text" name="published_at" id="published_at" class="form-control form-control-sm d-none" value="">
                        <input type="text" id="published_at_view" class="form-control" value="" placeholder="تاریخ انتشار...">
                        <span role="alert" class="text-danger text-sm">
                            <?= flash('invalidInputs')['published_at'] ?? ''   ?>
                        </span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">خلاصه خبر</label>
                        <input type="text" class="form-control" name="summary" id="summary" placeholder="خلاصه ...">
                        <span role="alert" class="text-danger text-sm">
                            <?= flash('invalidInputs')['summary'] ?? ''   ?>
                        </span>
                    </div>

                </div>
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
                        <label class="form-label">دسته بندی</label>
                        <select name="category_id" id="category_id" class="form-control custom-select">
                            <option value="">انتخاب کنید</option>
                            <?php foreach ($postCategories as $category) {  ?>
                                <option value="<?= $category['id']  ?>"><?= $category['name']  ?></option>
                            <?php  }  ?>
                        </select>
                        <span role="alert" class="text-danger text-sm">
                            <?= flash('invalidInputs')['category_id'] ?? ''   ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="form-group mb-0">
                        <label class="form-label">توضیح خبر</label>
                        <textarea class="form-control" name="body" id="body" rows="2" placeholder="توضیحات"></textarea>
                        <span role="alert" class="text-danger text-sm">
                            <?= flash('invalidInputs')['body'] ?? ''   ?>
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