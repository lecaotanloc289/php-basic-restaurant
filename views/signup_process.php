<?php
    if(isset($_POST)) // kiểm tra thử có hay không
    {
        extract($_POST); // giải nén ra
        include("../../restaurant/config/database.php");
        print_r($_POST);
        var_dump($_POST);

        // Check tài khoản đã tồn tại hay chưa
        $sql = mysqli_query($link,"SELECT * FROM customer_user where username='$Username'");
        if(mysqli_num_rows($sql)>0)
        {
            echo "Email Id Already Exists"; 
            exit;
        }

        // Check mật khẩu xác nhận đã đúng với mật khẩu ban đầu hay chưa
        if(!strcmp('$Password', '$Confirm password')) {
            echo "Confirm password is incorrect!";
            exit;
        }

        // viết câu lệnh
        $query = "INSERT INTO `customer_user` (`username`, `password`, `name`, `email`, `address`, `level`) 
                                     VALUES ('$Username', '$Password', '$Fullname', '$Email', '$Address', 1)";
        // Thực thi câu lệnh SQL
        if(mysqli_query($link, $query)) {
            echo "Account is create successfully! Let's login.";
            header("Location: ../index.php?page=login");
        } else {
            echo "ERROR: " . mysqli_error($link);
        }
       

// Đóng kết nối
    }    


?>