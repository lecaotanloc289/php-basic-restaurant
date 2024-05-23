<!-- HEADING -->
<?php 
session_start(); // Khởi động phiên làm việc của session

include(__DIR__ . "/views/header.php"); 
        //var_dump($_SESSION); // Sài thằng này để coi kiểu dịnh dạng của nó nè
        // print_r($_SESSION);
        //echo count($_SESSION); // sài thằng này để hiển thị user ở chỗ login
        //echo $_SESSION['name']; // Sài thằng này để lấy từng đối tượng trong $_SESSION
?>

<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case "table":
            require(__DIR__ . '/views/table.php');
            break;

        case 'menu':
            require(__DIR__ . '/views/dishes.php');
            break;

        case 'sale':
            require(__DIR__.'/views/sale.php');
            break;

        case 'contact':
            require(__DIR__ . '/views/contact.php');
            break;

        case 'login':
            require(__DIR__.'/views/login.php');
            break;

        case 'loaisanpham':
            require(__DIR__.'/views/loaisp.php');
            break;

        case 'dish_details':
            include(__DIR__.'/views/dish_details.php');
            break;

        case 'cart':
            include(__DIR__.'/views/cart.php');
            break;
    }
}

else {

    include(__DIR__ . '/views/content_QC.php');
    include(__DIR__ . '/views/bestseller.php');

}
?>
<!-- FOOTER -->
<?php include(__DIR__ . '/views/footer.php') ?>
