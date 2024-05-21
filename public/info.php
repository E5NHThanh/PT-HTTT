<?php include("inc/top.php"); ?>

<div class="container">
    <div class="row">
        <h3>Trang thông tin khách hàng</h3>
        <?php
        $kh = new KHACHHANG();
        $_SESSION["nguoidung"] = $kh->laythongtinkhachhang($email);
        ?>
        <tr>
            <td> <a>Email: <?php echo $_SESSION["nguoidung"]["email"]; ?></a></td>
            <td> <a>Tên: <?php echo $_SESSION["nguoidung"]["hoten"]; ?></a></td>
            <td><a>Số điện thoại: <?php echo $_SESSION["nguoidung"]["sodienthoai"]; ?></a></td>
            <!-- <td> <a>Thanh Tien: <?php echo number_format( $_SESSION["nguoidung"]["thanhtien"]); ?></a></td> -->
        </tr>
        </table>
        </form>

    </div>
</div>

<?php include("inc/bottom.php"); ?>