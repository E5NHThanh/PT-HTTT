<?php include("../inc/top.php"); ?>

<h3>Quản lý đơn hàng</h3> 
<br>

<br>
<table class="table table-hover">
	<tr>
		<th>ID đơn hàng</th>
		<th>Tên khách hàng</th>
		<th>Ngày</th>		
		<th>Tổng tiền</th>

	</tr>
	<?php 
	foreach ($donhang as $dh): 
	?>
	<tr>
			<td><?php echo $dh["hoadon_id"]; ?></td>
			<td><?php echo $dh["nguoidung_id"]; ?></td>
			<td><?php echo date('d/m/Y H:i:s', strtotime($dh["ngay"])); ?></td>
			<td><?php echo number_format($dh["tongtien"]) ?> VNĐ</td>
			<td><a href="index.php?action=chitiet&id=<?php echo $dh["hoadon_id"]; ?>" class="btn btn-warning">Chi tiết</a></td>
		</tr>
	<?php
	endforeach;
	?>
</table>

<?php include("../inc/bottom.php"); ?>
