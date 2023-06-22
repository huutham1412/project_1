<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-dark text-white text-uppercase">Thêm mới hàng hóa</div>
            <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
				?>
            <div class="card-body">
                <form action="index.php?act=addhh" method="POST" enctype="multipart/form-data" id="add_hang_hoa">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label  class="form-label">Loại hàng</label>
                            <select name="ma_loai" class="form-control" >
                                <?php
                                foreach ($listdanhmuc as $danhmuc) {
                                    extract($danhmuc);
                                    echo '<option value="'. $ma_loai .'">'. $ten_loai .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label  class="form-label">Tên hàng hóa</label>
                            <input type="text" name="ten_hh"  class="form-control">
                        </div>
                        <div class="form-group col-sm-4">
                            <label  class="form-label">Mã hàng hóa</label>
                            <input type="text" name="ma_hh" readonly class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label  class="form-label">Ảnh sản phẩm</label>
                            <input type="file" name="hinh" id="hinh" class="form-control">
                        </div>
                        <div class="form-group col-sm-4">
                            <label  class="form-label">Đơn giá (vnđ)</label>
                            <input type="number" name="don_gia"  class="form-control">
                        </div>
                        <div class="form-group col-sm-4">
                            <label  class="form-label">Giảm giá (vnđ)</label>
                            <input type="number" name="giam_gia"  class="form-control">
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Hàng đặc biệt?</label>
                            <div class="form-control">
                                <label class="radio-inline  mr-3">
                                    <input type="radio" value="5" name="dac_biet">Đặc biệt
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="4" name="dac_biet" checked>Bình thường
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="form-label">Ngày nhập</label>
                            <input type="date" name="ngay_nhap" class="form-control">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="form-label">Số lượt xem</label>
                            <input type="text" name="so_luot_xem"  readonly class="form-control"
                                value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="form-label">Mô tả sản phẩm</label>
                            <textarea  name="mo_ta" class="form-control form-control-lg mb-3"rows="3"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                        <input type="submit" name="themmoi" value="Thêm mới" class="btn btn-primary mr-3">
                        <a href="index.php?act=listhh"><input type="button" class="btn btn-success" value="Danh sách"></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>