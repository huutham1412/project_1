<!-- ============================ COMPONENT LOGIN   ================================= -->
<div class="tongs" style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);padding-top:120px;
">
<div class="card mx-auto" style="max-width: 500px;">
    <div class="card-body">
        <h4 class="card-title mb-4">Đăng nhập</h4>

        <form action="index.php?act=dangnhap" method="POST">
            <div class="icon_login" style="text-align: center;">
                 <a href="#" class="btn btn-facebook  "> <i class="fab fa-facebook-f"></i></a>
                 <a href="#" class="btn btn-google "> <i class="fab fa-google"></i></a>
                 <a href="#" class="btn btn-facebook "> <i class="fa-brands fa-twitter"></i></a>
                 <a href="#" class="btn btn-google "><i class="fa-brands fa-telegram"></i></a>
            </div>
           

            <div class="form-group">
                <label for="email" class="form-label">Tài khoản</label>
                <input name="ma_kh"class="btn btn-light btn-block" placeholder="Username" type="text">
            </div> 
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input name="mat_khau" class="btn btn-light btn-block" placeholder="Password" type="password">
                <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
				?>
            </div> 

            <div class="form-group">
                <a href="index.php?act=quenmatkhau" class="float-right">Quên mật khẩu?</a>
                <label class="float-left custom-control custom-checkbox"> <input type="checkbox"
                        class="custom-control-input" name="ghi_nho" checked>
                    <div class="custom-control-label"> Ghi nhớ tài khoản </div>
                </label>
            </div>

            <div class="form-group">
                <button type="submit" name="dangnhap" class="btn btn-primary btn-block"> Đăng nhập </button>
            </div>
        </form>

    </div> 
</div>

<p class="text-center mt-4">Bạn chưa có tài khoản? <a href="index.php?act=dangky">Đăng ký</a></p>
<br><br></div>