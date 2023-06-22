<?php
        if(isset($list_bill)){
        extract($list_bill);
?> 
<h5 class="alert-secondary mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center text-sm-center text-md-center text-lg-center text-xl-center"
    style="margin-top: 5rem; margin-bottom: 0rem">Cảm ơn bạn đã đặt hàng</h5>
<div class="container tong">
        <form action="index.php" class="form">
            <div class="form-groups">
                <div class="left">
                     <label for="">Họ tên</label> <br>
                    <input type="text" name="ho_ten" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['bill_name']?>">
                </div>
               <div class="right">
                    <label for="">Địa chỉ email</label><br>
                    <input type="text" name="email" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['bill_email']?>">
               </div>
                 
            </div>
            <div class="form-groups">
                <!-- <label for="">Tên đăng nhập</label> -->
                <input type="hidden" name="ma_kh" id="" class="input" 
                    aria-describedby="helpId" >
            </div>
            <div class="form-groups">
                <div class="left">
                     <label for="">Số điện thoại</label> <br>
                    <input type="text" name="sdt" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['bill_tel'] ?>">
                </div>
               <div class="right">
                    <label for="">Địa chỉ nhận hàng</label> <br>
                    <input type="text" name="dia_chi" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['bill_address'] ?>">  
               </div>
                 
            </div>
            <div class="d-flex justify-content-center">
                <button  type="submit" name="dathang" class="btn btn-success btn-block ">Xác
                    nhận</button>
            </div>
            
        </form>
        
        <div class="row m-1 pb-5">
        <form action="" class="form">
            <div class="form-groups">
                <div class="left">
                     <label for="">Mã đơn hàng</label> <br>
                    <input type="text" name="ho_ten" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= 'DAM-'.$list_bill['bill_id']?>">
                </div>
               <div class="right">
                    <label for="">Ngày đặt hàng</label><br>
                    <input type="text" name="email" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['ngay_dat_hang']?>">
               </div>
                 
            </div>
            <div class="form-groups">
                <div class="left">
                     <label for="">Phương thức thanh toán</label> <br>
                    <input type="text" name="sdt" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['bill_pttt'] ?>">
                </div>
               <div class="right">
                    <label for="">Tổng đơn hàng</label> <br>
                    <input type="text" name="dia_chi" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['total'].'$' ?>">  
               </div>
                 
        </div>
        
        </form>
        </div>
        
    </div>

    <?php 
 }