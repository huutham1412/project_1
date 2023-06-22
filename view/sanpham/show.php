 <!-- Body -->

 <div class="container">
     <div class="row">
         <div class="col">
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                     <li class="breadcrumb-item"><a href="index.php?act=sanpham">Sản phẩm</a></li>
                 </ol>
             </nav>
         </div>
     </div>
 </div>
 <div class="container">
     <div class="row">
         <div class="col-12 col-sm-3">
             <div class="bg-light mb-3">
                 <!-- Danh mục -->
                 <div>
                     <?php require "layout/danhmuc.php"; ?>
                     <?php require "layout/top10.php"; ?>
                 </div>
             </div>

         </div>
         <!-- Sản phẩm -->
         <div class="col">
             <h5 class="alert-secondary pt-3 pb-3 pl-sm-4 shadow-sm text-center ">Sản phẩm nổi bật</h5>

             <div class="row">
                 <?php foreach ($items as $item) :
                        extract($item);
                        $img_path = '../uploaded/images/'.$hinh;
                        if ($don_gia > 0) {
                            $percent_discount = number_format($giam_gia / $don_gia * 100);
                        } else {
                            $percent_discount = 0;
                        }

                    ?>
                 <div class="col-12 col-md-6 col-lg-3 mt-3">'
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
                                            <del class="d-block fz-14"><?= number_format($don_gia, 0, ',') ?>$</del>
                                            <p class="text-danger font-weight-bold fz-20 d-block ml-3 mb-0">
                                                <?= number_format($don_gia - $giam_gia, 0, ',') ?>$</p>
                                        </div>
                                    </div>
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