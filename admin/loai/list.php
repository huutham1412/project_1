<div class="container">
    <div class="page-title">
        <h4 class="mt-5 font-weight-bold text-center">Danh sách loại hàng</h4>
    </div>
    <div class="box box-primary">
        <div class="box-body">
        
        <a href="index.php?act=adddm"><input type="submit" class="btn btn-success mb-1" value="Nhập thêm"></a>  
        <?php
				if(isset($thongbao)) { ?>
					<p class="alert alert-danger"><?= $thongbao ?></p>
				<?php
				}
        ?>
            <form action="index.php?act=listdm" method="post" class="table-responsive">
              
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                            extract($item);
                            $suadm = "index.php?act=suadm&ma_loai=" . $ma_loai;
                            $xoadm = "index.php?act=xoadm&ma_loai=" . $ma_loai;
                        ?>
                        <tr>
                            <td><?= $ma_loai ?></td>
                            <td><?= $ten_loai ?></td>
                            <td class="text-end">
                                 <a href="<?= $suadm ?>" class="btn btn-outline-info btn-rounded">Sửa</a>
                                 <a href="<?= $xoadm ?>" class="btn btn-outline-danger btn-rounded" onclick="return confirm('Bạn thật sự muốn xóa?');">Xóa</a>      
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