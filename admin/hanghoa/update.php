<?php
    if(is_array($hh)){
        extract($hh);
    }
?>
<?php
$img_path = "../uploaded/images/".$hinh;
if (is_file($img_path)) {
    $img = "<img src='".$img_path."' height='60'>";
} else {
    $img = "no photo";
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật hàng hóa</div>
            <div class="card-body">
                <form action="index.php?act=uphh" method="POST" enctype="multipart/form-data" id="update_hang_hoa">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label  class="form-label">Loại hàng</label>
                            <select name="ma_loai" class="form-control" id="ma_loai">
                                <?php

                                foreach ($listdm as $loai_hang) {
                                    extract($loai_hang);
                                    if($ma_loai == $hang_hoa_info['ma_loai']) $s="selected"; else $s="";
                                    echo '<option value="'.$ma_loai.'" '.$s.'>'.$ten_loai.'</option>';
                                }

                                ?>

                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label  class="form-label">Tên hàng hóa</label>
                            <input type="text" name="ten_hh"class="form-control" required
                                value="<?= $ten_hh ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label  class="form-label">Mã hàng hóa</label>
                            <input type="text" name="ma_hh" readonly class="form-control"
                                value="<?= $ma_hh ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                <label class="form-label">Ảnh sản phẩm</label>
                                    <input type="hidden" name="hinh" class="form-control"
                                        value="<?= $hinh ?>">
                                    <input type="file" name="hinh" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <!-- Ảnh sản phẩm ban đầu -->
                                    <?= $img ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label  class="form-label">Đơn giá (vnđ)</label>
                            <input type="text" name="don_gia" class="form-control" value="<?= $don_gia ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="form-label">Giảm giá (%)</label>
                            <input type="text" name="giam_gia"  class="form-control" required
                                value="<?= $giam_gia ?>">
                        </div>
                    </div>
                    <div class="row">


                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Hàng đặc biệt?</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="5" name="dac_biet" <?= $dac_biet ? 'checked' : '' ?>>Đặc
                                    biệt
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="4" name="dac_biet"
                                        <?= !$dac_biet ? 'checked' : '' ?>>Bình thường
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="form-label">Ngày nhập</label>
                            <input type="date" name="ngay_nhap"  class="form-control" required
                                value="<?= $ngay_nhap ?>">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="form-label">Số lượt xem</label>
                            <input type="text" name="so_luot_xem" readonly class="form-control"
                                required value="<?= $so_luot_xem ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label  class="form-label">Mô tả sản phẩm</label>
                            <textarea  spellcheck="false" name="mo_ta"
                                class="form-control form-control-lg mb-3" 
                                rows="3"><?= $mo_ta ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <input type="hidden" name="ma_hh" value="<?=$ma_hh?>">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-primary mr-3">
                        <a href="index.php?act=listhh"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>