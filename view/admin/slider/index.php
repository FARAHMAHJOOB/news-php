<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>

<div class="row mt-4">
  <div class="col-12">
    <div class="card shadow">
      <div class="card-header bg-transparent border-0 d-flex justify-content-between">
        <h2 class=" mb-0">اسلایدر</h2>
        <a href="<?= url('admin/slider/create')  ?>" class="btn btn-success btn-sm">اسلاید جدید</a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover card-table table-vcenter text-nowrap  align-items-center">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>تصویر</th>
              <th>آدرس url</th>
              <th class="text-left">عملیات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sliders as $key=>$slider) {  ?>
              <tr>
                <td><?= $key+=1 ?></td>
                <td class=""><img src="<?= asset($slider['image']) ?? '--' ?>" alt="" width="70px" height="50px"></td>
                <td class="text-nowrap"><?= $slider['url'] ?? '--' ?></td>
                <td class="pr-2 text-left">
                  <a href="<?= url('admin/slider/status/' . $slider['id'])  ?>" class="btn btn-outline-success btn-sm mx-0"><?= $slider['status'] == 1 ? 'فعال' : 'غیرفعال'; ?></a>
                  <a href="<?= url('admin/slider/delete/' . $slider['id'])  ?>" class="btn btn-outline-warning btn-sm mx-0">حذف</a>
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