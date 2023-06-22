<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Sửa danh mục</div>
            <div class="card-body">
                <form action="index.php?act=updm" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Mã loại</label>
                        <input type="text" name="ma_loai" class="form-control" value="<?= $ma_loai?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Tên loại</label>
                        <input type="text" name="tenloai" class="form-control" required value="<?php if(isset($ten_loai)&& ($ten_loai!="")) echo $ten_loai;?>">
                    </div>
                    <div class="mb-3 text-center">
                        <input type="hidden" name="ma_loai" value="<?php if(isset($ma_loai)&& ($ma_loai!="")) echo $ma_loai;?>">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="capnhat" value="Cập nhật" class="btn btn-primary mr-3">
                        <a href="index.php?act=listdm"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>