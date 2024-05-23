
<?php
require("../model/database.php");
require("../model/danhmuc.php");
require("../model/mathang.php");
require("../model/giohang.php");
require("../model/khachhang.php");
require("../model/diachi.php");
require("../model/donhang.php");
require("../model/donhangct.php");

$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();
$mh = new MATHANG();
$mathangxemnhieu = $mh->laymathangxemnhieu();

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "null";
}


switch ($action) {
    case "null":
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "group":
        if (isset($_REQUEST["id"])) {
            $madm = $_REQUEST["id"];
            $dmay = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmay["tendongmay"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("group.php");
        } else {
            include("main.php");
        }
        break;
    case "detail":
        if (isset($_GET["id"])) {
            $mahang = $_GET["id"];
            // tăng lượt xem lên 1
            $mh->tangluotxem($mahang);
            // lấy thông tin chi tiết mặt hàng
            $mhct = $mh->laymathangtheoid($mahang);
            // lấy các mặt hàng cùng danh mục
            $madm = $mhct["danhmuc_id"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("detail.php");
        }
        break;
    case "chovaogio":
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
        }
        if (isset($_REQUEST["soluong"])) {
            $soluong = $_REQUEST["soluong"];
        } else {
            $soluong = 1;
        }

        if (kiemtraTonTaiTrongGio($id)) {
            hienthiThongBao("Sản phẩm này bạn đã có trong giỏ hàng rồi!");
        } else {
            themhangvaogio($id, $soluong);
        }

        $giohang = laygiohang();
        include("cart.php");
        break;


    case "giohang":
        $giohang = laygiohang();
        include("cart.php");
        break;

    case "capnhatgio":
        if (isset($_REQUEST["mh"])) {
            $mh = $_REQUEST["mh"];
            foreach ($mh as $id => $soluong) {
                if ($soluong > 0)
                    capnhatsoluong($id, $soluong);
                else
                    xoamotmathang($id);
            }
        }
        $giohang = laygiohang();
        include("cart.php");
        break;

    case "gioithieu":
        include("intro.php");
        break;

    case "xoagiohang":
        xoagiohang();
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "thanhtoan":
        $giohang = laygiohang();
        include("checkout.php");
        break;
    case "luudonhang":
        if (!isset($_SESSION["khachhang"])) {
            $email = $_POST["txtemail"];
            $hoten = $_POST["txthoten"];
            $sdt = $_POST["txtdienthoai"];

            // lưu thông tin khách nếu chưa có trong db (kiểm tra email có tồn tại chưa)
            // xử lý thêm...
            $kh = new KHACHHANG();
            $khachhang_id = $kh->themkhachhang($email, $sdt, $hoten);
        } else {
            $khachhang_id = $_SESSION["khachhang"]["id"];

            //$dc = new DIACHI();
            //$diachi = $dc->laydiachikhachhang($khachhang_id);            
            //$diachi_id = $diachi["id"];
        }


        // lưu đơn hàng
        $dh = new DONHANG();
        $tongtien = tinhtiengiohang();
        $donhang_id = $dh->themdonhang($khachhang_id, $tongtien);

        // lưu chi tiết đơn hàng
        if ($donhang_id) {
            // lưu chi tiết đơn hàng
            $ct = new DONHANGCT();
            $giohang = laygiohang();
            foreach ($giohang as $id => $mh) {
                $dongia = $mh["giaban"];
                $soluong = $mh["soluong"];
                $thanhtien = $mh["thanhtien"];
                $ct->themchitietdonhang($donhang_id, $id, $dongia, $soluong, $thanhtien);
                $mh = new MATHANG();
                $mh->capnhatsoluong($id, $soluong);
            }
            xoagiohang();
            // chuyển đến trang cảm ơn
            include("message.php");
        } else {
            // Xử lý lỗi khi không thể thêm đơn hàng
            echo "Lỗi: Không thể thêm đơn hàng.";
        }
        break;


    case "tiemkiem":
        include("search.php");
        break;

    case "dangnhap":
        include("loginform.php");
        break;

    case "xldangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $kh = new KHACHHANG();
        if ($kh->kiemtrakhachhanghople($email, $matkhau) == TRUE) {
            $_SESSION["khachhang"] = $kh->laythongtinkhachhang($email);
            // đọc thông tin (đơn hàng) của 
            include("info.php");
        } else {
            //$tb = "Đăng nhập không thành công!";
            include("loginform.php");
        }
        break;
    case "thongtin":
        // đọc thông tin các đơn của khách
        include("info.php"); // trang info.php hiển thị các đơn đã đặt
        break;

    case "dangxuat":
        unset($_SESSION["khachhang"]);
        // chuyển về trang chủ
        /*        // xử lý phân trang
        $tongmh = $mh->demtongsomathang();   // tổng số mặt hàng
        $soluong = 4;                           // số lượng mh hiển thị trên trang 
        $tongsotrang = ceil($tongmh/$soluong);  // tổng số trang
        if(!isset($_REQUEST["trang"]))          // trang hiện hành: mặc định là trang đầu
            $tranghh = 1;   
        else                                    // hoặc hiển thị trang do người dùng chọn
            $tranghh = $_REQUEST["trang"];
        if($tranghh > $tongsotrang)
            $tranghh = $tongsotrang;
        else if($tranghh < 1)
            $tranghh = 1;
        $batdau = ($tranghh-1)*$soluong;          // mặt hàng bắt đầu sẽ lấy
        $mathang = $mh->laymathangphantrang($batdau, $soluong);
*/
        $mathang = $mh->laymathang();
        include("main.php");
        break;
    case "dangky":
        include("dangky.php");
        break;

    case "themdangky":
        if (!isset($_SESSION["khachhang"])) {
            $email = $_POST["txtemail"];
            $matkhau = $_POST["txtpass"];
            $hoten = $_POST["txthoten"];
            $sodienthoai = $_POST["txtsodienthoai"];
            $namsinh = $_POST["txtnamsinh"];
            $gioitinh = $_POST["txtgioitinh"];
            $diachi = $_POST["txtdiachi"];
            // Xác định thư mục lưu trữ ảnh
            $thumuc_luutru = "image/users/";

            // Tạo đường dẫn đầy đủ cho file ảnh
            $duongdan = "../" . $thumuc_luutru . basename($_FILES["txthinhanh"]["name"]);
            // Tiếp theo, bạn có thể sử dụng biến $thumuc_luutru để lưu đường dẫn trong cơ sở dữ liệu.
            // Ví dụ:
            $hinhanh = $thumuc_luutru . basename($_FILES["txthinhanh"]["name"]);

            // lưu thông tin khách nếu chưa có trong db (kiểm tra email có tồn tại chưa)
            // xử lý thêm...
            $kh = new KHACHHANG();
            $khachhang_id = $kh->themdangky($email, $sodienthoai, $matkhau, $hoten, $hinhanh, $gioitinh, $diachi, $namsinh);
        } else {
            $khachhang_id = $_SESSION["khachhang"]["id"];
        }

        include("loginform.php");
        break;

    default:
        break;
}

?>
