<h5 class="alert-info mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center" style="margin-top: 5rem; margin-bottom: 0rem">Thống kê hàng hóa</h5>

<div class="container">
    <div class="row m-1 pb-5">
        <table class="table table-responsive-md">
            <thead class="thead text-center">
                <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Số lượng</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                </tr>
            </thead>
            <tbody class="text-center" id="giohang">
            <?php 
                    foreach ($list_thongke as $thongke){
                        extract($thongke);
                    echo '
                    <tr>
                        <td>'.$maloai.'</td>
                        <td>'.$tenloai.'</td>
                        <td>'.$countsp.'</td>
                        <td>'.$maxgia.'$</td>
                        <td>'.$mingia.'$</td>
                        <td>'.$tb.'$</td>
                    </tr>
                    ';
                    }
            ?>
            </tbody>
        </table>
        <a href="index.php?act=bieudo"><input type="button" class="btn btn-success w-100" value="Biểu đồ"></a>
    </div>
</div>