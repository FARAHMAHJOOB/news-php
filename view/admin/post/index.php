<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>

<div class="row mt-4">
  <div class="col-12">
    <div class="card shadow">
      <div class="card-header bg-transparent border-0 d-flex justify-content-between">
        <h2 class=" mb-0">اخبار</h2>
        <a href="<?= url('admin/post/create')  ?>" class="btn btn-success btn-sm">خبر جدید</a>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-sm card-table table-center text-nowrap  align-items-center">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>عنوان</th>
              <th>خلاصه</th>
              <th>تعداد بازدید</th>
              <th>نویسنده</th>
              <th>دسته</th>
              <th>تصویر</th>
              <th>تاریخ انتشار</th>
              <th>خبر فوری</th>
              <th>انتخاب سردبیر</th>
              <th class="text-left">عملیات</th>
            </tr>
          </thead>
          <tbody>        
            <?php foreach ((array) $posts as $key => $post) {  ?>
              <tr>
                <td><?= $key += 1 ?></td>
                <td class="text-sm font-weight-600"><?= $post['title'] ?></td>
                <td><?= $post['summary'] ?> </td>
                <td><?= $post['view'] ?></td>
                <td class="text-nowrap"><?= $post['author'] ?></td>
                <td class=""><?= $post['category_name'] ?? '--' ?></td>
                <td class=""><img src="<?= asset($post['image']) ?? '--' ?>" alt="" width="90px" height="70px"></td>
                <td class=""><?= jalaliData($post['published_at']) ?? '--' ?></td>
                <td class=""><a href="<?= url('admin/post/breaking-news/' . $post['id'])  ?>" class="btn-icon-clipboard p-0"> <?= $post['breaking_news'] == 1 ? '<i class="fe fe-check-square text-success"></i>'  : '<i class="fe fe-x-square text-warning"></i>';  ?> </a> </td>
                <td class=""><a href="<?= url('admin/post/selected/' . $post['id'])  ?>" class="btn-icon-clipboard p-0"> <?= $post['selected'] == 1 ? '<i class="fe fe-check-square text-success"></i>'  : '<i class="fe fe-x-square text-warning"></i>';  ?> </a> </td>
                <td class="pr-2 text-left">
                  <a href="<?= url('admin/post/status/' . $post['id'])  ?>" class="btn btn-outline-success btn-sm mx-0"><?= $post['status'] == 1 ? 'فعال' : 'غیرفعال'; ?></a>
                  <a href="<?= url('admin/post/edit/' . $post['id'])  ?>" class="btn btn-outline-primary btn-sm mx-0">ویرایش</a>
                  <a href="<?= url('admin/post/delete/' . $post['id'])  ?>" class="btn btn-outline-warning btn-sm mx-0">حذف</a>

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