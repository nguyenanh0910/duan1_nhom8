<?php

class AdminDanhMuc {
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function getAllDanhMuc(){
		try {
			$sql = "SELECT * FROM `tb_danhmuc` ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" .$e->getMessage();
		}
	}
	public function themDanhMuc($ten_danh_muc, $mo_ta)
	{
			try {
					$sql = "INSERT INTO `tb_danhmuc` (`ten_danh_muc`, `mo_ta`) VALUES ('{$ten_danh_muc}', '{$mo_ta}')";
					$stmt = $this->conn->prepare($sql);
					return $stmt->execute();
			} catch (Exception $e) {
					echo "Lỗi" . $e->getMessage();
					return false;
			}
	}
	public function xoaDanhMuc($id_danh_muc){
		try {
			$sql = "DELETE FROM tb_danhmuc WHERE `tb_danhmuc`.`id_danh_muc` = {$id_danh_muc}";
			$stmt = $this->conn->prepare($sql);
			return $stmt->execute();
	} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
	}
	}
public function suaDanhMuc($id_danh_muc){
	try {
		$sql = "SELECT * FROM tb_danhmuc WHERE `tb_danhmuc`.`id_danh_muc` = {$id_danh_muc}";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetch(); 
} catch (Exception $e) {
		echo "Lỗi" . $e->getMessage();
		return false;
}
}
	public function capNhatDanhMuc($id_danh_muc, $ten_danh_muc, $mo_ta)
	{
			try {
					$sql = "UPDATE `tb_danhmuc` SET `ten_danh_muc` = '{$ten_danh_muc}', `mo_ta` = '{$mo_ta}' WHERE `tb_danhmuc`.`id_danh_muc` = {$id_danh_muc}";
					$stmt = $this->conn->prepare($sql);
					return $stmt->execute();
			} catch (Exception $e) {
					echo "Lỗi" . $e->getMessage();
					return false;
			}
	}
}

?>