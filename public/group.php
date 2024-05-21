<?php include("inc/top.php"); ?>
<?php
// Số mặt hàng trên mỗi trang
$soMatHangTrenTrang = 9; // Giả sử mỗi trang hiển thị 9 mặt hàng

// Tổng số mặt hàng
$tongSoMatHang = count($mathang); // Đây là số mặt hàng bạn có

// Tính toán số trang
$soTrang = ceil($tongSoMatHang / $soMatHangTrenTrang);

// Xác định trang hiện tại
$trangHienTai = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính toán vị trí bắt đầu và kết thúc của mặt hàng trên từng trang
$viTriBatDau = ($trangHienTai - 1) * $soMatHangTrenTrang;
$viTriKetThuc = $viTriBatDau + $soMatHangTrenTrang - 1;

// Cắt mảng $mathang để chỉ lấy phần của trang hiện tại
$mathangTrangHienTai = array_slice($mathang, $viTriBatDau, $soMatHangTrenTrang);
?>
<div class= 'container mb-5'>
<h3 class="text-primary m-3 mt-3"><?php echo $tendm; ?></h3>
<div class="row d-flex flex-nowrap overflow-auto gx-4 gx-lg-5">
    <?php
    if ($mathang != null) {
        foreach ($mathang as $m) :
    ?>
            <div class="col mb-5">
                <div class="card h-100 shadow">
                    <!-- Sale badge-->
                    <?php if ($m["giaban"] != $m["giagoc"]) { ?>
                        <div class="badge bg-warning text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
                    <?php } // end if 
                    ?>
                    <!-- Product image-->
                    <a href="index.php?action=detail&id=<?php echo $m["id"]; ?>">
                        <img class="card-img-top" src="../images/product/<?php echo $m["hinhanh"]; ?>" alt="<?php echo $m["tenmathang"]; ?>" />
                    </a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <a class="text-decoration-none" href="index.php?action=detail&id=<?php echo $m["id"]; ?>">
                                <h5 class="fw-bolder text-dark"><?php echo $m["tenmathang"]; ?></h5>
                            </a>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <?php if ($m["giagoc"] != $m["giaban"]) { ?>
                                <span class="text-muted text-decoration-line-through">
                                    <?php echo number_format($m["giagoc"]); ?>đ</span>
                            <?php } // end if  
                            ?>
                            <span class="text-danger fw-bolder"><?php echo number_format($m["giaban"]); ?>đ</span>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-success mt-auto" href="index.php?action=chovaogio&id=<?php echo $m["id"]; ?>&soluong=1">Chọn mua</a></div>
                    </div>
                </div>
            </div>
    <?php
        endforeach;
    } else {
        echo "<p>Danh sách này hiện chưa có mặt hàng. Vui lòng xem danh mục khác...</p>";
    }
    ?>
</div>
<!-- <ul class="pagination justify-content-center" style="margin:20px 0">
    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-left-fill"></i></a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#"><i class="bi bi-caret-right-fill"></i></a></li>
</ul> -->
</div>
<?php include("inc/bottom.php"); ?>