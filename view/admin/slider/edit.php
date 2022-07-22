<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>
<div class="card shadow mt-4">
    <div class="card-header d-flex justify-content-between">
        <h2 class="mb-0">ویرایش دسته بندی</h2>
        <a href="<?= url('admin/postCategory')  ?>" class="btn btn-primary btn-sm">برگشت</a>
    </div>
    <div class="card-body">
        <form action="<?= url('admin/postCategory/update/' . $postCategory['id'])  ?>" method="POST" id="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">نام دسته بندی</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?= $postCategory['name']  ?>" required>
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
                        <label class="form-label">دسته والد</label>
                        <select name="parent_id" id="parent_id" class="form-control custom-select" required>
                            <option value="">دسته اصلی</option>
                           <?php foreach($postCategories as $category) {  ?>
                            <option value="<?= $category['id']  ?>" <?=  $category['id'] == $postCategory['parent_id'] ? 'selected' : '';  ?> ><?= $category['name']  ?></option>
                           <?php  }  ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tags">تگ ها</label>
                        <input type="hidden" class="form-control" name="tags" id="tags" value="<?= $postCategory['tags']  ?>" required>
                        <select class="select2 form-control form-control-sm col-12 " id="select_tags" multiple>
                        </select>
                    </div>
                    <span class="text-danger">
                        <strong>
                        </strong>
                    </span>
                </div>
                <div class="col-md-12 ">
                    <div class="form-group mb-0">
                        <label class="form-label">توضیحات</label>
                        <textarea class="form-control" name="description" id="description" rows="2" placeholder="توضیحات"><?= $postCategory['description']  ?></textarea>
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