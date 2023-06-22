
<div class="tongs" style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);padding-top:120px;
">
<div class="card mx-auto" style="max-width: 500px;">
    <div class="card-body">
        <h4 class="card-title mb-4">Nhập email để lấy lại mật khẩu</h4>
        <form action="index.php?act=quenmatkhau" method="POST">
            <div class="form-group">
                <label class="form-label">Email</label>
                <input name="email" class="btn btn-light btn-block" placeholder="Email" type="email" required>
                <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
				?>
            </div> 
            <div class="form-group">
                <button type="submit" name="quenmatkhau" class="btn btn-primary btn-block"> Lấy mật khẩu </button>
            </div>
        </form>
    </div> 
</div>

<p class="text-center mt-4">Bạn đã có tài khoản?<a href="index.php?act=dangnhap">Đăng nhập</a></p>
<br><br></div>