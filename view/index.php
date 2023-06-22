<?php
    session_start();
    ob_start();
    include '../dao/pdo.php';
    include '../dao/hanghoa.php';
    include '../dao/loai.php';
    include '../dao/binhluan.php';
    include '../dao/khachhang.php';
    include '../dao/cart.php';
  
    // include 'home.php';  
    include 'header.php';
    if(!isset($_SESSION['mycart'])){
        $_SESSION['mycart'] = [];
    }
    $listhh_in_tc = hang_hoa_select_dac_biet();
    $listhh_yt = hang_hoa_select_top10();
    if(isset($_GET['act'])&& $_GET['act']!=""){
        $act = $_GET['act'];
        switch($act){
            /*---------------------------LOAD SẢN PHẨM----------------------------- */

            case 'sanpham':
                $top10 = hang_hoa_select_top10();
                $loai =loai_select_all();
                $items =hang_hoa_select_dac_biet();
                include './sanpham/show.php';
                break;
            case 'sanpham_tim_kiem':
                $top10 = hang_hoa_select_top10();
                $loai =loai_select_all();
                $kyw = $_POST['kyw'];
                $items = hang_hoa_select_keyword($kyw);
                include './sanpham/show_timkiem.php';
                break;
            case 'sanpham_theo_loai':
                $top10 = hang_hoa_select_top10();
                $loai =loai_select_all();
                $ma_loai = $_GET['ma_loai'];
                $hh_loai = hang_hoa_select_by_loai($ma_loai);
                include './sanpham/show_loai.php';
                break;
            case 'chitietsp':
                $ma_hh = $_GET['ma_hh'];
                $ma_loai = $_GET['ma_loai'];
                $hang = hang_hoa_select_by_id($ma_hh);
                $binhluan = binh_luan_select_by_hang_hoa($ma_hh,5); 
                $cungloai = hang_hoa_cung_loai($ma_loai);
                include './sanpham/chitietsp.php';
                break;

            case 'binhluan':
                if(isset($_POST['dang'])){
                    $ma_hh = $_POST['ma_hh'];
                    $ma_kh = $_SESSION['user']['ma_kh'];
                    $ngay_bl = date_format(date_create(), 'Y-m-d');
                    $noidung =$_POST['noidung'];
                    $binhluan = binh_luan_select_by_hang_hoa($ma_hh,5); 
                    $loai = hang_hoa_select_by_id($ma_hh);
                    $ma_loai = $loai['ma_loai'];
                    binh_luan_insert($ma_kh, $ma_hh, $noidung, $ngay_bl);
                    header('location: index.php?act=chitietsp&ma_hh='.$ma_hh.'&ma_loai='.$ma_loai.'');
                }
                include './sanpham/binhluan.php';
                break;
            
            /*----------------------------------TÀI KHOẢN---------------------*/
            case 'dangnhap':
                if(isset($_POST['dangnhap'])){
                    $ma_kh = $_POST['ma_kh'];
                    $mat_khau = $_POST['mat_khau'];
                    $check_kh = khach_hang_check($ma_kh,$mat_khau);
                    if(is_array($check_kh)){
                        $_SESSION['user']= $check_kh;
                        header('location: index.php');
                    }else{
                        $thongbao ="Tài khoản hoặc mật khẩu không đúng!!!";  
                    }
                }
                include './taikhoan/dangnhap.php';
                break;
            case 'dangky':
                if(isset($_POST['dangky'])){
                    $ma_kh = $_POST['ma_kh'];
                    $ho_ten = $_POST['ho_ten'];
                    $mat_khau = $_POST['mat_khau'];
                    $mat_khau2 = $_POST['mat_khau2'];
                    $email = $_POST['email'];
                    $kich_hoat = $_POST['kich_hoat'];
                    $vai_tro = $_POST['vai_tro'];
                    $img = $_FILES['hinh'];
                    $imgname = $_FILES['hinh']['name'];
                    $maxSize = 3000000;
                    $upload = true;
                    $dir = "../uploaded/user/";
                    $target_file = $dir . basename($img['name']);
                    $ext = pathinfo($imgname,PATHINFO_EXTENSION);
                    if(khach_hang_exist($ma_kh)){
                        $upload = false;
                        $thongbao = "Tên đăng nhập đã tồn tại";
                    }
                    else if(khach_hang_exist_email($email)){
                        $upload = false;
                        $thongbao = "Email này đã được đăng ký cho tài khoản khác";
                    }
                    else if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg'){
                         $upload = false;$thongbao = "File không phải ảnh";
                    }
                    else if($mat_khau != $mat_khau2){
                        $upload = false;$thongbao = "Nhập lại mật khẩu không đúng";
                   }
                    if($upload!=false){
                        move_uploaded_file($img['tmp_name'],$target_file);
                        khach_hang_insert($ma_kh,$mat_khau,$ho_ten,$email,$imgname,$kich_hoat,$vai_tro);
                        $thongbao = "Tạo thành công";
                        echo "<script>
                             alert('Tạo tài khoản thành công'); 
                        </script>";
                    } 
                }
                include './taikhoan/dangky.php';
                break;
            case 'capnhat':
                if(isset($_POST['capnhat'])){
                    $ma_kh = $_POST['ma_kh'];
                    $ho_ten = $_POST['ho_ten'];
                    $mat_khau = $_POST['mat_khau'];
                    $email = $_POST['email'];
                    $kich_hoat = $_POST['kich_hoat'];
                    $vai_tro = $_POST['vai_tro'];
                    $anh  = $_POST['hinh'];
                    $img = $_FILES['hinh'];
                    $imgname = $_FILES['hinh']['name'];
                    $maxSize = 8000000;
                    $upload = true;
                    $dir = "../uploaded/user/";
                    $target_file = $dir . basename($img['name']);
                   
                    if($_FILES['hinh']['size']>0 ){
                        $anh = $imgname;   
                    }
                     $ext = pathinfo($anh,PATHINFO_EXTENSION);
                    if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg'){
                         $upload = false;$thongbao = "File không phải ảnh";  
                    }
                    if($upload!=false){
                        move_uploaded_file($img['tmp_name'],$target_file);
                        khach_hang_update($ma_kh,$mat_khau,$ho_ten,$email,$anh,$kich_hoat,$vai_tro);
                        $_SESSION['user']= khach_hang_check($ma_kh,$mat_khau);
                        $thongbao = "Sửa thành công";
                        echo "<script> alert('Sửa khoản thành công'); </script>";
                    }   
                }
                include './taikhoan/capnhat.php';
                break;
            case 'quenmatkhau':
                if(isset($_POST['quenmatkhau'])){
                    $email = $_POST['email'];
                    $check_email = khach_hang_check_email($email);
                    if(is_array($check_email)){
                        $thongbao = "Mật khẩu của bạn là: ".$check_email['mat_khau'];
                    }else{
                        $thongbao = "Email không tồn tại";
                    }
                }
                include './taikhoan/quenmatkhau.php';
                break;
            case 'doimatkhau':
                if(isset($_POST['doimatkhau'])){
                    $ma_kh = $_POST['ma_kh'];
                    $mat_khau_cu = $_POST['mat_khau_cu'];
                    $mat_khau = $_POST['mat_khau'];
                    $mat_khau2 = $_POST['mat_khau2'];
                    if($mat_khau != $mat_khau2){
                        $thongbao = "Nhập lại mật khẩu không chính xác";
                    }else{
                        $user = khach_hang_select_by_id($ma_kh);
                        if($user){
                            if($user['mat_khau'] == $mat_khau_cu){
                                khach_hang_change_password($ma_kh,$mat_khau);
                                $thongbao = "Đổi mật khẩu thành công";
                            }else{
                                $thongbao = "Mật khẩu cũ không đúng";
                            }
                        }else{
                            $thongbao = "Mã đăng nhập không tồn tại";
                        }
                    }
                }
                include './taikhoan/doimatkhau.php';
                break;
            case 'dangxuat':
                session_unset();
                header('location:index.php');
                ob_end_flush();
                break;
             /*---------------------------Giỏ hàng----------------------------- */
            
            case 'addtocart':
                if(isset($_POST['add'])){
                    $ma_hh = $_POST['ma_hh'];
                    $ten_hh = $_POST['ten_hh'];
                    $hinh = $_POST['hinh'];
                    $don_gia = $_POST['don_gia'];
                    $giam_gia = $_POST['giam_gia'];
                    $gia = ($don_gia*(1-$giam_gia/100)) ;
                    $so_luong = 1;
                    $ttien = ($so_luong * $gia);
                    $spadd = [$ma_hh,$ten_hh,$hinh,$gia,$so_luong,$ttien];
                    array_push($_SESSION['mycart'],$spadd);  
                }
                include '../view/cart/cart.php';
                break;
            case 'delcart':
                if(isset($_GET['idcart'])){
                    $index = $_GET['idcart'];
                    array_splice($_SESSION['mycart'],$index,1);
                }else{
                    $_SESSION['mycart'] = [];
                }
                header('location: index.php?act=viewcart');
                break;
            case 'delall':
                if(isset($_GET['idcart'])){
                    $index = $_GET['idcart'];
                        unset($_SESSION['mycart'],$index);
                }else{
                    $_SESSION['mycart'] = [];
                    }
                header('location: index.php?act=viewcart');
                break;
            case 'bill':
                $thongbao = 'Bạn cần đăng nhập để tới phần đặt hàng';
                include '../view/cart/bill.php';
                break;
            case 'billcomfirm':
                if(isset($_POST['dathang'])){
                    $id_user = $_SESSION['user']['ma_kh'];
                    $ma_tk = $_SESSION['user']['ma_tk'];
                    $ho_ten =$_POST['ho_ten'];
                    $email = $_POST['email'];
                    $sdt =$_POST['sdt'];
                    $pttt = $_POST['phuong_thuc_tt'];
                    $dia_chi = $_POST['dia_chi'];
                    $ngay_dat_hang = date('h:i:sa d/m/y');
                    $tong_don_hang = tong_don_hang();
                    // insert vào bảng bill
                    $id_bill = bill_insert($id_user,$ho_ten,$dia_chi,$sdt,$email,$pttt,$ngay_dat_hang,$tong_don_hang,$ma_tk);

                    // insert vào bảng cart với session['mycart'] a $id_bill 
                    foreach($_SESSION['mycart'] as $cart){
                        cart_insert($_SESSION['user']['ma_kh'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$id_bill);
                    }
                    //xóa session cart
                    $_SESSION['cart']=[];
                }
                $list_bill = loadone_bill($id_bill);
                include '../view/cart/billcomfirm.php';
                break;
            case 'mybill':
                $list_bill = load_all_bill($_SESSION['user']['ma_tk']);
                include '../view/cart/mybill.php';
                break;
            case 'viewcart':
                include '../view/cart/cart.php';
                break;
            default:
                include 'home.php';
                break;
        }
    }
    else{
        include 'home.php';
    }
    include 'footer.php';
?>