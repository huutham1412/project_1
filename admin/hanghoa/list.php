<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách hàng hóa</h4>
        <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
        ?>
    </div>
    <div class="box box-primary">
        <div class="box-body">

        <a href="index.php?act=addhh"><input type="submit" class="btn btn-success mb-1" value="Nhập thêm"></a>
            <form action="index.php?act=listhh" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã HH</th>
                            <th>Tên hàng hóa</th>
                            <th>Ảnh</th>
                            <th>Đơn giá</th>
                            <th>Giảm giá</th>
                            <th>Lượt xem</th>
                            <th>Ngày nhập</th>
                            <th>Đặc biệt?</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($listhh as $item) {
                            extract($item);
                            $suahh = "index.php?act=suahh&ma_hh=" . $ma_hh;
                            $xoahh = "index.php?act=xoahh&ma_hh=" . $ma_hh;
                            $img_path = "../uploaded/images/". $hinh;
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='100' class='object-fit-contain'>";
                            } else {
                                $img = "no photo";
                            }
                            //Tính giảm bn %
                            if ($don_gia > 0) {
                                $percent_discount = $giam_gia;
                            }
                        ?>
                        <tr>
                            <td><?= $ma_hh ?></td>
                            <td><?= $ten_hh ?></td>
                            <td><?= $img ?></td>
                            <td><?= number_format($don_gia, 00) ?>$</td>
                            <td><?= number_format($don_gia- $don_gia * $giam_gia/ 100) ?>$<i
                                    class="text-danger">(-<?= $percent_discount?>%)</i>
                            </td>
                            <td><?= $so_luot_xem ?></td>
                            <td><?= $ngay_nhap ?></td>
                            <td><?= ($dac_biet == 5) ? "Đặc biệt" : "Không"; ?></td>

                            <td class="text-end">
                                <a href="<?= $suahh ?>" class="btn btn-outline-info btn-rounded"><i
                                        class="fas fa-pen">Sửa</i></a>
                                <a href="<?= $xoahh ?>" class="btn btn-outline-danger btn-rounded"
                                onclick="return confirm('Bạn thật sự muốn xóa?');"><i class="fas fa-trash">Xóa</i></a>
                            </td>
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>

                </table>
            </form>
        </div>
    </div>
</div>