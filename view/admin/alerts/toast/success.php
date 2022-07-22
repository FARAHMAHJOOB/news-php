<?php if (flash('toast-success') !== '') {  ?>
    <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
        <span class="alert-inner--text"><strong>موفق ! </strong><?= flash('toast-success')  ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php  }  ?>