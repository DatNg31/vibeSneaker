<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "websitebangiay";

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $database);

// Kiểm tra
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



// xoa
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql_xoa = " Delete from danhmuc where danhmuc_id = '" . $id . "' ";
  mysqli_query($conn, $sql_xoa);
  echo "<script>alert('Bạn đã xóa thành công!')
      </script>";
  echo "<script>window.history.back();</script>";
}
