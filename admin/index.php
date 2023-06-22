<?php
    include 'header.php';
    include '../dao/loai.php';
    include '../dao/hanghoa.php';
    include '../dao/khachhang.php';
    include '../dao/binhluan.php';
    include '../dao/cart.php';

    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            /* ------------------------DANH MỤC -----------------------*/
            case 'adddm':
                if(isset($_POST['themmoi'])){
                    $tenloai = $_POST['tenloai'];
                    loai_insert($tenloai);
                    $thongbao ="Thêm thành công";
                }
                include 'loai/add.php';
                break;
            case 'listdm':
                $list = loai_select_all();
                include 'loai/list.php';
                break;
            case 'xoadm':
                if(isset($_GET['ma_loai'])&& ($_GET['ma_loai']>0)){
                    $ma_loai = $_GET['ma_loai'];
                    $xoa = loai_delete($ma_loai);
                    $thongbao ="Xóa thành công";
                } 
                $list = loai_select_all();
                include 'loai/list.php';
                break;
            case 'suadm':
                if(isset($_GET['ma_loai'])&& ($_GET['ma_loai']>0)){
                    $dm = loai_select_by_id($_GET['ma_loai']);
                    } 
                include 'loai/update.php';
                break;
            case 'updm':
                if(isset($_POST['capnhat'])){
                    $ma_loai = $_POST['ma_loai'];
                    $ten_loai = $_POST['tenloai'];
                    loai_update($ma_loai,$ten_loai);
                    $thongbao="Sửa thành công";
                }
                $list = loai_select_all();
                include 'loai/list.php';
                break;

            /*-------------------------SẢN PHẨM------------------------*/ 
            case 'addhh':
                if(isset($_POST['themmoi'])){
                    $ma_loai = $_POST['ma_loai'];
                    $ten_hh = $_POST['ten_hh'];
                    $don_gia = $_POST['don_gia'];
                    $giam_gia = $_POST['giam_gia'];
                    $dac_biet = $_POST['dac_biet'];
                    $ngay_nhap = $_POST['ngay_nhap'];
                    $so_luot_xem = $_POST['so_luot_xem'];
                    $mo_ta = $_POST['mo_ta'];
                    $img = $_FILES['hinh'];
                    $imgname = $_FILES['hinh']['name'];
                    $maxSize = 8000000; /*byte sang mb*/
                    $upload = true;
                    $dir = "../uploaded/images/";
                    $target_file = $dir . basename($img['name']);
                    $ext = pathinfo($imgname,PATHINFO_EXTENSION);
                    if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg'){
                         $upload = false;$thongbao = "File không phải ảnh";
                    }
                    if($upload!=false){
                         move_uploaded_file($img['tmp_name'],$target_file);
                        hang_hoa_insert($ten_hh,$don_gia,$giam_gia,$imgname,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$ma_loai);
                        $thongbao = "Thêm thành công"; 
                    }
                }
                $listdanhmuc = loai_select_all();
                include 'hanghoa/add.php';
                break;
            case 'listhh':
                $listhh = hang_hoa_select_all();
                include 'hanghoa/list.php';
                break;
            case 'xoahh':
                if(isset($_GET['ma_hh'])&& ($_GET['ma_hh']>0)){
                    $ma_hh = $_GET['ma_hh'];
                    $xoa = hang_hoa_delete($ma_hh);
                    $thongbao ="Xóa thành công";
                } 
                $listhh = hang_hoa_select_all();
                include 'hanghoa/list.php';
                break;
            case 'suahh':
                if(isset($_GET['ma_hh'])&& ($_GET['ma_hh']>0)){
                    $hh = hang_hoa_select_by_id($_GET['ma_hh']);
                }
                $hang_hoa_info = hang_hoa_select_by_id($_GET['ma_hh']);
                $listdm = loai_select_all();
                include 'hanghoa/update.php';
                break;
            case 'uphh':
                if(isset($_POST['capnhat'])){
                    $ma_hh = $_POST['ma_hh'];
                    $ma_loai = $_POST['ma_loai'];
                    $ten_hh = $_POST['ten_hh'];
                    $don_gia = $_POST['don_gia'];
                    $giam_gia = $_POST['giam_gia'];
                    $dac_biet = $_POST['dac_biet'];
                    $ngay_nhap = $_POST['ngay_nhap'];
                    $so_luot_xem = $_POST['so_luot_xem'];
                    $mo_ta = $_POST['mo_ta'];
                    $anh = $_POST['hinh'];
                    $img = $_FILES['hinh'];
                    $imgname = $_FILES['hinh']['name'];
                    $view = 1;
                    $maxSize = 8000000;
                    $upload = true;
                    $dir = "../uploaded/images/";
                    $target_file = $dir . basename($img['name']);
                   
                    if($_FILES['hinh']['size']>0 ){
                        $anh = $_FILES['hinh']['name'];       
                    }
                     $ext = pathinfo($anh,PATHINFO_EXTENSION);
                    if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg'){
                         $upload = false;$thongbao = "File không phải ảnh";     
                    }
                    if($upload!=false){
                        move_uploaded_file($img['tmp_name'],$target_file);
                        hang_hoa_update($ma_hh,$ten_hh,$don_gia,$giam_gia,$anh,$ma_loai,$dac_biet,$so_luot_xem,$ngay_nhap,$mo_ta);
                        $thongbao = "Thêm thành công";
                    } 
                }
                $listdm = loai_select_all();
                $listhh = hang_hoa_select_all();
                include 'hanghoa/list.php';
                break;      
            /*------------------------KHÁCH HÀNG---------------------- */
            case 'addkh':
                if(isset($_POST['themmoi'])){
                    $ma_kh = $_POST['ma_kh'];
                    $ho_ten = $_POST['ho_ten'];
                    $mat_khau = $_POST['mat_khau'];
                    $mat_khau2 = $_POST['mat_khau2'];
                    $email = $_POST['email'];
                    $kich_hoat = $_POST['kich_hoat'];
                    $vai_tro = $_POST['vai_tro'];
                    $img = $_FILES['hinh'];
                    $imgname = $_FILES['hinh']['name'];
                    $maxSize = 300000;
                    $upload = true;
                    $dir = "../uploaded/user/";
                    $target_file = $dir . basename($img['name']);
                    $ext = pathinfo($imgname,PATHINFO_EXTENSION);
                    if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg'){
                         $upload = false;$thongbao = "File không phải ảnh";
                    }
                    if($mat_khau != $mat_khau2){
                        $upload = false;$thongbao = "Nhập lại mật khẩu không đúng";
                   }
                    if($upload!=false){
                        move_uploaded_file($img['tmp_name'],$target_file);
                        khach_hang_insert($ma_kh,$mat_khau,$ho_ten,$email,$imgname,$kich_hoat,$vai_tro);
                        $thongbao = "Thêm thành công";
                    }
                }
                include 'khachhang/add.php';
                break;
            case 'listkh':
                $listkh = khach_hang_select_all();
                include 'khachhang/list.php';
                break;
            case 'xoakh':
                if(isset($_GET['ma_kh'])){
                    $ma_kh = $_GET['ma_kh'];
                    $xoa = khach_hang_delete($ma_kh);
                    $thongbao ="Xóa thành công";
                } 
                $list = khach_hang_select_all();
                include 'khachhang/list.php';
                break;
            case 'suakh':
                if(isset($_GET['ma_kh'])){
                    $kh = khach_hang_select_by_id($_GET['ma_kh']);
                }
                $listkh = khach_hang_select_all();
                include 'khachhang/update.php';
                break;
            case 'upkh':
                if(isset($_POST['capnhat'])){
                    $ma_kh = $_POST['ma_kh'];
                    $ho_ten = $_POST['ho_ten'];
                    $mat_khau = $_POST['mat_khau'];
                    $mat_khau2 = $_POST['mat_khau2'];
                    $email = $_POST['email'];
                    $kich_hoat = $_POST['kich_hoat'];
                    $vai_tro = $_POST['vai_tro'];
                    $anh  = $_POST['hinh'];
                    $img = $_FILES['hinh'];
                    $imgname = $_FILES['hinh']['name'];
                    $maxSize = 3000000;
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
                    if($mat_khau != $mat_khau2){
                        $upload = false;$thongbao = "Nhập lại mật khẩu không đúng";
                   }
                    if($upload!=false){
                        move_uploaded_file($img['tmp_name'],$target_file);
                        khach_hang_update($ma_kh,$mat_khau,$ho_ten,$email,$anh,$kich_hoat,$vai_tro);
                        $thongbao = "Sửa thành công";
                    }   
                }
                $listkh = khach_hang_select_all();
                include 'khachhang/list.php';
                break;
            
           /*-----------------------BÌNH LUẬN------------------------ */
            case 'listbl':
                $listbl = binh_luan_select_all();
                include 'binhluan/list.php';
                break;
            
            case 'xoabl':
                if(isset($_GET['ma_bl'])&& ($_GET['ma_bl']>0)){
                    $ma_bl = $_GET['ma_bl'];
                    $xoa = binh_luan_delete($ma_bl);
                    $thongbao ="Xóa thành công";
                } 
                $listbl = binh_luan_select_all();
                include 'binhluan/list.php';
                break;
            /*-------------------- THỐNG KÊ ------------------------------- */
            case 'thongke':
                $list_thongke = load_all_thongke();
                include 'thongke/list.php';
                break;
            case 'bieudo':
                $list_thongke = load_all_thongke();
                include 'thongke/bieudo.php';
                break;
        }
    }
    else{
        include 'home.php';
    }
?>