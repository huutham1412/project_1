<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    

    <link rel="stylesheet" href="icon/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product.css">
</head>

<body>




<header class="p-3 mb-3 border-bottom bg-light">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="logo d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <img src="../uploaded/user/logo.png" alt="">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i></a></li>
          <li><a href="index.php?act=sanpham" class="nav-link px-2 link-secondary">Sản phẩm</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Giới thiệu</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Liên hệ</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Góp ý</a></li>
        </ul>

        <!-- <form class="form-inline my-2 my-lg-0 me-2">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --><form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 row" role="search" method="POST" action="index.php?act=sanpham_tim_kiem">
          <input type="search" name="kyw" class="form-control col" placeholder="Search..." aria-label="Search">
          <div class="col">
          <button type="submit" name="timkiem" class="btn btn-success btn-number btn-custom">
                <i class="bi bi-search"></i>
          </button>
          </div>
        </form>

        
        <?php
            if (isset($_SESSION['user'])) {
              extract($_SESSION['user']);
            
        ?><div class="carts">
        <a href="index.php?act=addtocart"><i class="fa-solid fa-cart-shopping text-dark"></i>
             </div>
          <!-- <div class="cart text-white me-5">
            <i class="fa-solid fa-cart-shopping"></i>
          </div> -->
          <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?= '../uploaded/user/'.$hinh ?>" alt="mdo" width="35" height="40" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" style="width:70px;max-height:250px;font-size:13px">
              <li><a class="dropdown-item" >Xin chào <b><?=$ho_ten?></b></a></li>
              <li><a class="dropdown-item" href="index.php?act=capnhat">Cập nhật tài khoản</a></li>
              <li><a class="dropdown-item" href="index.php?act=doimatkhau">Đổi mật khẩu</a></li>
              <li><a class="dropdown-item" href="index.php?act=mybill">Đơn hàng của tôi</a></li>
              <?php 
                if ($vai_tro == "1") {
              ?>
              <li><a class="dropdown-item" href="../admin/index.php">Đăng nhập admin</a></li>
              <?php } ?>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="index.php?act=dangxuat">Sign out</a></li>
            </ul>
          </div>
        <?php 
          }else{
        ?>

          <div class="text-end">
            <button type="button" class="btn btn-outline-secondary  bg-secondary "><a class="text-decoration-none text-white" href="index.php?act=dangnhap">Login</a></button>
           
          </div>

        <?php } ?>
      </div>
      </div>
    </div>
  </header>
