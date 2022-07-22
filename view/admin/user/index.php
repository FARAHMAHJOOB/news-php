<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>

<div class="row mt-4">
  <div class="col-12">
    <div class="card shadow">
      <div class="card-header bg-transparent border-0 d-flex justify-content-between">
        <h2 class=" mb-0">کاربران</h2>
      </div>
      <div class="table-responsive">
        <table class="table table-hover card-table table-vcenter text-nowrap  align-items-center">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>نام </th>
              <th>ایمیل</th>
              <th class="text-left">عملیات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $key => $user) {  ?>
              <tr class="py-0">
                <td><?= $key += 1 ?></td>
                <td class="text-sm font-weight-600"><?= $user['name'] ?></td>
                <td><?= $user['email'] ?? '--' ?> </td>
                <td class="pr-2 text-left">
                  <a href="<?= url('admin/user/status/' . $user['id'])  ?>" class="btn btn-outline-success btn-sm mx-0"><?= $user['status'] == 1 ? 'فعال' : 'غیرفعال'; ?></a>
                  <a href="<?= url('admin/user/change-type/' . $user['id'])  ?>" class="btn btn-outline-primary btn-sm mx-0"><?= $user['user_type'] == 1 ? 'مدیر': 'افزودن به مدیران'; ?></a>
                  <a href="<?= url('admin/user/delete/' . $user['id'])  ?>" class="btn btn-outline-warning btn-sm mx-0">حذف</a>
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