<?php
session_start(); // Khởi động phiên làm việc của session

if(isset($_POST)) { // Kiểm tra xem form đã được gửi đi hay chưa
    extract($_POST); // Giải nén các giá trị gửi từ form thành các biến riêng lẻ
    // include("../config/connect.php") ; // Nạp tệp tin database.php để kết nối với cơ sở dữ liệu

    // Thực hiện truy vấn SQL để lấy dữ liệu từ bảng register
    // $sql = "SELECT * FROM customer_user WHERE username=$Username AND password=$Password";
    // $result = $this->link->query($sql);
    // $row  = mysqli_fetch_array($result); // Lấy một dòng dữ liệu từ kết quả truy vấn

    include '../config/database.php';
    $sql=mysqli_query($link,"SELECT * FROM customer_user WHERE username='$Username' AND password='$Password'");
    $row  = mysqli_fetch_array($sql);

    if(is_array($row)) { // Kiểm tra xem có dòng dữ liệu nào khớp hay không
        $_SESSION["id"] = $row['id']; // Lưu trữ giá trị ID vào session
        $_SESSION["username"] = $row['username']; // Lưu trữ giá trị ID vào session
        $_SESSION["password"] = $row['password']; // Lưu trữ giá trị ID vào session
        $_SESSION["name"] = $row['name']; // Lưu trữ giá trị ID vào session
        $_SESSION["email"] = $row['email']; // Lưu trữ giá trị Email vào session
        $_SESSION["address"] = $row['address']; // Lưu trữ giá trị First_Name vào session
        $_SESSION["level"] = $row['level']; // Lưu trữ giá trị Last_Name vào session

        header("Location: ../index.php"); // Chuyển hướng đến trang index.php
    } else {
        echo "Invalid Email ID/Password"; // In ra thông báo khi email hoặc mật khẩu không khớp
    }
}
?>
