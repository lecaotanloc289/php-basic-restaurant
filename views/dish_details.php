<?php
include(__DIR__ . "../../../restaurant/config/control_form.php");
$ctrol = new control_form();
$row_danh_muc_loai;
global $result;

if (isset($_GET["detail"])) {
    $result = $ctrol->get_chitietmonan($_GET["detail"]);
}
while ($row = $result->fetch_assoc()) { ?>
    <div class="dish-wrap-all">

        <div class="dish-container">
            <div class="path">
                <a href="../../restaurant/index.php"> Hasa Restaurant > </a>
                <a href="../../restaurant/index.php?page=menu"> Menu > </a>
                <a href="../../restaurant/index.php?page=loaisanpham&params=<?php echo (int)$row['LoaiMonAn']; ?>">
                    <?php
                    if ($row['LoaiMonAn'] == "1")
                        echo "Món khai vị";
                    else if ($row['LoaiMonAn'] == "2")
                        echo "Món chính";
                    else if ($row['LoaiMonAn'] == "4")
                        echo "Nước uống";
                    else if ($row['LoaiMonAn'] == "3")
                        echo "Món tráng miệng";
                    ?> >
                </a>
                <a href="#"><?php echo $row['TenMonAn']; ?></a>
            </div>
            <div class="dish-detail">
                <img src="../../restaurant/images/<?php echo $row['HinhAnh'];?>" alt="Ảnh sản phẩm" class="dish-img">

                <div class="dish-detail-item">
                    <div>
                        <div class="dish-name">
                            <?php echo $row['TenMonAn']; ?>
                        </div>

                        <div class="dish-discription">
                            <?php echo $row['MoTa'];
                            if ($row['MoTa'] == null) {
                                echo $row['TenMonAn'];
                            }
                            ?>
                        </div>

                        <div class="wrap-price-quantity">
                            <div class="product-money">
                                <label class="product-label-money" for="">Đơn giá</label>
                                <div class="price-pro">
                                    <span><?php echo number_format($row['Gia'], 0, ",", "."); ?> đ</span>
                                </div>
                            </div>
                            <div class="product-quantity__wrap">
                                <label class="product-label-money" for="">Số lượng</label>
                                <div>
                                    <button id="btnMinus" type="button" class="minus-btn">-</button>
                                    <input id="inputField" class="quantity-input " min="1" value="1" data-min="1">
                                    <button id="btnPlus" type="button" class="plus-btn">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="dish-func-btn">
                            <button class="add-cart-btn"><i class="ti-shopping-cart-full"></i> Thêm vào giỏ hàng</button>
                            <button class="buy-now-btn">Mua ngay</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script>
        // Lấy các phần tử HTML cần sử dụng
        var inputField = document.getElementById("inputField");
        var btnPlus = document.getElementById("btnPlus");
        var btnMinus = document.getElementById("btnMinus");

        // Định nghĩa hàm tăng giá trị
        function increaseValue() {
            var value = parseInt(inputField.value);
            inputField.value = value + 1;
        }

        // Định nghĩa hàm giảm giá trị
        function decreaseValue() {
            var value = parseInt(inputField.value);
            if(inputField.value <= 0) return;
            inputField.value = value - 1;
        }

        // Gán các sự kiện click cho nút cộng và nút trừ
        btnPlus.addEventListener("click", increaseValue);
        btnMinus.addEventListener("click", decreaseValue);
    </script>
<?php } ?>