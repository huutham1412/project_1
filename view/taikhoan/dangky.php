<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="tongs" style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);padding-top:120px;
">
<div class="card mx-auto" style="max-width: 500px;">
    <div class="card-body">
        <h4 class="card-title mb-4">Đăng ký</h4>

        <form action="index.php?act=dangky" method="POST" enctype="multipart/form-data">
            <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
				?>
            <div class="form-group">
                <label  class="form-label">Tài khoản</label>
                <input name="ma_kh"class="btn btn-light btn-block" placeholder="Username" type="text"required>
            </div> 
            <div class="form-group">
                <label class="form-label">Họ tên</label>
                <input name="ho_ten" class="btn btn-light btn-block" placeholder="Họ tên" type="text"required>
            </div>
            <div class="form-group">
                <label  class="form-label">Email</label>
                <input name="email"class="btn btn-light btn-block" placeholder="Email" type="text"required>
            </div> 
            <div class="form-group">
                <label class="form-label">Ảnh</label>
                <input name="hinh" class="btn btn-light btn-block" placeholder="Hinh" type="file" required>
            </div> 
            <div class="form-group">
                <label  class="form-label">Mật khẩu</label>
                <input name="mat_khau"class="btn btn-light btn-block" placeholder="Mật khẩu" type="password"required>
            </div> 
            <div class="form-group">
                <label class="form-label">Nhập lại mật khẩu</label>
                <input name="mat_khau2" class="btn btn-light btn-block" placeholder="Nhập lại mật khẩu" type="password"required>
            </div>
            <input type="hidden" name="kich_hoat" value="1">
             <input type="hidden" name="vai_tro" value="0">

            <div class="form-group">
                <button type="submit" name="dangky" class="btn btn-primary btn-block"> Đăng ký </button>
            </div>
        </form>

    </div> 
</div>
<p class="text-center mt-4">Bạn đã có tài khoản? <a href="index.php?act=dangnhap">Đăng nhập</a></p>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->