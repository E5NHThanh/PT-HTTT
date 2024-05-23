<?php include("inc/top.php") ?>
<div class="text-center mt-5" >
<?php
if (demhangtronggio() == 0) {
?>
    <img src="../images/product/empty-cart.webp" alt="" style="width: auto; height:200px;margin-top:20px; ">
            <h3 class="tex-info"> Nhấn vào nút bên dưới để chọn sản phẩm</h3>
            <a style="margin-bottom:50px;" href="index.php?action=null" class="btn btn-outline-info">Vui lòng chọn sản phẩm</a>
<?php
} else {
?>
    <h3 class="text-danger text-md-center mt-5">Giỏ hàng của bạn:</h3>
    <form action="index.php">
        <table class="table table-hover">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên hàng</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
            </tr>
            <?php foreach ($giohang as $id => $mh) :
            ?>
                <tr>
                    <td><img width="150" src="../images/product/<?php echo $mh["hinhanh"]; ?>"></td>
                    <td><?php echo $mh["tenmathang"]; ?></td>
                    <td><?php echo number_format($mh["giaban"]); ?>đ</td>
                    <td><input type="number" name="mh[<?php echo $id; ?>]" value="<?php echo $mh["soluong"]; ?>"></td>
                    <td> <?php echo number_format($mh["thanhtien"]); ?>đ</td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"></td>
                <td class="fw-bold">Tổng tiền</td>
                <td class="text-danger fw-bold"><?php echo number_format(tinhtiengiohang()); ?></td>
            </tr>
        </table>
        <div class="row">
            <div class="col">
                <a href="index.php?action=xoagiohang">Xóa tất cả</a>
                (Xóa một mặt hàng nhập số lượng = 0)
            </div>
            <div class="col text-end p-3">
                <input type="hidden" name="action" value="capnhatgio">
                <input type="submit" class="btn btn-warning" value="Cập nhật">
                <a href="index.php?action=thanhtoan" class="btn btn-success">Thanh toán</a>
            </div>
        </div>
    </form>
<?php
}
?>
</div>
<?php

include("inc/bottom.php");
?>