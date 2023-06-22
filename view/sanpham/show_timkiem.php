 <!-- Body -->

 <div class="container">
     <div class="row">
         <div class="col">
             <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= $ROOT_URL ?>">Trang chủ</a></li>
                     <li class="breadcrumb-item"><a href="<?= $SITE_URL . '/hang-hoa/liet-ke.php' ?>">Sản phẩm</a></li>
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
            <?php
                extract($items);
            ?>
             <h5 class="alert-secondary pt-3 pb-3 pl-sm-4 shadow-sm text-center ">Các sản phẩm chứa từ khóa: <?= '"'.$kyw.'"'?></h5>

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
                                    <div class="col m-2">
                                        <a href="<?= $SITE_URL . "/cart/add-cart.php?id=" . $item['ma_hh'] ?>"
                                            class="btn btn-outline-primary btn-sm">Add to cart</a>
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