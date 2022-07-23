<?php require_once(BASE_PATH . '/view/admin/layouts/master-top-section.php')   ?>
<div class="card shadow mt-4">
    <div class="card-header d-flex justify-content-between">
        <h2 class="mb-0">پاسخ مدیر به نظر</h2>
        <a href="<?= url('admin/comment')  ?>" class="btn btn-primary btn-sm">برگشت</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <?= $comment['body'] ?>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= url('admin/comment/admin-answer-store/' . $comment['id'])  ?>" method="POST" id="form">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">پاسخ شما</label>
                        <textarea class="form-control" name="body" id="body" placeholder="پاسخ"><?=  old('body')  ?></textarea>
                        <span role="alert" class="text-danger text-sm">
                            <?= flash('invalidInputs')['body'] ?? ''   ?>
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