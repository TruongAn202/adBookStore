<div id="content">
        <div id="banner-school">
            <div class="overlay"></div>
            <div id="gr-td-dk">
                <h1 id="duongke">|</h1>
                <h1 id="tieude-banner">GIỎ HÀNG</h1>
            </div>
            
        </div>
        <div id="background-ctgh">
            <div id="sevices">
              <div id="place">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                  <li class="breadcrumb-item active">Giỏ hàng</li>
                  
              </ol>
                  <div class="breadcrumb-container">
                    <h4 id="tieude-khoahoc">Giỏ hàng</h4>
                    <hr class="border border-warning border-3 opacity-75">
                  <br>
                  </div>
            </div>
                
                
            <div class="container">
            <?php
                if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                    $i = 0;
                    foreach ($_SESSION['giohang'] as $item) {
                        extract($item);
                        $linkdel = "index.php?pg=delcart&ind=" . $i; 
                        echo '<div class="card mb-3 col-lg-8 product-item-hoadon" data-price="' . $giaKM . '">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img id="ImgSpChitietgiohang" src="view/layout/assets/image/' . $anh . '" class="img-fluid rounded-start" alt="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body"> 
                                        <h4 class="card-title">' . $tenSach . '</h4>
                                        <p class="card-text">' . $tenTG . '</p>
                                        <div class="ql-tanggiam-price">
                                            <div class="tangiam">
                                                <button class="decrease qtybtn">-</button>
                                                <input type="text" value="' . $soLuong . '" class="hienthi">
                                                <button class="increase qtybtn">+</button>
                                            </div>
                                            <div class="ql-price">
                                                <div class="price">' . $giaKM . 'đ</div>
                                                <div class="old-price">' . $gia . 'đ</div>
                                            </div>
                                        </div>
                                        <a href="' . $linkdel . '" class="delete-item" title="Xóa sản phẩm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $i++;
                    }
                } else {
                    echo '<div class="container">
                            <div class="alert alert-warning text-center mt-5" role="alert">
                                <i class="bi bi-cart-x fs-1"></i>
                                <h4 class="mt-3">Giỏ hàng của bạn hiện đang trống.</h4>
                                <p>Hãy thêm sản phẩm vào giỏ để tiếp tục mua sắm!</p>
                                <a href="index.php" class="btn btn-tieptuc mt-3">Quay lại cửa hàng</a>
                            </div>
                        </div>
                        ';
                }
                ?>
                <div class="right col-lg-4">
                    <h4>Hóa đơn</h4>
                    <ul>
                        <li><div>Giảm giá</div><div id="tien-hd1">Không áp dụng</div></li>
                        <hr>
                        <li><div>Mã giảm giá</div><div id="tien-hd1">Không áp dụng</div></li>
                        <hr>
                        <li><div>Tổng cộng</div><div id="tien-hd"></div></li>
                    </ul>
                    <a  href="index.php?pg=thanhtoan">Thanh toán</a>
                </div>
            </div>
                
                <h3>Có thể bạn sẽ thích</h3>
                <div id="product-1" class="product-container">
                    <?php
                        $sachDeCuList = '';
                        foreach ($sachDeCu_List as $item){
                            extract($item);
                            echo '<div class="product ">
                                    <div class="product-image">
                                        <img src="view/layout/assets/image/'.$anh.'" alt="">
                                        <form action="index.php?pg=addcart" method="post">
                                            <input type="hidden" value="'.$maSach.'" name="maSach">
                                            <input type="hidden" value="'.$tenSach.'" name="tenSach">
                                            <input type="hidden" value="'.$anh.'" name="anh">
                                            <input type="hidden" value="'.$giaKM.'" name="giaKM">
                                            <input type="hidden" value="'.$gia.'" name="gia">
                                            <input type="hidden" value="'.$tenTG.'" name="tenTG">
                                            <input type="hidden" value="1" name="soLuong">
                                            <input type="submit" value="Thêm vào giỏ" name="btnaddcart" class="product-button">
                                        </form>
                                    </div>
                                    <div class="product-info">
                                        <!-- Thông tin và giá -->
                                        <p><a href="index.php?pg=chitietthongtinsach&maSach='.$maSach.'">'.$tenSach.'</a></p>
                                        <div class="mo-ta">'.$tenNXB.'</div>
                                        <div class="tac-gia">'.$tenTG.'</div>
                                        <div class="ql-price">
                                            <div class="price">'.$giaKM.'đ</div>
                                            <div class="old-price">'.$gia.'0đ</div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    ?>

                </div>
                <!-- <button id="prevButton">Qua trái</button>
                <button id="nextButton">Qua phải</button> -->
            </div>
        </div>
    </div>
    <script>
           document.querySelectorAll('.product-item-hoadon').forEach(function (productItem) {
            const priceElement = productItem.querySelector('.price');
            const pricePerUnit = parseFloat(priceElement.textContent.replace(/[^\d.-]/g, ''));

            const decreaseBtn = productItem.querySelector('.decrease');
            const increaseBtn = productItem.querySelector('.increase');
            const quantityInput = productItem.querySelector('.hienthi');

            decreaseBtn.addEventListener('click', function () {
                let currentQuantity = parseInt(quantityInput.value) || 1;
                if (currentQuantity > 1) {
                    currentQuantity--;
                    quantityInput.value = currentQuantity;
                    updateOverallTotal();
                }
            });

            increaseBtn.addEventListener('click', function () {
                let currentQuantity = parseInt(quantityInput.value) || 1;
                currentQuantity++;
                quantityInput.value = currentQuantity;
                updateOverallTotal();
            });

            function updateOverallTotal() {
                let overallTotal = 0;
                document.querySelectorAll('.product-item-hoadon').forEach(function (item) {
                    const itemPrice = parseFloat(item.querySelector('.price').textContent.replace(/[^\d.-]/g, '')) || 0;
                    const quantity = parseInt(item.querySelector('.hienthi').value) || 1;
                    overallTotal += itemPrice * quantity;
                });
                document.querySelector('#tien-hd').textContent = formatCurrency(overallTotal);
            }

            function formatCurrency(amount) {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
            }

            updateOverallTotal(); // Cập nhật tổng cộng khi load trang.
        });


                            
    </script>