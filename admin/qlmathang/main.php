<?php include("../inc/top.php"); ?>

<h3>Quản lý máy ảnh</h3>
<br>
<a href="index.php?action=them" class="btn btn-info">
	<i class="align-middle" data-feather="plus-circle"></i>
	Thêm mặt hàng
</a>
<br> <br>
<table class="table table-hover">
	<tr>
		<th>Tên mặt hàng</th>
		<th>Giá bán</th>
		<th>Số lượng</th>
		<th>Hình ảnh</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
	foreach ($mathang as $m) :
	?>
		<tr>
			<td>
				<a href="index.php?action=chitiet&id=<?php echo $m["id"]; ?>">
					<?php echo $m["tenmathang"]; ?>
				</a>
			</td>
			<td><?php echo $m["giaban"]; ?></td>
			<td><?php echo $m["soluongton"]; ?></td>
			<td>
				<a href="index.php?action=chitiet&id=<?php echo $m["id"]; ?>">
					<img width="100" src="../../images/product/<?php echo $m["hinhanh"]; ?> ">
				</a>
			</td>
			<td><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $m["id"]; ?>"><i class="align-middle" data-feather="edit"></a></td>
			<td><a class="btn btn-danger" href="javascript:void(0);" onclick="confirmDelete(<?php echo $m['id']; ?>);" ><i class="align-middle" data-feather="trash"></a></td>
		</tr>
	<?php
	endforeach;
	?>
</table>
<script>
	function confirmDelete(id) {
		if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
			window.location.href = 'index.php?action=xoa&id=' + id;
		}
	}
</script>
<?php include("../inc/bottom.php"); ?>