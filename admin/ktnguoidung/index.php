<?php
require("../../model/database.php");
require("../../model/nguoidung.php");

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {  // chưa đăng nhập
    $action = "dangnhap";
} else {   // mặc định
    $action = "macdinh";
}

$nd = new NGUOIDUNG();


switch ($action) {
    case "macdinh":
        include("main.php");
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "xldangnhap":
        $email = $_REQUEST["txtemail"];
        $matkhau = $_REQUEST["txtmatkhau"];
        if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email); // đặt biến session
            include("main.php");
        } else {
            include("login.php");
        }
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);  // hủy biến session
        include("login.php");         // hiển thị trang login
        header("location:../../index.php");     // hoặc chuyển hướng ra bên ngoài (trang dành cho khách)
        break;
    case "hoso":
        include("profile.php");
        break;
    case "xlhoso":
        $mand = $_POST["txtid"];
        $email = $_POST["txtemail"];
        $sodienthoai = $_POST["txtdienthoai"];
        $hoten = $_POST["txthoten"];
        $hinhanh = $_POST["txthinhanh"];

        // upload file mới (nếu có)
        if ($_FILES["filehinhanh"]["name"] != "") {
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh_moi = "images/users/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn lưu csdl
            $duongdan_moi = "../../" . $hinhanh_moi; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan_moi);
            // Cập nhật đường dẫn ảnh mới
            $hinhanh = $hinhanh_moi;
        }

        // Chỉ cập nhật ảnh nếu có tập tin ảnh mới
        if ($_FILES["filehinhanh"]["name"] != "") {
            $nd->capnhatnguoidung($mand, $email, $sodienthoai, $hoten, $hinhanh);
        } else {
            // Nếu không có ảnh mới, chỉ cập nhật thông tin khác
            $nd->capnhatnguoidungKhongAnh($mand, $email, $sodt, $hoten);
        }
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        include("main.php");
        break;

    case "dangki":
        include("dangki.php");
        break;

    case "matkhau":
        include("changepass.php");
        break;
    case "doimatkhau":
        if (isset($_POST["txtemail"]) && isset($_POST["txtmatkhaumoi"]))
            $nd->doimatkhau($_POST["txtemail"], $_POST["txtmatkhaumoi"]);
        include("main.php");
        break;


    case "xlthem":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $sodienthoai = $_POST["txtdienthoai"];
        $hoten = $_POST["txthoten"];
        $loai = $_POST["loai"];
        if ($nguoidung->laythongtinnguoidung($email)) {   // có thể kiểm tra thêm số đt không trùng
            $tb = "Email này đã được cấp tài khoản!";
        } else {
            if (!$nguoidung->themnguoidung($email, $matkhau, $sodienthoai, $hoten, 3)) {
                $tb = "Không thêm được!";
            }
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();
        include("main.php");
        break;
    default:
        break;
}
