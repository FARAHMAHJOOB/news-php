<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>

<div class="row mt-4">
  <div class="col-12">
    <div class="card shadow">
      <div class="card-header bg-transparent border-0 d-flex justify-content-between">
        <h2 class=" mb-0">مدیران</h2>
        <a href="<?= url('admin/manager/create')  ?>" class="btn btn-success btn-sm">مدیر جدید</a>

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
            <?php foreach ($managers as $key => $manager) {  ?>
              <tr class="py-0">
                <td><?= $key += 1 ?></td>
                <td class="text-sm font-weight-600"><?= $manager['name'] ?></td>
                <td><?= $manager['email'] ?? '--' ?> </td>
                <td class="pr-2 text-left">
                  <a href="<?= url('admin/manager/status/' . $manager['id'])  ?>" class="btn btn-outline-success btn-sm mx-0"><?= $manager['status'] == 1 ? 'فعال' : 'غیرفعال'; ?></a>
                  <a href="<?= url('admin/manager/change-type/' . $manager['id'])  ?>" class="btn btn-outline-primary btn-sm mx-0"><?= $manager['user_type'] == 1 ? 'حذف از مدیران': 'افزودن به مدیران'; ?></a>
                  <a href="<?= url('admin/manager/delete/' . $manager['id'])  ?>" class="btn btn-outline-warning btn-sm mx-0">حذف</a>
                </td>
              </tr>
            <?php   }  ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require_once(BASE_PATH . '/view/admin/layouts/master-bottom-section.php')   ?>