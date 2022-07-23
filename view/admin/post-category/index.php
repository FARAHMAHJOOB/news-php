<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>

<div class="row mt-4">
  <div class="col-12">
    <div class="card shadow">
      <div class="card-header bg-transparent border-0 d-flex justify-content-between">
        <h2 class=" mb-0">دسته بندی ها</h2>
        <a href="<?= url('admin/postCategory/create')  ?>" class="btn btn-success btn-sm">دسته جدید</a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover card-table table-vcenter text-nowrap  align-items-center">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>نام دسته</th>
              <th>توضیحات</th>
              <th>تصویر</th>
              <th>تگ ها</th>
              <th>دسته والد</th>
              <th class="text-left">عملیات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ((array) $postCategories as $key=>$category) {  ?>
              <tr>
              <td><?= $key+=1 ?></td>
                <td class="text-sm font-weight-600"><?= $category['name'] ?></td>
                <td><?= $category['description']?? '--' ?> </td>
                <td class=""><img src="<?= asset($category['image']) ?? '--' ?>" alt="" width="70px" height="50px"></td>

                <td class="text-nowrap"><?= $category['tags'] ?></td>
                <td class=""><?= $category['parent_name'] ?? 'اصلی ' ?></td>
                <td class="pr-2 text-left">
                  <a href="<?= url('admin/postCategory/status/' . $category['id'])  ?>" class="btn btn-outline-success btn-sm mx-0"><?= $category['status'] == 1 ? 'فعال' : 'غیرفعال'; ?></a>
                  <a href="<?= url('admin/postCategory/edit/' . $category['id'])  ?>" class="btn btn-outline-primary btn-sm mx-0">ویرایش</a>
                  <a href="<?= url('admin/postCategory/delete/' . $category['id'])  ?>" class="btn btn-outline-warning btn-sm mx-0">حذف</a>
                </td>
              </tr>
            <?php   }  ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require_once(BASE_PATH . '/view/admin/layouts/pagination.php')   ?>
<?php require_once(BASE_PATH . '/view/admin/layouts/master-bottom-section.php')   ?>