<h5 class="alert-info mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center" style="margin-top: 5rem; margin-bottom: 0rem">Giỏ
    hàng</h5>

<div class="container">
<?php
    if (isset($_SESSION['mycart'])) {
    ?>
    <div class="row m-1 pb-5">
        <table class="table table-responsive-md">
            <thead class="thead text-center">
                <tr>
                    <th>Mã SP</th>
                    <th>Tên SP</th>
                    <th>Ảnh</th>
                    <th>Đơn giá</th>
                    <th style="width:6rem">Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-center" id="giohang">
                <?php 
                $tong = 0;
                $i = 0;
                foreach ($_SESSION['mycart'] as $cart) : ?>
                <tr>
                    <?php $tong+=$cart[5];?>
                    <td><?= $cart[0] ?></td>
                    <td><?= $cart[1] ?></td>
                    <td><img src="<?= '../uploaded/images/'.$cart[2]?>". alt="" width="70" height="70"></td>
                    <td><span><?=$cart[3] ?></span>$<input type="hidden"
                            class="don_gia_an" name="don_gia" value="<?= $cart[3] ?>"></td>
                        <td><input type="number" name="update_sl"
                            value="<?= $cart['4'] ?>" min="1" max="10"></td>
                    </form>
                    <td><?= $cart[5] ?></td>
                    <td class="pt-1 m-auto">
                        <a onclick="return confirm('Bạn chắc chắn muốn xóa?');"
                            href="index.php?act=delcart&idcart=<?= $i ?>"
                            class="btn btn-outline-danger"> <i class="fas fa-trash-alt "></i></a>
                    </td>
                  <?php $i = $i+1;?>   
                </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot id="tongdonhang">
                <tr class="text-center">
                    <th colspan="5">Tổng thành tiền: </th>
                    <td class="  text-danger font-weight-bold"><?= $tong ?>$</td>
                    <td></td>
                </tr>
                <tr class="text-right">
                    <th colspan="7">
                        <a href="index.php?act=bill" class="btn btn-success">Thanh
                            toán</a>
                        <a onclick="return confirm('Bạn chắc chắn muốn xóa tất cả k??');"
                            href="index.php?act=delall" class="btn btn-danger">Xóa
                            tất
                            cả</a>
                    </th>
                </tr>
            </tfoot>
            
        </table>
    </div>
    <?php } ?>
</div>