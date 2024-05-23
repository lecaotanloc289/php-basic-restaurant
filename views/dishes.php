<?php
include(__DIR__ ."../../../restaurant/config/control_form.php");
$ctrol = new control_form();
global $result;

$danh_muc_loai = $ctrol->get_danhmucloai();
?>
<div class="grid-container">
    <div class="list-menu">
        <ul class="list-danhmuc">
            <?php
            while ($row_danh_muc_loai = $danh_muc_loai->fetch_assoc()) { ?>
                <li><a href="../../restaurant/index.php?page=loaisanpham&params=<?php echo $row_danh_muc_loai['MaDanhMuc']; ?>    ">
                        <?php echo $row_danh_muc_loai['TenDanhMuc']; ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <?php
    if ( $_GET["page"] == "menu") {
        $result = $ctrol->get_monan();
    ?>
        <div class="item-container">
            <?php
            while ($row = $result->fetch_assoc()) { ?>
                <!-- Hiển thị thông tin một sản phẩm -->
                <div class="list-item">
                    <div class="item">
                        <a href="index.php?page=dish_details&detail=<?php echo $row['MaMonAn']; ?>">
                        <img src="../../restaurant/images/<?php echo $row['HinhAnh']; ?>" alt="Ảnh món ăn">
                        </a>
                        <span class="item-detail">
                            <div class="item-nameprice">
                                <p><?php echo $row['TenMonAn']; ?></p>
                                <p>Giá: <?php echo $row['Gia']; ?> VNĐ</p>
                            </div>
                            <div class="item-btn">
                                <button>Mua ngay</button>
                                <a href="index.php?page=menu&action=add&item=<?php echo $row['MaMonAn'];?>"><button>Thêm vào giỏ hàng</button></a>
                            </div>
                        </span>
                    </div>
                </div>
            <?php } ?>

            <!-- Thêm sản phẩm vào giỏ hàng  -->
            <?php 
	        if(isset($_GET['action']) && $_GET['action']=="add" && isset($_GET['item'])) { 
                $dish = $ctrol->get_chitietmonan($_GET['item'])->fetch_assoc();
               

                // Kiểm tra xem $_SESSION['cart'] đã tồn tại hay chưa
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                }

                // Lấy thông tin sản phẩm từ form hoặc từ cơ sở dữ liệu
                $product = array(
                    'name' => $dish['TenMonAn'],
                    'price' => $dish['Gia'],
                    'image' => $dish['HinhAnh'],
                    'dishID' => $dish['MaMonAn']
                    
                );

                // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
                if (isset($_SESSION['cart'][$product['dishID']])) {
                    // Nếu đã tồn tại, tăng số lượng lên 1
                    $_SESSION['cart'][$product['dishID']]['quantity'] += 1;
                } else {
                    // Nếu chưa tồn tại, thêm sản phẩm vào giỏ hàng với số lượng là 1
                    $product['quantity'] = 1;
                    $_SESSION['cart'][$product['dishID']] = $product;
                }
            }
            ?>

            <?php
            // Truy cập thông tin giỏ hàng
            //$cart = $_SESSION['cart'];

            // In thông tin giỏ hàng và số lượng sản phẩm
            // foreach ($_SESSION['cart'] as $product) {
            //     echo 'ID: ' . $product['dishID'] . '<br>';
            //     echo 'Tên sản phẩm: ' . $product['name'] . '<br>';
            //     echo 'Giá: ' . $product['price'] . '<br>';
            //     echo 'Hình ảnh: ' . $product['image'] . '<br>';
            //     echo 'Số lượng: ' . $product['quantity'] . '<br><br>';
            // }



            ?>

        </div>
    <?php } ?>
    
</div>