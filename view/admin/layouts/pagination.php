<?php  if ($pageNumbers != null) {  ?>
    <div class="card-body">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mb-0">
                <?php foreach ($pageNumbers as $number) {  ?>
                    <li class="page-item"><a class="page-link" href="<?= $urlPage . '?page=' . $number ?>"><?= $number ?></a></li>
                <?php  }   ?>
            </ul>
        </nav>
    </div>
<?php }  ?>