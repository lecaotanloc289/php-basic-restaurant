<?php
require('../restaurant/config/control_form.php');
$control = new control_form();

if (isset($_SESSION['BanDaChon']))
    $_GET['item'] = $_SESSION['BanDaChon'];
?>

<div id="table-wrap" class="table-wrap">
    <form class="time-form" action="" method="post">
        <label for="datetime">Chọn thời gian đặt bàn</label>
        <input type="datetime-local" name="Datetime" id="datetime">
        <label for="select_table">Chọn bàn</label>
        <select name="Select_table" id="select-table">
            <option value="2 Người">Bàn 2 người</option>
            <option value="4 Người">Bàn 4 người</option>
            <option value="6 Người">Bàn 6 người</option>
            <option value="8 Người">Bàn 8 người</option>
            <option value="All">Tất cả bàn</option>
        </select>
        <input type="submit" value="Xác nhận">
    </form>
    <?php
    // session_start();
    // $_SESSION['Select_table'] = 0;
    if (isset($_POST)) {
        extract($_POST);
        global $people;
        if (count($_POST) > 0) {
            $_SESSION['Datetime'] = $_POST['Datetime'];
            $_SESSION['Select_table'] = $_POST['Select_table'];
            $people = $_POST['Select_table'];
        } else $people = "All";

        $query = $control->get_ban_trong($people); ?>

        <div id="item-container" class="item-container">
            <?php
            while ($row = $query->fetch_assoc()) { ?>
                <!-- Hiển thị thông tin một sản phẩm -->
                <div class="list-item">
                    <div class="item">
                        <a href="#">
                            <img src="../../restaurant/images/ban4nguoi.jpg" <?php //echo $row['HinhAnh']; 
                                                                                ?> alt="Ảnh bàn">
                        </a>
                        <span class="item-detail">
                            <div class="item-nameprice">
                                <p>Giá: <?php echo number_format($row['GiaPhong'], 0, ',', '.'); ?> VNĐ</p>
                                <p>Sức chứa: <?php echo $row['SucChua']; ?> </p>
                                <p>Trạng thái: <?php echo $row['TrangThai']; ?></p>
                            </div>
                            <div class="item-btn">
                                <a href="../../restaurant/index.php?page=table&item=<?php echo $row['MaPhong'] ?>"><button>Chọn bàn</button></a>
                            </div>
                        </span>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php }    ?>



</div>
<?php
if (isset($_GET['item'])) {
    $_SESSION['BanDaChon'] = $_GET['item'];
    $query = $control->get_chitietban($_GET['item']);
    $row = $query->fetch_assoc();
?>
    <script>
        var itemContainer = document.getElementById("table-wrap");
        itemContainer.style.display = 'none';
    </script>

    <div class="dish-detail">
        <img src="../../restaurant/images/ban4nguoi.jpg" alt="Ảnh sản phẩm" class="dish-img">

        <div class="dish-detail-item">
            <div>
                <div class="dish-name">Loại bàn:
                    <?php echo $row['SucChua']; ?>
                </div>

                <div class="dish-discription">
                    <h2>Số bàn: <?php echo $row['MaPhong']; ?></h2>
                    <h2>Trạng thái: <?php echo $row['TrangThai']; ?></h2>
                </div>

                <div class="wrap-price-quantity">
                    <div class="product-money">
                        <label class="product-label-money" for="">Đơn giá</label>
                        <div class="price-pro">
                            <span><?php echo number_format($row['GiaPhong'], 0, ",", ".");
                                    ?> đ</span>
                        </div>
                    </div>
                    <div class="product-quantity__wrap">
                        <label class="product-label-money" for="">Loại bàn</label>
                        <div class="price-pro">
                            <span><?php echo $row['SucChua']; ?></span>
                        </div>
                    </div>

                </div>

                <div class="dish-func-btn">
                    <a href="../../restaurant/controllers/payment-table.php"><button class="add-cart-btn"><i class="ti-shopping-cart-full"></i> Thanh toán ngay</button></a>
                    <a href="../../restaurant/index.php?page=menu"><button class="buy-now-btn">Chọn thêm món ăn</button></a>
                </div>
            </div>

        </div>
    </div>
    <?php

    if (isset($_SESSION['cart'])) {
        //Truy cập thông tin giỏ hàng
        $cart = $_SESSION['cart'];
        $_SESSION['totalmoney'] = 0;
         ?>
        <div>
            <div class="bodycontainer">
                <div class="bodyitem1">
                    <div class="produce">Sản phẩm</div>
                    <div class="price">Giá tiền </div>
                    <div class="quantity">Số lượng</div>
                    <div class="totalmoney">Thành tiền</div>
                </div>
                <?php
                //In thông tin giỏ hàng và số lượng sản phẩm
                foreach ($_SESSION['cart'] as $product) {
                    $_SESSION['totalmoney'] += (float)$product['price'] * (float)$product['quantity'];
                    // echo 'ID: ' . $product['dishID'] . '<br>';
                    // echo 'Tên sản phẩm: ' . $product['name'] . '<br>';
                    // echo 'Giá: ' . $product['price'] . '<br>';
                    // echo 'Hình ảnh: ' . $product['image'] . '<br>';
                    // echo 'Số lượng: ' . $product['quantity'] . '<br><br>'; 
                ?>
                    <div class="bodyitem2">
                        <div class="produce-detail">
                            <img src="../../restaurant/images/<?php echo $product['image']; ?>" alt="" class="produceimg">
                            <div class="producecontainer">
                                <h3 class="product-name">
                                    <?php echo $product['name'] ?>
                                </h3>
                                <button type="button" class="producedelete">Xóa</button>
                            </div>
                            <span class="produceprice"> <?php echo $product['price']; ?> </span>
                            <span class="producequantity"> <?php echo $product['quantity']; ?> </span>
                            <span class="producetotal"> <?php echo ((float)$product['price'] * (float)$product['quantity']); ?> </span>
                        </div>
                    </div>
                <?php } ?>
                <div class="bodyitem2 payment-container">
                    <span>Tổng tiền: <?php echo $_SESSION['totalmoney'] ?> </span> <br>
                    <span>Giảm giá: 0 % </span><br>
                    <span>Thành tiền: <?php echo $_SESSION['totalmoney'] ?> </span><br>
                    <div class="payment-btn">
                        <button type="button">Thanh toán</button>
                    </div>
                </div>
            <?php } ?>


            </div>
        </div>
    <?php } ?>