<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $message = $_POST["message"];

  $connect = new mysqli('localhost', 'root', '', 'restaurant');

  $sql = "INSERT INTO `contact` (`name`, `email`, `phone`, `message`) VALUES ('$name', '$email', '$phone', '$message')";

  if (mysqli_query($connect, $sql)) {
    echo "Thêm dữ liệu thành công";
    header('Location: ../index.php');
  } else {
    echo "Lỗi: " . $connect->error;
  }

  $connect->close();
}

?>
