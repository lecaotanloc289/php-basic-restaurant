<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/Logo.jpg">
    <link rel="stylesheet" href="../../restaurant/css/main.css">
    <link rel="stylesheet" href="../../restaurant/css/details.css">
    <link rel="stylesheet" href="../../restaurant/css/<?php if (isset($_GET['page'])) echo $_GET["page"]; ?>.css">
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <title>Hasa Restaurant</title>
</head>

<body style="position: relative;">

    <header style="position: fixed;" class="header">
        <div class="header__navbar">
            <div>
                <a href="../restaurant/index.php">
                    <img class="header__navbar-img" src="images/logoNH.png">
                </a>
            </div>
            <h1 class="header__navbar-name">H.A.S.A</h1>


            <ul class="header__navbar-list" style="color: #323232;">
                <li class="header__navbar-items "><a href="../restaurant/index.php">HOME</a></li>
                <li class="header__navbar-items "><a href="../restaurant/index.php?page=table">ĐẶT BÀN</a></li>
                <li class="header__navbar-items"><a href="../restaurant/index.php?page=menu">MENU</a></li>
                <li class="header__navbar-items"><a href="../restaurant/index.php?page=sale">SALE</a></li>
                <li class="header__navbar-items"><a href="../restaurant/index.php?page=contact">CONTACT</a></li>
            </ul>

            <ul class="header__navbar-list">
                <li class="header__navbar-items">
                    <a class="header___navbar-items-link">
                        <i id="user_icon" class="fa-solid fa-user "></i>
                        <?php
                        if (count($_SESSION) > 0 && isset($_SESSION['name'])) {
                            echo $_SESSION['name'];
                        }
                        ?>
                    </a>
                    <ul class="subnav">
                        <li><a href="../restaurant/index.php?page=account_details.php"> <i class="ti-user"></i> Account</a></li>
                        <li><a href="../restaurant/index.php?page=cart"> <i class="ti-shopping-cart"></i> Shopping cart</a></li>
                        <li><a id="logout" href="../restaurant/views/logout.php"> <i class="ti-arrow-circle-left"></i> Log out</a></li>
                    </ul>

                </li>

                <!-- LOGIN -->
                <li class="header__navbar-items">
                    <a style="color:white;" href="../restaurant/index.php?page=login">
                        <button id="order-btn" class="header___navbar-items-link-btn">
                            ORDER ONLINE
                        </button>
                    </a>
                </li>
            </ul>
        </div>
        <script>
            // Lấy đối tượng button bằng ID
            var userShow = document.getElementById("user_icon");
            var orderButton = document.getElementById("order-btn");
            var logout = document.getElementById("logout");

            // Thêm class "myClass" vào đối tượng button
            userShow.classList.remove("ti-face-smile");
            logout.addEventListener('click', function(event) {
            })
        </script>


        <?php
        if (isset($_SESSION['id'])) {
        ?>
            <script>
                orderButton.style.display = 'none';
                userShow.classList.add("ti-face-smile");
            </script>

        <?php
        }
        ?>
    </header>
    <div class="space-position" style="padding-top:100px;">

    </div>
    <div class="content">