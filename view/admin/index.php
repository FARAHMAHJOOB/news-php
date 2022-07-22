<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>

<div class="row mt-4">
  <div class="col-12 col-md-4">
    <a href="<?= url('admin/user') ?>" class="text-decoration-none">
      <div class="card text-white bg-default mb-3">
        <div class="card-header bg-default d-flex justify-content-between align-items-center"><span><i class="fas fa-users"></i> کاربران</span> <?= $userCount["COUNT(*)"] ?> <span class="badge badge-pill right"></span></div>
        <div class="card-body">
          <section class="d-flex justify-content-between align-items-center font-12">
            <span class=""><i class="fe fe-users"></i> مدیران <span class="badge badge-pill mx-1"> <?= $adminCount["COUNT(*)"] ?> </span></span>
            <span class=""><i class="fe fe-user"></i> همه کاربران <span class="badge badge-pill mx-1"> <?= $userCount["COUNT(*)"] + $adminCount["COUNT(*)"] ?> </span></span>
          </section>
        </div>
      </div>
    </a>
  </div>
  <div class="col-12 col-md-4">
    <a href="<?= url('admin/post') ?>" class="text-decoration-none">
      <div class="card text-white bg-primary mb-3">
        <div class="card-header bg-primary d-flex justify-content-between align-items-center"><span><i class="fas fa-newspaper"></i> اخبار</span> <?= $postCount["COUNT(*)"] ?> <span class="badge badge-pill right"></span></div>
        <div class="card-body">
          <section class="d-flex justify-content-between align-items-center">
            <span class=""><i class="fas fa-bolt"></i> بازدیدها <span class="badge badge-pill mx-1"> <?= $postsViews["SUM(view)"] ?> </span></span>
          </section>
        </div>
      </div>
    </a>
  </div>
  <div class="col-12 col-md-4">
    <a href="<?= url('admin/comment') ?>" class="text-decoration-none">
      <div class="card text-white bg-warning mb-3">
        <div class="card-header bg-warning d-flex justify-content-between align-items-center"><span><i class="fe fe-message-circle"></i> نظرات</span> <?= $commentCount["COUNT(*)"] ?> <span class="badge badge-pill right"></span></div>
        <div class="card-body">
          <section class="d-flex justify-content-between align-items-center font-12">
            <span class=""><i class="far fa-eye-slash"></i> نظرات خوانده نشده <span class="badge badge-pill mx-1"> <?= $commentUnseenCount["COUNT(*)"] ?> </span></span>
            <span class=""><i class="far fa-check-circle"></i> نظرات فعال <span class="badge badge-pill mx-1"> <?= $commentApprovedCount["COUNT(*)"] ?> </span></span>
          </section>
        </div>
      </div>
    </a>
  </div>
</div>
<div class="row mt-2">
  <div class="col-4">
    <h2 class="h6 pb-0 mb-0">
    اخبار پر بازدید
    </h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>عنوان</th>
            <th>بازدید</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($mostViewedPosts as $mostViewedPost) { ?>
            <tr>
              <td>
                <?= $mostViewedPost['id'] ?>
              </td>
              <td>
                <?= $mostViewedPost['title'] ?>
              </td>
              <td><span class="badge badge-secondary"> <?= $mostViewedPost['view'] ?></span></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-4">
    <h2 class="h6 pb-0 mb-0">
    اخبار پربحث
    </h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>عنوان</th>
            <th>نظرات</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($mostCommentedPosts as $mostCommentedPost) { ?>
            <tr>
              <td>
                <a class="text-primary" href="">
                  <?= $mostCommentedPost['id'] ?>
                </a>
              </td>
              <td>
                <?= $mostCommentedPost['title'] ?>
              </td>
              <td><span class="badge badge-success"><?= $mostCommentedPost['comment_count'] ?></span></td>
            </tr>

          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-4">
    <h2 class="h6 pb-0 mb-0">
      نظرات
    </h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>نام</th>
            <th>نظر </th>
            <th>وضعیت</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($lastComments as $lastComment) { ?>
            <tr>
              <td>
                <a class="text-primary" href="">
                  <?= $lastComment['id'] ?>
                </a>
              </td>
              <td>
                <?= $lastComment['author'] ?>
              </td>
              <td>
                <?= $lastComment['body'] ?>
              </td>
              <td><span class="badge badge-warning"> <?= $lastComment['status'] ?></span></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?php require_once(BASE_PATH . '/view/admin/layouts/master-bottom-section.php')   ?>