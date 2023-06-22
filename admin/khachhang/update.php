<?php
    if(is_array($kh)){
        extract($kh);
    }
?>
<?php
$img_path = "../uploaded/user/". $hinh;
if (is_file($img_path)) {
    $img = "<img src='$img_path' height='100'>";
} else {
    $img = "no photo";
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật khách hàng</div>
            <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
        ?>
            <div class="card-body">
                <form action="index.php?act=upkh" method="POST" enctype="multipart/form-data" id="admin_update_kh">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label  class="form-label">MÃ KHÁCH HÀNG (tên đăng nhập)</label>
                            <input type="text" name="ma_kh" id="ma_kh" class="form-control" required
                                value="<?= $ma_kh ?>" >
                        </div>
                        <div class="form-group col-sm-6">
                            <label  class="form-label">Họ và tên</label>
                            <input type="text" name="ho_ten"  class="form-control" required
                                value="<?= $ho_ten ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label  class="form-label">Mật khẩu</label>
                            <input type="password" name="mat_khau"  class="form-control" required
                                value="<?= $mat_khau ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <label  class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" name="mat_khau2" class="form-control" required
                                value="<?= $mat_khau ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <label  class="form-label">Ảnh</label>
                                    <input type="hidden" name="hinh" id="hinh" class="form-control"
                                        value="<?= $hinh ?>">
                                    <input type="file" name="hinh" id="hinh" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <?= $img ?>
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-sm-6">
                            <label  class="form-label">Địa chỉ email</label>
                            <input type="email" name="email" class="form-control" required
                                value="<?= $email ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Kích hoạt?</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="0" name="kich_hoat"
                                        <?= !$kich_hoat ? 'checked' : '' ?>>Chưa kích
                                    hoạt
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="kich_hoat"
                                        <?= $kich_hoat ? 'checked' : '' ?>>Kích hoạt
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Vai trò</label>
                            <div class="form-control">
                                <label class="radio-inline mr-3">
                                    <input type="radio" value="0" name="vai_tro" <?= !$vai_tro ? 'checked' : '' ?>>Khách
                                    hàng
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="1" name="vai_tro" <?= $vai_tro ? 'checked' : '' ?>>Nhân
                                    viên
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 text-center mt-3">
                      
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-primary mr-3">
                        <a href="index.php?act=listkh"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>