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
    <!-- awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

</head>

<body id="top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark  shadow-sm" style="background-color: #87CEFA; ">
        <div class="container-fluid">
            <a class="navbar-brand text-danger" href="index.php">
                <img src="../images/logo.jpg" alt="Logo" class="rounded-circle" width="40" height="40">
                Thas Photography
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item ">
                        <a class="nav-link active text-dark" aria-current="page" href="index.php">Trang chính</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-dark" href="?action=gioithieu">Giới thiệu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle text-dark" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh sách sản phẩm</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($danhmuc as $d) : ?>
                                <li>
                                    <a class="dropdown-item" href="?action=group&id=<?php echo $d['id']; ?>">
                                        <?php echo $d['tendongmay']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
                <!-- search -->
                <form class="d-flex position-relative" method="get" action="search_result.php">
                    <input class="form-control me-2" type="search" name="keyword" id="search-input" placeholder="Nhập sản phẩm cần tìm!" aria-label="Search">
                    <!-- <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button> -->
                    <div id="search-suggestions" class="position-absolute bg-white"></div>
                </form>
                <!-- end search -->
                <div class="d-flex align-items-center ms-3">
                    <?php if (isset($_SESSION["khachhang"])) { ?>
                        <span class="text-light me-2">Chào, <?php echo $_SESSION["khachhang"]["hoten"]; ?></span>
                        <a href="index.php?action=thongtin" class="btn btn-outline-light btn-sm me-2"><i class="bi bi-person"></i></a>
                        <a href="index.php?action=dangxuat" class="btn btn-outline-light btn-sm me-2"><i class="bi bi-box-arrow-right"></i></a>
                    <?php } else { ?>
                        <a href="index.php?action=dangnhap" class="btn btn-outline-light btn-sm me-2"><i class="bi bi-person"></i></a>
                    <?php } ?>
                    <a href="index.php?action=giohang" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-cart3"></i> <span class="badge bg-danger text-white ms-1 rounded-pill"><?php echo demhangtronggio(); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const searchSuggestions = document.getElementById('search-suggestions');

            searchInput.addEventListener('input', function(e) {
                const keyword = e.target.value.trim(); // Lấy từ khoá và loại bỏ khoảng trắng thừa

                // Kiểm tra nếu từ khoá không rỗng
                if (keyword !== '') {
                    fetchSuggestions(keyword);
                } else {
                    searchSuggestions.innerHTML = ''; // Nếu từ khoá rỗng, xóa gợi ý
                }
            });

            function fetchSuggestions(keyword) {
                // Gửi yêu cầu đến server để lấy gợi ý
                fetch(`search.php?keyword=${keyword}`)
                    .then(response => response.text())
                    .then(data => {
                        // Hiển thị danh sách gợi ý trong #search-suggestions
                        searchSuggestions.innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Fetch Error:', error);
                    });
            }
        });
    </script>
    <style>
        #search-suggestions {
            background-color: beige;
            border: 0px solid #1eb299;
            border-radius: 5px;
            max-height: 400px;
            overflow-y: auto;
            position: absolute;
            width: 300px;
            z-index: 1000;
            display: block;
            text-align: center;
            color: black;
            margin-left: 0px;
            margin-top: 40px;
            flex-direction: row;
            justify-content: flex-start;

        }

        #search-suggestions .suggestion-item {
            margin-bottom: 20px;
            margin-top: 20px;
            color: darkslategray;
            padding-left: 15px;
            padding-right: 15px;
            text-decoration: none;
            align-items: center;
        }

        #search-suggestions .suggestion-item:hover {
            background-color: aqua;
        }
        #search-suggestions .suggestion-item .text-item{
            text-decoration: none;
            color: black;
            padding-top: 15px;
            padding-bottom: 40px;
        }
    </style>
    <!-- Section-->