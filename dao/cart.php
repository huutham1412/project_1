<?php
require_once 'pdo.php';

function tong_don_hang(){
    $tong = 0;
    foreach($_SESSION['mycart'] as $cart){
        $ttien = $cart[3]  * $cart[4];
        $tong+=$ttien;
    }
    return $tong;
}
function bill_insert($id_user,$ho_ten,$dia_chi,$sdt,$email,$pttt,$ngay_dat_hang,$tong_don_hang,$ma_tk){
    $sql = "insert into bill(id_user,bill_name,bill_address,bill_tel,bill_email,bill_pttt,ngay_dat_hang,total,ma_tk) values ('$id_user','$ho_ten','$dia_chi','$sdt','$email','$pttt','$ngay_dat_hang','$tong_don_hang','$ma_tk')";
    return pdo_execute_lastInsertId($sql);
}

function cart_insert($id_user,$id_pro,$img,$name,$price,$so_luong,$thanh_tien,$id_bill){
    $sql = "insert into cart(id_user,id_pro,img,name,price,so_luong,thanh_tien,id_bill) values ('$id_user','$id_pro','$img','$name','$price','$so_luong','$thanh_tien','$id_bill')";
    return pdo_execute($sql);
}

function loadone_bill($id){
    $sql = "select * from bill where bill_id=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}
/*show đơn hàng đang ở trạng thái nào*/
function get_ttdh($n){
    switch($n){
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Đã giao xong";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
/*đếm số lượng đơn hàng */
function count_cart($id_bill){
    $sql = "select * from cart where id_bill =".$id_bill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

function load_all_bill($iduser){
    $sql = "SELECT * from bill where ma_tk=".$iduser;
    return pdo_query($sql);
}
function load_all_thongke(){
    $sql = "select loai.ma_loai as maloai, loai.ten_loai as tenloai, count(hang_hoa.ma_hh) as countsp, min(hang_hoa.don_gia) as mingia, max(hang_hoa.don_gia) as maxgia, avg(hang_hoa.don_gia) as tb
    from hang_hoa inner join loai on loai.ma_loai = hang_hoa.ma_loai group by loai.ma_loai order by loai.ma_loai desc";
    $list_thongke = pdo_query($sql);
    return $list_thongke;
}

?>
