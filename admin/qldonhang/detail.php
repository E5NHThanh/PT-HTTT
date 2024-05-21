<?php include("../inc/top.php"); ?>

<h3>Chi tiết đơn hàng</h3>
<a href="index.php">Trở về danh sách</a>

<table class="table table-hover">
    <tr>
        <th>ID đơn hàng chi tiết</th>
        <th>Đơn hàng</th>
        <th>Mặt hàng</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>

    <?php if (isset($dhct) && !empty($dhct)) : ?>
        <tr>
            <td><?php echo $dhct["id"]; ?></td>
            <td><?php echo $dhct["donhang_id"]; ?></td>
            <td><?php echo $dhct["mathang_ten"]; ?></td>
            <td><?php echo number_format($dhct["dongia"]); ?> VNĐ</td>
            <td><?php echo $dhct["soluong"]; ?></td>
            <td><?php echo number_format($dhct["thanhtien"]); ?> VNĐ</td>
        </tr>
    <?php else : ?>
        <tr>
            <td colspan="6">Không tìm thấy đơn hàng chi tiết.</td>
        </tr>
    <?php endif; ?>

</table>

<?php include("../inc/bottom.php"); ?>
