<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <!-- Footer-->
    <footer class="py-6 text-center" style="background-color: #87CEFA;">
        <div id="backToTopBtnContainer">
            <i id="backToTopBtn" class="fas fa-arrow-up"></i>
        </div>
        <style>
        #backToTopBtnContainer {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
        }

        #backToTopBtn {
            display: none;
            background-color: #007bff;
            color: white;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 15px;
            border-radius: 50%;
            font-size: 16px;
        }
        </style>

        <script>
        window.addEventListener('scroll', function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById('backToTopBtn').style.display = 'block';
            } else {
                document.getElementById('backToTopBtn').style.display = 'none';
            }
        });

        document.getElementById('backToTopBtn').addEventListener('click', function() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
        </script>
        <div class="container p-3">
            <div class="row">
                <div class="col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.627229143731!2d105.42976397524355!3d10.371661066528818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a731e7546fd7b%3A0x953539cd7673d9e5!2sAn%20Giang%20University!5e0!3m2!1sen!2s!4v1702791933071!5m2!1sen!2s"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 text-left">
                    <div class="mb-3 text-light">
                        <a href="index.php" class="text-decoration-none text-white">
                            <h4 class="text-dark">
                                <i class="fa-solid fa-store"></i>
                                <span class="badge text-white bg-info">T</span>
                                <span class="badge text-white bg-danger">H</span>
                                <span class="badge text-white bg-warning">A</span>
                                <span class="badge text-white bg-secondary">S</span> Photography
                            </h4>
                        </a>
                        <p style="color: black;"><b><i>Địa chỉ:</i></b>18 Ung văn khiêm, Phường Đông Xuyên, Thành phố
                            Long Xuyên,tỉnh An Giang<br>
                            <b><i>Điện thoại:</i></b> 0379 111556<br>
                            <b><i>Email:</i></b> nguyenhoaithanh.05042002@gmail.com
                        </p>
                    </div>
                    <div class="row rounded">
                        <div class="col-6 ">
                            <h4 class="text-dark">DANH MỤC HÀNG</h4>
                            <ul style="list-style-type: none;" class="mb-3 list-group " width='40px'>
                                <?php foreach ($danhmuc as $d) : ?>
                                <li><a class="list-group-item p-2 text-secondary"
                                        href="?action=group&id=<?php echo $d['id']; ?>">
                                        <?php echo $d['tendongmay']; ?>
                                    </a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-1">
                    <span class="text-center text-danger"><i>NguyenThanhTu & NguyenHoaiThanh</i></span>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>