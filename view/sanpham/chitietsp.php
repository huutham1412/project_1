<!-- Product-detail -->

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="index.php?act=sanpham">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <!-- Image -->
        <?php 
            extract($hang);
        ?>
        <div class="col-12 col-lg-6">
            <div>
                <div class="card-body text-center">
                    <a href="#" class="chitiet" >
                        <!-- Ảnh sản phẩm -->
                        <img src="<?php echo '../uploaded/images/'.$hinh?>"style="width:400px;height:420px;" >
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body text-center">
                    <h4 class="card-title"><?= $ten_hh ?></h4>
                    <!-- Giá sản phẩm -->
                    <?php
                    if ($don_gia > 0) {
                        $percent_discount = number_format($giam_gia / $don_gia * 100);
                    } else {
                        $percent_discount = 0;
                    }
                    ?>
                    <div class="product-price h4">
                        <div class="col d-flex justify-content-center align-items-center">
                            <del class="d-block"><?= number_format($don_gia, 0, ',') ?>$</del>
                            <p class="text-danger font-weight-bold d-block ml-3 mb-0">
                                <?= number_format($don_gia - $giam_gia, 0, ',') ?>$</p>
                        </div>
                    </div>

                    <!-- <p class="price_discounted">149.90 $</p> -->
                   
                   
                    <div class="product_info">
                        <p>* Miễn phí giao hàng trên toàn quốc *</p>
                        <p>* Tặng voucher trị giá 500.000đ *</p>
                        <p>* Bảo hành 12 tháng *</p>
                    </div>
                    <div class="reviews_product p-3 mb-2 ">
                    
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        
                    </div>
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br />Giao hàng nhanh</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br />Bảo mật
                            </li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br />0987.654.321
                            </li>
                        </ul>
                    </div>
                    <form method="POST" action="index.php?act=addtocart">
                        <input type="hidden" name="ma_hh" value="<?=$ma_hh ?>">
                        <input type="hidden" name="ten_hh"value="<?=$ten_hh ?>">
                        <input type="hidden" name="hinh" value="<?=$hinh ?>">
                        <input type="hidden" name="don_gia" value="<?=$don_gia ?>">
                        <input type="hidden" name="giam_gia" value="<?=$giam_gia ?>">
                        <input type="submit" name="add" value="Add to cart"  class="btn btn-danger btn-lg btn-block mb-3 ">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i>
                    Mô tả sản phẩm
                </div>
                <div class="card-body">
                    <p class="card-text"><?= $mo_ta ?></p>
                </div>
            </div>
        </div>
    </div>
<!-- BÌNH LUẬN -->
    <div class="row" id="binhluan">
        <?php include'binhluan.php';?>
    </div>
</div>
<!-- Sản phẩm cùng loại -->
<section class="same-product mt-5">
    <h3 class="same-product-title text-center">Sản phẩm cùng loại</h3>
    <?php require "cungloai.php"; ?>
</section>

