<div class="container mt-3">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header bg-primary text-white text-uppercase text-center">
                    <i class="fa fa-star"></i> Sản phẩm đặc biệt
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($listhh_in_tc as $item) :
                            extract($item);
                            $img_path = '../uploaded/images/'.$hinh;
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='100' class='object-fit-contain'>";
                            } else {
                                $img = "no photo";
                            }
                        ?>
                        <div class="col-12 col-md-6 col-lg-3 mt-3 sanphams">'
                        <a href="index.php?act=chitietsp&ma_hh=<?php echo $ma_hh?>&ma_loai=<?= $ma_loai ?>">
                            <div class="card text-center product-card pb-2">
                                <div class="product-badge text-danger bg-warning">
                                    <?='-'. $giam_gia  . '%' ?>
                                </div>
                                <div class="product-thumb">
                                    <img class="card-img-top product-img object-fit-contain"
                                        src="<?= $img_path ?>" alt="Ảnh sản phẩm">
                                </div>
                                <div class="card-body p-0 pt-2 px-2">
                                    <h3 class="product-title mh-60">
                                            <?= $ten_hh ?>
                                    </h3>
                                    <div class="product-price">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <del class="d-block fz-14"><?= number_format($don_gia) ?>$</del>
                                            <p class="text-danger font-weight-bold fz-20 d-block ml-3 mb-0">
                                                <?= number_format($don_gia*(1-$giam_gia/100)) ?>$</p>
                                        </div>
                                    </div>
                                    <!-- <div class="col m-2">
                                        <a href="<?= $SITE_URL . "/cart/add-cart.php?id=" . $item['ma_hh'] ?>"
                                            class="btn btn-outline-primary btn-sm">Add to cart</a>
                                    </div> -->
                                    <div class="col m-2 hidden" >
                                        <form action="index.php?act=addtocart" method="POST">
                                            <input type="hidden" name="ma_hh" value="<?=$ma_hh ?>">
                                            <input type="hidden" name="ten_hh"value="<?=$ten_hh ?>">
                                            <input type="hidden" name="hinh" value="<?=$hinh ?>">
                                            <input type="hidden" name="don_gia" value="<?=$don_gia ?>">
                                            <input type="hidden" name="giam_gia" value="<?=$giam_gia ?>">
                                            <input type="submit" name="add" value="Add to cart"  class="btn btn-outline-primary btn-sm">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner ">
    <img src="<?= '../uploaded/img_slideshow/bn1.jpg' ?>" alt="">
</div>
