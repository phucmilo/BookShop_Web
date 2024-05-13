<?php
require('config.php');
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
if (!$conn) {
	die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8');
/*
Sử dụng cấu lệnh insert, update, insert
*/
function execute($sql)
{
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	if (!$conn) {
		die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
	}

	mysqli_set_charset($conn, 'utf8');
	$result = mysqli_query($conn, $sql);

	mysqli_close($conn);

	return $result;
}
function executeResult($sql)
{
	// Kiểm tra kết nối
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	if (!$conn) {
		die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
	}

	mysqli_set_charset($conn, 'utf8');
	// Xử lý câu truy vấn
	$result = mysqli_query($conn, $sql);
	$data = [];
	while (($row = mysqli_fetch_array($result, 1)) != null) {
		$data[] = $row;
	}

	// Đóng kết nối
	mysqli_close($conn);

	return $data;
}

function checkConnection()
{
	// Kết nối cơ sở dữ liệu
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

	// Kiểm tra kết nối
	if (!$conn) {
		die("Không thể kết nối đến cơ sở dữ liệu: " . mysqli_connect_error());
	} else {
		echo "Kết nối đến cơ sở dữ liệu thành công!";
	}

	// Đóng kết nối
	mysqli_close($conn);
}
