    <div id="sale" class="contain_Seller-container">
        <div class="content_Seller-container">
            <div class="content__Seller">

                <div class="content__Seller-name" style="background: url('images/bestseller.png') center/cover no-repeat;">

                </div>

                <div class="content__Seller-list">
                    <div class="Seller-items">
                        <img src="images/mon1.jpg" class="food-img">
                        <p class="items-name">Món 1</p>
                        <p class="item-cost"> Giá: 9$</p>
                    </div>

                    <div class="Seller-items">
                        <img src="images/mon2.jpg" class="food-img">
                        <p class="items-name">Món 2</p>
                        <p class="item-cost"> Giá: 9$</p>
                    </div>

                    <div class="Seller-items">
                        <img src="images/mon3.jpg" class="food-img">
                        <p class="items-name">Món 3</p>
                        <p class="item-cost"> Giá: 9$</p>
                    </div>

                    <div class="Seller-items">
                        <img src="images/mon4.jpg" class="food-img">
                        <p class="items-name">Món 4</p>
                        <p class="item-cost"> Giá: 9$</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slideshow">
        <img class="slide" src="https://file.hstatic.net/1000166699/article/hau_9k_slide_blog_8567f8a7e57e401083701ef7ac8796a3_grande.jpg">
        <img class="slide" src="https://file.hstatic.net/1000166699/article/dat_ban_sinh_nhat_tang_pizza_tom_hum_blog_fceaf21687c04fd3bdc52a2b5d8929d4_grande.jpg">
        <img class="slide" src="https://file.hstatic.net/1000166699/article/thu_3_vui_ve_blog_9415fb6bf0f54387a995599f24000347_grande.jpg">
        <!-- Add more images here -->
        <a class="prev">&#10094;</a>
        <a class="next">&#10095;</a>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var slides = document.getElementsByClassName("slide");
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }

            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Thay đổi hình ảnh sau mỗi 2 giây
        }

        document.querySelector(".prev").addEventListener("click", function() {
            slideIndex--;
            if (slideIndex < 1) {
                slideIndex = slides.length;
            }
            showSlides();
        });

        document.querySelector(".next").addEventListener("click", function() {
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }
            showSlides();
        });
    </script>