<h5 class="alert-info mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center" style="margin-top: 5rem; margin-bottom: 0rem">Giỏ
    hàng của tôi</h5>

<div class="container">
    <div class="row m-1 pb-5">
        <table class="table table-responsive-md">
            <thead class="thead text-center">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Số lượng mặt hàng</th>
                    <th>Tổng giá trị đơn hàng</th>
                    <th>Tình trạng đơn hàng</th>
                </tr>
            </thead>
            <tbody class="text-center" id="giohang">
            <?php 
                foreach ($list_bill as $bill){
                        extract($bill);
                        $ttdh = get_ttdh($bill['bill_status']);
                        $count = count_cart($bill['bill_id']);
                    echo '
                    <tr>
                        <td>DAM-'.$bill['bill_id'].'</td>
                        <td>'.$bill['ngay_dat_hang'].'</td>
                        <td>'.$count.'</td>
                        <td>'.$bill['total'].'$</td>
                        <td>'.$ttdh.'</td>
                    </tr>
                    ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>