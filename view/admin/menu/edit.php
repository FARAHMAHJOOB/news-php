<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>
<div class="card shadow mt-4">
    <div class="card-header d-flex justify-content-between">
        <h2 class="mb-0"> ویرایش منو</h2>
        <a href="<?= url('admin/menu')  ?>" class="btn btn-primary btn-sm">برگشت</a>
    </div>
    <div class="card-body">
        <form action="<?= url('admin/menu/update/' . $menu['id'])  ?>" method="POST" id="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">نام </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="نام ..." value="<?=  $menu['name'] ?>">
                        <span role="alert" class="text-danger text-sm">
                            <?= flash('invalidInputs')['name'] ?? ''   ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">آدرس url </label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="آدرس ..." value="<?=  $menu['url'] ?>">
                        <span role="alert" class="text-danger text-sm">
                            <?= flash('invalidInputs')['url'] ?? ''   ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">منو والد</label>
                        <select name="parent_id" id="parent_id" class="form-control custom-select">
                            <option value="">دسته اصلی</option>
                            <?php foreach ($parentMenus as $pMenu) {  ?>
                                <option value="<?= $pMenu['id'] ?>" <?=  $pMenu['id'] == $menu['parent_id'] ? 'selected' : '';  ?> ><?= $pMenu['name'] ?></option>
                            <?php  }  ?>
                        </select>
                        <span role="alert" class="text-danger text-sm">
                            <?= flash('invalidInputs')['parent_id'] ?? ''   ?>
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