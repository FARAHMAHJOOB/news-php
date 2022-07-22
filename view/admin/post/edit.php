<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>
<div class="card shadow mt-4">
    <div class="card-header d-flex justify-content-between">
        <h2 class="mb-0">ویرایش خبر</h2>
        <a href="<?= url('admin/post')  ?>" class="btn btn-primary btn-sm">برگشت</a>
    </div>
    <div class="card-body">
        <form action="<?= url('admin/post/update/' . $post['id'] )  ?>" method="POST" id="form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">عنوان خبر</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="عنوان ..." value="<?= $post['title']  ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">خلاصه خبر</label>
                        <input type="text" class="form-control" name="summary" id="summary" placeholder="خلاصه ..." value="<?= $post['summary']  ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-label mb-2">تصویر</div>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input" name="example-file-input-custom">
                            <label class="custom-file-label">انتخاب تصویر</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">دسته بندی</label>
                        <select name="category_id" id="category_id" class="form-control custom-select" required>
                            <option value="">انتخاب کنید</option>
                            <?php foreach ($postCategories as $category) {  ?>
                                <option value="<?= $category['id']  ?>" <?=  $category['id'] == $post['category_id'] ? 'selected' : '';  ?>><?= $category['name']  ?></option>
                            <?php  }  ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="published_at">تاریخ انتشار</label>
                        <input type="text" name="published_at" id="published_at" class="form-control form-control-sm d-none" value="<?= $post['published_at']  ?>" required>
                        <input type="text" id="published_at_view" class="form-control" placeholder="تاریخ انتشار..." value="<?= $post['published_at']  ?>">
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="form-group mb-0">
                        <label class="form-label">توضیح خبر</label>
                        <textarea class="form-control" name="body" id="body" rows="2" placeholder="توضیحات" required><?= $post['body']  ?></textarea>
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
