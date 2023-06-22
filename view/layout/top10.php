<div class="card mt-3">
    <div class="card-header bg-primary text-white text-uppercase" role="tab" id="headingTwo">
        <h6 class="mb-0">
            <a class="text-white d-block collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                aria-controls="collapseTwo">
                <i class="fas fa-heart text-danger"></i> Top 10 yêu thích
            </a>
        </h6>
    </div>
    <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo">
        <ul class="list-group category_block">
            <?php foreach ($top10 as $hh) : ?>
                
            <li class="list-group-item px-2 py-3">
                <a class="d-flex align-items-center"
                href="index.php?act=chitietsp&ma_hh=<?= $hh['ma_hh'] ?>&ma_loai=<?= $hh['ma_loai'] ?>">
                    <div class="">
                        <img src="<?php echo '../uploaded/images/'.$hh["hinh"]?>" style="width:50px;height:50px">
                    </div>
                    <span class="ml-2 d-blocke"><?= $hh['ten_hh'] ?></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>