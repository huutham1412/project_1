<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách khách hàng</h4>
    </div>
    <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
        ?>
    <div class="box box-primary">
        <div class="box-body">
            <form action="index.php?act=listkh" method="post" class="table-responsive">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã KH</th>
                            <th>Họ và tên</th>
                            <th>Địa chỉ email</th>
                            <th>Ảnh</th>
                            <th>Vai trò</th>
                            <th>Kích hoạt</th>
                            <th><a href="index.php?act=addkh" class="btn btn-success text-white">Thêm mới
                                    <i class="fas fa-plus-circle"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($listkh as $item) {
                            extract($item);
                            $suakh = "index.php?act=suakh&ma_kh=" . $ma_kh;
                            $xoakh = "index.php?act=xoakh&ma_kh=" . $ma_kh;
                            $img_path = "../uploaded/user/". $hinh;
                            if (is_file($img_path)) {
                                $img = "<img src='$img_path' height='100' width='100' class='rounded-circle object-fit-cover'>";
                            } else {
                                $img = "no photo";
                            }

                        ?>
                        <tr>
                            <td><?= $ma_kh ?></td>
                            <td><?= $ho_ten ?></td>
                            <td><?= $email ?></td>
                            <td><?= $img ?></td>
                            <td><?= ($vai_tro == 1) ? "Nhân viên" : "Khách hàng"; ?></td>
                            <td><?= ($kich_hoat == 1) ? "Rồi" : "Chưa"; ?></td>
                            <td class="text-end">
                                <a href="<?= $suakh ?>" class="btn btn-outline-info btn-rounded"><i
                                        class="fas fa-pen">Sửa</i></a>
                                <a href="<?= $xoakh ?>" class="btn btn-outline-danger btn-rounded"
                                    onclick="return confirm('Bạn thật sự muốn xóa?')"><i class="fas fa-trash">Xóa</i></a>
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