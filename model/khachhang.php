<?php
class KHACHHANG
{

	// Thêm khách hàng mới, trả về khóa của dòng mới thêm
	public function themkhachhang($email, $sodt, $hoten)
	{
		$db = DATABASE::connect();
		try {
			$sql = "INSERT INTO nguoidung(email,matkhau,sdt,hoten,loai,trangthai,diachi) VALUES(:email,:matkhau,:sodt,:hoten,3,1,:diachi)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email', $email);
			$cmd->bindValue(':matkhau', md5($sodt));
			$cmd->bindValue(':sodt', $sodt);
			$cmd->bindValue(':hoten', $hoten);
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	public function themdangky($email, $sodienthoai, $matkhau, $hoten, $hinhanh, $gioitinh, $diachi, $namsinh)
	{
		$db = DATABASE::connect();
		try {
			// Kiểm tra xem email đã tồn tại chưa
			$sql_check = "SELECT COUNT(*) FROM nguoidung WHERE email = :email";
			$cmd_check = $db->prepare($sql_check);
			$cmd_check->bindValue(':email', $email);
			$cmd_check->execute();
			$count = $cmd_check->fetchColumn();

			if ($count > 0) {
				echo "<p>Email đã tồn tại</p>";
				return false;
			} else {
				// Chèn người dùng mới vào bảng nguoidung
				$sql = "INSERT INTO nguoidung(email, matkhau, sodienthoai, hoten, loai, trangthai, hinhanh, gioitinh, diachi,namsinh) 
                    VALUES(:email, :matkhau, :sodienthoai, :hoten, 3, 1, :hinhanh, :gioitinh, :diachi, :namsinh)";
				$cmd = $db->prepare($sql);
				$cmd->bindValue(':email', $email);
				$cmd->bindValue(':matkhau', md5($matkhau)); // Lưu mật khẩu dưới dạng MD5 (nên cân nhắc sử dụng hàm băm mạnh hơn như bcrypt)
				$cmd->bindValue(':sodienthoai', $sodienthoai);
				$cmd->bindValue(':hoten', $hoten);
				$cmd->bindValue(':hinhanh', $hinhanh);
				$cmd->bindValue(':gioitinh', $gioitinh);
				$cmd->bindValue(':diachi', $diachi);
				$cmd->bindValue(':namsinh', $namsinh);
				$cmd->execute();
				$id = $db->lastInsertId();
				return $id;
			}
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	public function kiemtrakhachhanghople($email, $matkhau)
	{
		$db = DATABASE::connect();
		try {
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau  AND loai=3 AND trangthai=1";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->bindValue(":matkhau", md5($matkhau));
			$cmd->execute();
			$valid = ($cmd->rowCount() == 1);
			$cmd->closeCursor();
			return $valid;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// lấy thông tin người dùng có $email
	public function laythongtinkhachhang($email)
	{
		$db = DATABASE::connect();
		try {
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND loai=3";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->execute();
			$ketqua = $cmd->fetch();
			$cmd->closeCursor();
			return $ketqua;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	function demkhachhang()
	{
		return count($_SESSION['nguoidung']);
	}
}
