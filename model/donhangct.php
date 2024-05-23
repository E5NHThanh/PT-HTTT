<?php
class DONHANGCT
{

	// Thêm chi tiết đơn hàng mới, trả về mhóa của dòng mới thêm
	public function themchitietdonhang($donhang_id, $mathang_id, $dongia, $soluong, $thanhtien)
	{
		$db = DATABASE::connect();
		try {
			$sql = "INSERT INTO donhangct(donhang_id, mathang_id, dongia, soluong, thanhtien) 
					VALUES(:donhang_id, :mathang_id, :dongia, :soluong, :thanhtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':donhang_id', $donhang_id);
			$cmd->bindValue(':mathang_id', $mathang_id);
			$cmd->bindValue(':dongia', $dongia);
			$cmd->bindValue(':soluong', $soluong);
			$cmd->bindValue(':thanhtien', $thanhtien);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	public function laydonhangct()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT donhangct.id, donhangct.donhang_id, 
			mathang.tenmathang AS mathang_id, 
			donhangct.dongia, donhangct.soluong, donhangct.thanhtien 
			FROM donhangct 
			INNER JOIN mathang ON donhangct.mathang_id = mathang.id;
			";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }



    public function laydonhangcttheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT 
        hdc.id,
        hdc.donhang_id,
        kh.tenmathang AS mathang_ten,
        hdc.dongia,
        hdc.soluong,
        hdc.thanhtien,
        nd.hoten AS hoten_nguoidung
    FROM 
        donhangct hdc
    LEFT JOIN 
        mathang kh ON hdc.mathang_id = kh.id
    LEFT JOIN 
        donhang hd ON hdc.donhang_id = hd.id
    LEFT JOIN 
        nguoidung nd ON hd.nguoidung_id = nd.id
    WHERE 
        hdc.donhang_id = :id
    "; // Thay đổi từ hdc.id thành hdc.donhang_id
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
