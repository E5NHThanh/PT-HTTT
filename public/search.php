<?php
require_once( "../model/mathang.php");
// Kiểm tra xem có từ khóa được gửi từ trình duyệt không
if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];

    // Tạo một đối tượng HOCVIEN để tìm kiếm học viên
    $s = new MATHANG();
    $result = $s->timkiemmathang($keyword);

    // Kiểm tra xem có kết quả tìm kiếm hay không
    if (!empty($result)) {
        // Hiển thị các gợi ý
        foreach ($result as $item) {
            echo "<div class='suggestion-item'>";
            echo "<img src='../images/product/{$item['hinhanh']}' alt='{$item['tenmathang']}' width='40' height='40'>";
            echo "<a class='text-item' href='index.php?action=detail&id={$item['id']}'>{$item['tenmathang']}</a>";
            echo "</div>";
        }
    } else {
        // Hiển thị thông báo nếu không có kết quả
        echo "<div class='no-result-message'>Không tìm thấy kết quả cho '$keyword'</div>";
    }
}
?>
