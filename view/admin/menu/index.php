<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>

<div class="row mt-4">
  <div class="col-12">
    <div class="card shadow">
      <div class="card-header bg-transparent border-0 d-flex justify-content-between">
        <h2 class=" mb-0">منوها</h2>
        <a href="<?= url('admin/menu/create')  ?>" class="btn btn-success btn-sm">منو جدید</a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover card-table table-vcenter text-nowrap  align-items-center">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>نام منو</th>
              <th>آدرس url</th>
              <th>منو والد</th>
              <th class="text-left">عملیات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ((array) $menus as $key=>$menu) {  ?>
              <tr>
              <td><?= $key+=1 ?></td>
                <td class="text-sm font-weight-600"><?= $menu['name'] ?></td>
                <td><?= $menu['url']?? '--' ?> </td>
                <td class=""><?= $menu['parent_name'] ?? 'اصلی ' ?></td>
                <td class="pr-2 text-left">
                  <a href="<?= url('admin/menu/status/' . $menu['id'])  ?>" class="btn btn-outline-success btn-sm mx-0"><?= $menu['status'] == 1 ? 'فعال' : 'غیرفعال'; ?></a>
                  <a href="<?= url('admin/menu/edit/' . $menu['id'])  ?>" class="btn btn-outline-primary btn-sm mx-0">ویرایش</a>
                  <a href="<?= url('admin/menu/delete/' . $menu['id'])  ?>" class="btn btn-outline-warning btn-sm mx-0">حذف</a>
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