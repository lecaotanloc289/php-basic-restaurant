<?php
include(__DIR__ . "/../config/control_form.php");
$ctrol = new control_form();
global $result;

$danh_muc_loai = $ctrol->get_danhmucloai();
?>
<div class="grid-container">
    <div class="list-menu">
        <ul class="list-danhmuc">
            <?php
            while ($row_danh_muc_loai = $danh_muc_loai->fetch_assoc()) { ?>
                <li><a href="../restaurant/index.php?page=loaisanpham&params=<?php echo $row_danh_muc_loai['MaDanhMuc']; ?>">
                        <?php echo $row_danh_muc_loai['TenDanhMuc']; ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <?php
    if (isset($_GET["params"])) {
        $result = $ctrol->get_loaimon($_GET["params"]);
    ?>
        <div class="item-container">
            <?php
            while ($row = $result->fetch_assoc()) { ?>
                <!-- Hiển thị thông tin một sản phẩm -->
                <div class="list-item">
                    <div class="item">
                        <a href="../index.php?page=dish_details&detail=<?php echo $row['MaMonAn'] ?>">
                        <img src="../../restaurant/images/<?php echo $row['HinhAnh']; ?>" alt="Ảnh món ăn">
                        </a>
                        <span class="item-detail">
                            <div class="item-nameprice">
                                <p><?php echo $row['TenMonAn']; ?></p>
                                <p>Giá: <?php echo $row['Gia']; ?> VNĐ</p>
                            </div>
                            <div class="item-btn">
                                <button>Mua ngay</button>
                                <button>Thêm vào giỏ hàng</button>
                            </div>
                        </span>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>