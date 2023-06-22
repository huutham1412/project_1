<div class="container">
    <div class="page-title">

        <h4 class="mt-5 font-weight-bold text-center">Chi tiết bình luận</h4>
        <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
        ?>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <form action="?btn_delete_all" method="post" class="table-responsive">     
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Khách hàng BL</th>
                            <th>Mã Sản phẩm</th>
                            <th>Nội dung</th>
                            <th>Ngày BL</th> 
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($listbl as $item) {
                            extract($item);
                            $xoabl = "index.php?act=xoabl&ma_bl=" . $ma_bl;

                        ?>
                        <tr>
                            <td><?= $ma_kh?></td>
                            <td><?= $ma_hh ?></td>
                            <td><?= $noi_dung ?></td>
                            <td><?= $ngay_bl ?></td>
                            <td class="text-end">
                                <a href="<?= $xoabl ?>"
                                    class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn có muốn xóa?')">Xóa<i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>
                <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
                <!-- -->
            </form>
        </div>
    </div>
</div>