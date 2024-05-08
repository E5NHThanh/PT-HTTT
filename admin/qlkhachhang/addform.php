<?php include("../inc/top.php"); ?>
<div>
  <h3>Thêm tài khoản khách hàng</h3>

  <div>
    <form method="post">
      <div class="my-3">
        <input class="form-control" type="email" name="txtemail" placeholder="Email" required>
      </div>
      <div class="my-3"><input class="form-control" type="text" name="txtmatkhau" placeholder="Mật khẩu" required></div>
      <div class="my-3">
        <input class="form-control" type="number" name="txtdienthoai" placeholder="Số điện thoại" required>
      </div>
      <div class="my-3">
        <input class="form-control" type="text" name="txthoten" placeholder="Họ tên" required>
      </div>
      <div class="my-3">
        <label>Chọn quyền</label>
        <select class="form-control" name="loai">
          <option value="3">Khách hàng</option>
        </select>
      </div>
      <div class="my-3">
        <input type="hidden" name="action" value="xlthem">
        <input class="btn btn-primary" type="submit" value="Thêm">
        <input class="btn btn-warning" type="reset" value="Hủy">
      </div>
    </form>
  </div>


</div>
<?php include("../inc/bottom.php"); ?>