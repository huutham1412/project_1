<div class="col-12" id="reviews">
    <div class="card border-light mb-3">
        <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Đánh giá
        </div>
        <?php
            extract($binhluan);
        ?>
        <div class="card-body">
                <?php foreach ($binhluan as $bl) : ?>
                    <div style="margin:25px 0px;border-bottom:2px solid #cdcdcd;display:grid; grid-template-columns:5% 25% 60% 10%;">
                    <img width="60" height="60" class="rounded-circle object-fit-cover"
                    src="<?= '../uploaded/user/'. $bl['hinh'] ?>" />
					<b><?php echo'họ tên: '.$bl['ma_kh']?></b>
                    <p><?php echo $bl['noi_dung'] ?></p>
                    <span style="float:right;font-size:20px"><?php echo $bl['ngay_bl'] ?></span>		
				</div>
            <?php endforeach ?>
        </div>
        <?php

        if (!isset($_SESSION['user'])) {
            echo '<h5 class="text-center"><i class="text-danger">Đăng nhập để bình luận về sản phẩm này</i></h5>';
        } else {

        ?>
        <div class="comment-box text-center">
            <h4>Để lại bình luận</h4>
            <form action="index.php?act=binhluan" method="POST">
                <div class="comment-area">
                    <input type="hidden" name="ma_hh" value="<?= $ma_hh?>">
                    <textarea  name="noidung" placeholder="Nội dung..." rows="4" cols="110"></textarea>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success send px-5" name="dang">Đăng bình luận
                        <i class="fa fa-long-arrow-right ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
        <?php
        } ?>
    </div>
</div>