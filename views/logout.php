<!-- Đăng xuất -->
<?php
    session_start();
    // echo var_dump($_SESSION);
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['address']);
    unset($_SESSION['level']);

    header("Location: ../index.php");
?>



