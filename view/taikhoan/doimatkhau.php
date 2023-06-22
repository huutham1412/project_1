<div  style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);padding-top:120px;
">
<div class="card mx-auto" style="max-width: 500px;">
    <div class="card-body">
        <h4 class="card-title mb-4">Đổi mật khẩu</h4>
        <form action="index.php?act=doimatkhau" method="POST">
            <div class="form-group">
                <label  class="form-label">Mã khách hàng</label>
                <input name="ma_kh"class="btn btn-light btn-block" type="text">
            </div>
            <div class="form-group">
                <label  class="form-label">Mật khẩu cũ</label>
                <input name="mat_khau_cu"class="btn btn-light btn-block" type="password">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Mật khẩu mới</label>
                <input name="mat_khau"class="btn btn-light btn-block" type="password">
            </div>  
            <div class="form-group">
                <label class="form-label">Xác nhận mật khẩu mới</label>
                <input name="mat_khau2" class="btn btn-light btn-block"  type="password">
                <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
				?>
            </div> 
            <div class="form-group">
                <button type="submit" name="doimatkhau" class="btn btn-primary btn-block"> Đổi mật khẩu </button>
            </div>
        </form>
    </div> 
</div>