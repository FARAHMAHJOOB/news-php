<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>
<div class="row mt-4">
  <div class="col-12">
    <div class="card shadow">
      <div class="card-header bg-transparent border-0 d-flex justify-content-between">
        <h2 class=" mb-0">نظرات</h2>
      </div>
      <div class="table-responsive">
        <table class="table table-hover card-table table-vcenter text-nowrap  align-items-center">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>نظر </th>
              <th>نظر والد</th>
              <th>نویسنده</th>
              <th>زمان</th>
              <th class="text-left">عملیات</th>
            </tr>
          </thead>
          <tbody>

              <?php foreach ($comments as $key => $comment) {  ?>
                <tr class="py-0">
                  <td><?= $key += 1 ; echo $comment['seen'] == 0 ? '<span class="badge badge-pill badge-warning">جدید</span>' : ''; ?></td>
                  <td class="text-sm"><?= substr($comment['body'], 0, 40) . ' ...'  ?></td>
                  <td class="text-sm"><?= substr($comment['parentComment'], 0, 40) . ' ...'  ?></td>
                  <td><?= $comment['author'] ?? '--' ?> </td>
                  <td><?= jalaliData($comment['created_at']) ?? '--' ?> </td>
                  <td class="pr-2 text-left">
                    <a href="<?= url('admin/comment/status/' . $comment['id'])  ?>" class="btn btn-outline-success btn-sm mx-0"><?= $comment['status'] == 1 ? 'فعال' : 'غیرفعال'; ?></a>
                    <a href="<?= url('admin/comment/admin-answer/' . $comment['id'])  ?>" class="btn btn-outline-primary btn-sm mx-0">پاسخ</a>
                    <a href="<?= url('admin/comment/delete/' . $comment['id'])  ?>" class="btn btn-outline-warning btn-sm mx-0">حذف</a>
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