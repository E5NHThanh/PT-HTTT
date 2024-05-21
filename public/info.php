<?php include("inc/top.php"); ?>

<div class="container mt-5 mb-3">
    <div class="row">
        <!-- Phần thông tin người dùng -->
        <div class="col-md-5">
            <?php
            // Tạo đối tượng KHACHHANG
            $khachhang = new KHACHHANG();
            // Lấy nguoidung_id từ phiên đăng nhập
            $nguoidung_id = $_SESSION["khachhang"]["id"];
            // Lấy thông tin người dùng theo id
            $thongTinNguoiDung = $khachhang->laykhtheoid($nguoidung_id);
            if ($thongTinNguoiDung) {
                echo "<div class='card'>";
                echo "<div class='card-header'>";
                echo "<h4 class='text-info text-center'>HỒ SƠ NGƯỜI DÙNG</h4>";
                echo "</div>";
                echo "<div class='card-body'>";
                echo "<form method='post' action='index.php'>";
                echo "<input type='hidden' name='txtid' value='" . $thongTinNguoiDung["id"] . "'>";
                echo "<input type='hidden' name='action' value='luudonhang'>";
                echo "<div class='mb-3'>";
                echo "<label class='form-label'>Email</label>";
                echo "<input type='email' class='form-control' name='txtemail' value='" . $thongTinNguoiDung["email"] . "' disabled>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label class='form-label'>Họ tên</label>";
                echo "<input type='text' class='form-control' name='txthoten' value='" . $thongTinNguoiDung["hoten"] . "' disabled>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label class='form-label'>Số điện thoại</label>";
                echo "<input type='text' class='form-control' name='txtsodienthoai' value='" . $thongTinNguoiDung["sodienthoai"] . "' disabled>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <!-- Phần thông tin thanh toán (giỏ hàng) -->
        <div class="col-md-6">
            <h4 class="text-info text-md-center">THÔNG TIN THANH TOÁN</h4>
            <table class="table table-bordered">
                <thead>
                    <tr class="table-info">
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Mặt hàng</th>
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    $giohang = laygiohang();
                    foreach ($giohang as $id => $mh) : ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><img width="80" src="../images/product/<?php echo $mh["hinhanh"]; ?>"></td>
                            <td><?php echo $mh["tenmathang"]; ?></td>
                            <td><?php echo $mh["soluong"]; ?></td>
                            <td><?php echo number_format($mh["giaban"]) . " (VNĐ)"; ?></td>
                            <td><?php echo number_format($mh["thanhtien"]) . " (VNĐ)"; ?></td>
                        </tr>
                    <?php
                        $stt++;
                    endforeach; ?>
                    <tr class="table-info">
                        <td colspan="5" class="text-end"><b>Tổng tiền</b></td>
                        <td><b><?php echo number_format(tinhtiengiohang()); ?> VNĐ</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("inc/bottom.php"); ?>
