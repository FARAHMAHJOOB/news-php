<?php if (flash('toast-error') !== '') {  ?>
    <div class="mt-2 alert alert-warning alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-thumbs-down"></i></span>
        <span class="alert-inner--text"><strong>ناموفق! </strong><?= flash('toast-error')  ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
<?php  }  ?>