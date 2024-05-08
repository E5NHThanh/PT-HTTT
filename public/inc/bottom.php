<!-- Footer-->
<footer class="py-6 bg-success text-center ">
  <!-- <div class="text-center mb-5"><a class="text-warning" href="#top"><i class="bi bi-chevron-up" style="font-size: 3rem; font-weight: bold; color:white;"></i></a></div> -->

  <div class="container p-3 ">
    <div class=" row">
      <div class="col-md-6 text-light ">
        <a href="index.php" class="text-decoration-none text-white ">
          <h4>
            <span class="badge text-white bg-info">T</span>
            <span class="badge text-white bg-danger">H</span>
            <span class="badge text-white bg-warning">A</span>
            <span class="badge text-white bg-secondary">S</span> Photoraphy
          </h4>
        </a>
        <p><b><i>Địa chỉ:</i></b> Thới An 3, Thuận An, Thốt Nốt, Cần Thơ<br>
          <b><i>Điện thoại:</i></b> 0379 111556<br>
          <b><i>Email:</i></b> nguyenhoaithanh.05042002@gmail.com
        </p>
      </div>
      <div class="col-md-6 text-warning">
        <h4 class="text-dark">DANH MỤC HÀNG</h4>
        <?php foreach ($danhmuc as $d) : ?>
          <a class="list-group-item" href="?action=group&id=<?php echo $d["id"]; ?>">
            <?php echo $d["tendongmay"]; ?>
          </a>
        <?php endforeach; ?>
      </div>
      <!-- <div class="col-md-3 text-muted">
        <h4>DỊCH VỤ KHÁCH HÀNG</h4>
        <a href="#" class="list-group-item">Hướng dẫn mua hàng</a>
        <a href="#" class="list-group-item">Câu hỏi thường gặp</a>
        <a href="#" class="list-group-item">Liên hệ với chúng tôi</a>
      </div> -->
    </div>

    <div class=" row"><span class="m-0 text-center text-dark"><i>NguyenThanhTu & NguyenHoaiThanh</i></span>
    </div>
  </div>
</footer>
</body>

</html>