<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/tiemkiem.js" defer></script>
    <link rel="stylesheet" type="text/css" href="css/search.css" />

    <title>Thas </title>

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

</head>

<body id="top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow">
        <div class="container px-2 px-lg-3">
            <a class="navbar-brand text-warning" href="index.php"><img class="rounded-circle  text-center" src="../images/logo.jpg" width="60px" height="60px">
                </i> Thas Photoraphy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Trang chính</a></li>
                    <li class="nav-item"><a class="nav-link active" href="?action=gioithieu">Giới thiệu</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh sách sản phẩm</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($danhmuc as $d) : ?>
                                <li><a class="dropdown-item" href="?action=group&id=<?php echo $d["id"]; ?>">
                                        <?php echo $d["tendongmay"]; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
                <nav class="navbar bg-primary-tertiary">
                    <div class="container-fluid">
                        <form method="get" class="d-flex" action="search.php">
                            <input type="search" class="form-control me-2" name="keyword" id="search-input" placeholder="Nhập sản phẩm cần tìm!" aria-label="Search">
                            <div id="search-suggestions" class="mt-5"></div>
                            <button class="btn btn-outline-danger" type="submit" id="search-button"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </nav>
                    <div class="d-flex px-3 ">
                        <?php if (isset($_SESSION["khachhang"])) { ?>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                                <li class="nav-item"><a class="nav-link text-warning" href="index.php?action=thongtin">Chào <?php echo $_SESSION["khachhang"]["hoten"]; ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?action=dangxuat">Đăng xuất</a></li>
                            </ul>
                        <?php } else { ?>
                            <a href="index.php?action=dangnhap" class="btn btn-outline-light"><i class="bi bi-person"></i> Đăng nhập</a>
                        <?php } ?> &nbsp;

                        <a href="index.php?action=giohang" class="btn btn-outline-light"><i class="bi bi-cart3"></i> Giỏ hàng <span class="badge bg-danger text-white ms-1 rounded-pill"><?php echo demhangtronggio() ?></span></a>
                    </div>
            </div>
        </div>
    </nav>

    <!-- Section-->