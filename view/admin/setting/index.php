<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>

<div class="row mt-4">
  <div class="col-12">
    <div class="card shadow">
      <div class="card-header bg-transparent border-0 d-flex justify-content-between">
        <h2 class=" mb-0">تنظیمات وب سایت</h2>
      </div>
      <div class="table-responsive">
        <table class="table table-hover card-table table-vcenter text-nowrap  align-items-center">
          <thead class="thead-light">
            <tr>
              <th>عنوان سایت</th>
              <th>توضیحات</th>
              <th>کلمات کلیدی</th>
              <th>لوگو</th>
              <th>آیکن</th>
              <th class="text-left">عملیات</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td class=""><?= $setting['title'] ?></td>
                <td><?= $setting['description']?? '--' ?> </td>
                <td><?= $setting['keywords']?? '--' ?> </td>
                <td class=""><img src="<?= asset($setting['logo']) ?? '--' ?>" alt="" width="70px" height="50px"></td>
                <td class=""><img src="<?= asset($setting['icon']) ?? '--' ?>" alt="" width="70px" height="50px"></td>
                <td class="pr-2 text-left">
                  <a href="<?= url('admin/setting/edit/' . $setting['id'])  ?>" class="btn btn-outline-primary btn-sm mx-0">ویرایش</a>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require_once(BASE_PATH . '/view/admin/layouts/master-bottom-section.php')   ?>