<div class="main-container mt-[70px]  w-[1200px] my-[0] mx-[auto] h-[30px]">
    <ul class="flex h-full items-center">
        <li>
            <a href="?action=index" class="text-[12px] text-[#707070] mr-[10px]  flex gap-[10px] items-center  ">
                <i class="fa-solid fa-house"></i>
                <p>Trang chủ</p>
            </a>
        </li>
        <li>
            <a href="#" class="text-[12px] text-[#707070] mr-[10px]  flex gap-[10px] items-center  ">
                <i class="fa-solid fa-chevron-right"></i>
                <p>
                    Điện thoại
                </p>
            </a>
        </li>
        <li>
            <a href="#" class="text-[12px] text-[#707070] mr-[10px]  flex gap-[10px] items-center  ">
                <i class="fa-solid fa-chevron-right"></i>
                <p>
                    <?= $product['name'] ?>
                </p>
            </a>
        </li>
    </ul>
</div>
<div class="footer-main-top shadow-menu h-[1px] w-full"></div>
<section class=" w-[1200px]  mt-[20px] mx-[auto] py-[10px]">
    <div class="header-section flex gap-[10px] items-center ">
        <h1 class="product-name line-clamp-3 text-[#0a263c] text-[18px] font-bold">
            <?= $product['name'] ?> </h1>
        <div class="box-rating flex gap-[5px] items-center ml-[10px]">
            <i class="fa-solid fa-star text-[12px] text-[#f59e0b]"></i>
            <i class="fa-solid fa-star text-[12px] text-[#f59e0b]"></i>
            <i class="fa-solid fa-star text-[12px] text-[#f59e0b]"></i>
            <i class="fa-solid fa-star text-[12px] text-[#f59e0b]"></i>
            <i class="fa-solid fa-star text-[12px] text-[#f59e0b]"></i>
            <span class="text-[16px] text-[#4a4a4a]"> <?= $product['view_count'] ?> lượt xem</span>
        </div>
    </div>
    <div class="line border-none block   mt-[10px] mb-[15px]" style="height: 2px;background-color:#f5f5f5">
    </div>
    <div class="body-section flex justify-between  ">
        <div class="section-left w-[60%]">
            <div class="product-details flex items-center  border-[1px] border-solid border-[#d1d5db] rounded-[15px] h-[400px] justify-center mb-[30px] w-[708px]
                            bg-[linear-gradient(90deg,_#dd5e89,_#f7bb97)] relative
                            ">
                <i class="fa-regular fa-heart absolute left-[10px] top-[10px] text-[13px]   "></i>
                <div class="box-product flex p-[10px] text-[14px] items-center gap-[20px] justify-start  w-full ">
                    <img class="rounded-[10px] h-[250px] p-[10px] w-[250px] bg-[#fff]"
                        src="<?= BASE_ASSETS_UPLOADS . $product['image'] ?>" alt="">
                    <div class="box-title text-[#fff]">
                        <p class="text-[18px] relative bottom-[5px] uppercase mb-[5px] font-semibold  ">
                            Tính
                            năng nổi bật
                        </p>
                        <div class="list-title-product">
                            <ul class="text-[14px] text-[#fff] max-h-[200px] overflow-y-auto list-disc list-inside">
                                <li class="mb-[5px] last:mb-0 "><?= $product['content'] ?></li>
                                <li class="mb-[5px] last:mb-0 ">Thiết kế sang trọng, đẳng cấp, khẳng định
                                    phong cách thời thượng.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details w-full shadow-menu rounded-[10px] p-[15px] mb-[10px]">
                <div class="product-details-1 bg-[#f2f2f2] rounded-[4px] w-full m-auto ">
                    <h2 class="text-[#d70018] text-[18px] font-semibold capitalize text-center">Đặc điểm nổi
                        bật của
                        <?= $product['name'] ?></h2>
                    <ul
                        class="text-[14px] text-[##4a4a4a]  overflow-y-auto list-disc list-inside text-justify p-[10px]">
                        <li class="mb-[5px] last:mb-0 "><?= $product['content'] ?></li>
                        <li class="mb-[5px] last:mb-0 ">Thiết kế sang trọng, đẳng cấp, khẳng định
                            phong cách thời thượng.</li>
                    </ul>
                </div>
                <div class="product-details-2 text-[#646464] pl-[20px] mt-[10px] relative ">
                    <div class=" h-[100%]  bg-[#e5e7eb] w-[5px] absolute left-0 top-0"></div>
                    <p class=" text-justify text-[15px] font-medium">
                        <?= $product['description'] ?>
                    </p>
                </div>
            </div>
            <div class="product-info w-full flex">
                <div class="product-info-left w-[50%] p-[.75rem]
                            ">
                    <div
                        class="box-info-product  border-[1px] border-solid border-[#e5e7eb] rounded-[10px] px-[10px] pt-[10px] w-full">
                        <div class="box-title text-[#444] text-[16px] font-bold mb-[10px] ">Thông tin sản
                            phẩm</div>
                        <div class="box-content text-[12px]">
                            <div class="item-warranty-info mb-[10px] flex gap-[10px] items-center">
                                <i class="fa-solid fa-mobile "></i>
                                <div class="description text-[14px]">Mới, đầy đủ phụ kiện từ nhà sản xuất
                                </div>
                            </div>
                            <div class="item-warranty-info mb-[10px] flex gap-[10px] items-start">
                                <i class="fa-solid fa-box relative top-[5px]"></i>
                                <div class="description text-[14px]">
                                    Điện thoại thông minh
                                    <br>
                                    2. Cáp truyền dữ liệu
                                    <br>
                                    3. Que lấy sim
                                    <br>
                                    * Galaxy S24 Ultra không bao gồm củ sạc.
                                </div>
                            </div>
                            <div class="item-warranty-info mb-[10px] flex gap-[10px] items-start">
                                <i class="fa-solid fa-shield relative top-[5px]"></i>
                                <div class="description text-[14px]">Bảo hành 12 tháng tại trung tâm bảo
                                    hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản
                                    xuất.
                                </div>
                            </div>
                            <div class="item-warranty-info mb-[10px] flex gap-[10px] items-start">
                                <i class="fa-solid fa-money-check relative  top-[5px]"></i>
                                <div class="description text-[14px]">Giá sản phẩm đã bao gồm VAT
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info-right w-[65%] p-[.75rem]">
                    <div class="box-option flex w-full gap-[10px]">
                        <button class="bg-[#fff] border-[1px] border-[solid] border-[#e5e7eb]
                                rounded-[10px] text-[14px] h-[36px] w-[50%] mb-[10px] py-[5px] px-[10px] 
                                ">
                            Hồ Chí Minh
                        </button>
                        <select name="" id="" class="bg-[#fff] border-[1px] border-[solid] border-[#e5e7eb]
                                rounded-[10px] text-[14px] h-[36px] w-[50%] mb-[10px] py-[5px] px-[10px] 
                                ">
                            <option value="" selected="selected">Quận/Huyện</option>
                            <option value=""> Quận 1 </option>
                            <option value=""> Quận 2 </option>
                            <option value=""> Quận 3 </option>
                            <option value=""> Quận 4 </option>
                        </select>
                    </div>
                    <p class="mb-[5px] text-[14px]">
                        Có <strong>41</strong> cửa hàng có sản phẩm
                    </p>
                    <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg   ">
                        <li
                            class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg text-nowrap text-[12px] truncate flex items-center gap-[5px] ">
                            <i class="fa-solid fa-phone text-[#d70018]"></i>
                            <a href="tel:02871083355" class="text-[#d70018]">02871083355</a>
                            <div class="address text-[#0864c1]">
                                - <i class="fa-solid fa-location-dot"></i>
                                <a href="#" class=" truncate underline">
                                    55B Trần Quang Khải, P. Tân Định, Q. 1</a>
                            </div>
                        </li>
                        <li
                            class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg text-nowrap text-[12px] truncate flex items-center gap-[5px] ">
                            <i class="fa-solid fa-phone text-[#d70018]"></i>
                            <a href="tel:02871083355" class="text-[#d70018]">02871083355</a>
                            <div class="address text-[#0864c1]">
                                - <i class="fa-solid fa-location-dot"></i>
                                <a href="#" class=" truncate underline">
                                    55B Trần Quang Khải, P. Tân Định, Q. 1</a>
                            </div>
                        </li>
                        <li
                            class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg text-nowrap text-[12px] truncate flex items-center gap-[5px] ">
                            <i class="fa-solid fa-phone text-[#d70018]"></i>
                            <a href="tel:02871083355" class="text-[#d70018]">02871083355</a>
                            <div class="address text-[#0864c1]">
                                - <i class="fa-solid fa-location-dot"></i>
                                <a href="#" class=" truncate underline">
                                    55B Trần Quang Khải, P. Tân Định, Q. 1</a>
                            </div>
                        </li>
                        <li
                            class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg text-nowrap text-[12px] truncate flex items-center gap-[5px] ">
                            <i class="fa-solid fa-phone text-[#d70018]"></i>
                            <a href="tel:02871083355" class="text-[#d70018]">02871083355</a>
                            <div class="address text-[#0864c1]">
                                - <i class="fa-solid fa-location-dot"></i>
                                <a href="#" class=" truncate underline">
                                    55B Trần Quang Khải, P. Tân Định, Q. 1</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="buy-product w-full pb-[10px] px-[10px] flex justify-between ">
                <div class="temp-price-product">
                    <div class="price flex">
                        <strong>Tạm tính:</strong>
                        <div class="price-number text-[#d02c35] font-semibold ml-[5px] ">
                            <?= number_format($product['price'], 0, ',', '.') ?> đ</div>
                    </div>
                    <em class="text-[#797979] text-[14px]">(Tiết kiệm 0 đ)</em>
                </div>
            </div>
        </div>
        <div class="section-right w-[40%] box-border pl-[30px]">
            <div class="list-price-memory w-full flex justify-center">
                <?php foreach ($variantsBySize as $size): ?>
                    <a href="javascript:void(0);"
                        class="border-[1px] border-solid border-[#d1d5db] flex flex-wrap items-center justify-center rounded-[8px] text-[#444] text-[12px] mb-[10px] mr-[10px] overflow-hidden py-[5px] px-[4px] w-[33.33333%] size-option"
                        data-size-id="<?= $size['size_id'] ?>" data-variant-id="<?= $size['vr_id'] ?>"
                        onclick="selectVariant(<?= $size['size_id'] ?>, 'size')">
                        <div class="phone-memory line-clamp-3 w-full font-semibold text-center">
                            <strong><?= $size['sz_size_value'] ?></strong>
                        </div>
                        <div class="price-memory">
                            <?= number_format($size['vr_variant_price_sale'], 0, ',', '.') ?>đ
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="list-color-price flex flex-wrap w-full justify-center">
                <p class="text-[14px] text-[#444] font-bold mb-[10px] w-full">
                    Chọn màu để xem giá và chi nhánh có hàng
                </p>
                <?php foreach ($variantsByColor as $color): ?>
                    <a href="javascript:void(0);"
                        class="color-option border-[1px] border-solid border-[#d1d5db] flex flex-wrap items-center justify-center rounded-[8px] text-[#444] text-[12px] mb-[10px] mr-[10px] overflow-hidden py-[5px] px-[4px] w-[30%]"
                        data-color-id="<?= $color['color_id'] ?>" data-variant-id="<?= $color['vr_id'] ?>"
                        onclick="selectVariant(<?= $color['color_id'] ?>, 'color')">
                        <div class="phone-memory line-clamp-3 w-full font-semibold text-center">
                            <strong><?= $color['cl_color_value'] ?></strong>
                        </div>
                        <div class="price-memory">
                            <?= number_format($color['vr_variant_price_sale'], 0, ',', '.') ?>đ
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>


            <div class="right-price w-full bg-[#eeeeef] rounded-[5px] mb-[10px] min-h-[65px] flex p-[5px]">
                <div class="col-6 w-[50%] flex items-center justify-center p-[5px]">
                    <div class="icon-trade h-[33px] w-[35px]">
                        <img class="w-full h-full object-cover" src="<?= BASE_ASSETS_UPLOADS ?>./img/pdp-trade-icon.png"
                            alt="">
                    </div>
                    <div class="trade-to-update ml-[3px] text-[16px] text-[#4e4e4e]">
                        <strong class="trade-price">26.990.000đ</strong>
                        <br>
                        <span class="text-[#202020] text-[13px] font-normal ">Khi thu cũ lên đời</span>
                    </div>
                </div>
                <div
                    class="col-6 w-[50%] flex items-center justify-center border-[1px] border-solid border-[red] shadow-price rounded-[5px] p-[5px] flex-wrap relative">
                    <strong
                        class="new-price text-[#fd2424] text-[16px] w-full text-center"><?= number_format($product['sale_price'], 0, ',', '.') ?>đ</strong>
                    <br>
                    <span
                        class="old-price text-[13px] font-normal line-through text-[#4e4e4e]"><?= number_format($product['price'], 0, ',', '.') ?>đ</span>
                    <div
                        class="arrow-down border-[10px] border-solid border-[transparent] border-t-[#fd2424] absolute left-[50%] translate-x-[-50%] bottom-[-35%] ">
                    </div>
                </div>
            </div>
            <div
                class="sale-smember w-full bg-[#fff3f3] border-[1px] border-solid border-[#fde2e2] rounded-[5px] p-[8px] text-[14px] text-[#262626]">
                <p>
                    Tiết kiệm thêm đến <strong class="text-[#d70018] font-bold">300.000đ</strong>
                    cho Smember
                </p>
                <p>
                    hoặc <strong class="text-[#d70018] font-bold">600.000đ</strong> cho S-Student
                </p>
                <a href="#" class="text-[#d60000] text-[12px] underline">
                    Kiểm tra giá cuối cùng của bạn
                </a>
            </div>
            <div class=" mt-[10px] right-banner w-full mr-[10px] rounded-[5px]">
                <img class="w-full rounded-[5px]" src="<?= BASE_ASSETS_UPLOADS ?>./img/banner-product.webp" alt="">
            </div>
            <div class="btn-buy-container mb-[0.75rem] mt-[0.75rem] flex flex-wrap">
                <div class="btn-buy-now w-full flex gap-[10px]">
                    <button
                        class="w-[80%] bg-[linear-gradient(#f52f32,_#e11b1e)] rounded-[10px] text-[#fff] h-[60px] mb-[10px] flex flex-col items-center justify-center ">
                        <strong>MUA NGAY</strong>
                        <span class="text-[14px]">(Giao nhanh từ 2 giờ hoặc nhận tại cửa hàng)</span>
                    </button>
                    <form method="POST" action="<?= BASE_URL ?>?act=add-to-cart"
                        class="w-[20%] rounded-[10px] border-[2px] border-solid border-[#e04040] h-[60px] flex flex-col justify-center items-center">
                        <button>
                            <img class="w-[30px] h-[30px] object-contain"
                                src="<?= BASE_ASSETS_UPLOADS ?>./img/add-to-cart.webp" alt="">
                            <span class="text-[#e04040] text-[7.5px] font-semibold">Thêm vào giỏ</span>
                        </button>
                        <input type="hidden" name="product_id" value="<?= $id ?>">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="variant_id" id="variant">
                    </form>
                </div>
                <div class="btn-installment flex w-full gap-[10px]">
                    <button class="btn-installment-money w-[50%] flex flex-col justify-center items-center
                                bg-[linear-gradient(180deg,_#3a78d0,_#277cea)] rounded-[10px] h-[60px] pb-[5px]
                                ">
                        <strong class="text-[14px] text-[#fff]">TRẢ GÓP 0%</strong>
                        <span class="text-[12px] text-[#fff]">Trả trước chỉ từ 2.799.000₫</span>
                    </button>
                    <button class="btn-installment-card w-[50%] flex flex-col justify-center items-center
                                bg-[linear-gradient(180deg,_#3a78d0,_#277cea)] rounded-[10px] h-[60px] pb-[5px]
                                ">
                        <strong class="text-[14px] text-[#fff]">TRẢ GÓP 0% QUA THẺ</strong>
                        <span class="text-[12px] text-[#fff]">(Không phí chuyển đổi 3 - 6 tháng)</span>
                    </button>
                </div>
                <div
                    class="btn-trade-update w-full rounded-[10px] bg-[#ec8104] flex flex-col text-[#fff] font-semibold p-[5px] justify-center items-center mt-[10px] h-[60px] ">
                    <strong>Thu cũ lên đời</strong>
                    <span class="text-[12px]">Chỉ từ 26.990.000đ</span>
                </div>
            </div>
            <div
                class=" box-more-sale mt-[0.75rem] mb-[0.75rem] w-full border-[1px] border-solid border-[#d1d5db] rounded-[10px] overflow-hidden">
                <div class="box-more-sale-title w-full bg-[#d1d5db] text-[14px] p-[10px] font-semibold text-[#0a0a0a]">
                    ƯU ĐÃI THÊM</div>
                <div class="sale-container">
                    <ul>
                        <li class="text-[12px] my-[10px] mx-[5px] flex items-center gap-[3px] ">
                            <img class="mr-[4px]" src="<?= BASE_ASSETS_UPLOADS ?>./img/check-product.svg" alt="">
                            <a class="text-[#000]" href="#">Xem chính sách ưu đãi dành cho thành viên
                                Smember</a>
                        </li>
                        <li class="text-[12px] my-[10px] mx-[5px] flex items-center gap-[3px] ">
                            <img class="mr-[4px]" src="<?= BASE_ASSETS_UPLOADS ?>./img/check-product.svg" alt="">
                            <img class="h-[16px] object-cover"
                                src="<?= BASE_ASSETS_UPLOADS ?>./img/vib_product_sale.webp" alt="">
                            <a class="text-[#000]" href="#">Giảm đến 600K khi mở thẻ tín dụng VIB</a>
                        </li>
                        <li class="text-[12px] my-[10px] mx-[5px] flex items-center gap-[3px] ">
                            <img class="mr-[4px]" src="<?= BASE_ASSETS_UPLOADS ?>./img/check-product.svg" alt="">
                            <img class="h-[16px] object-cover"
                                src="<?= BASE_ASSETS_UPLOADS ?>./img/ocb_product_sale.webp" alt="">
                            <a class="text-[#000]" href="#">Giảm 500K khi thanh toán qua thẻ OCB</a>
                        </li>
                        <li class="text-[12px] my-[10px] mx-[5px] flex items-center gap-[3px] ">
                            <img class="mr-[4px]" src="<?= BASE_ASSETS_UPLOADS ?>./img/check-product.svg" alt="">
                            <img class="h-[16px] object-cover"
                                src="<?= BASE_ASSETS_UPLOADS ?>./img/zv0_product_sale.webp" alt="">
                            <a class="text-[#000]" href="#">Giảm đến 700.000đ khi thanh toán qua Krediv</a>
                        </li>
                        <li class="text-[12px] my-[10px] mx-[5px] flex items-center gap-[3px] ">
                            <img class="mr-[4px]" src="<?= BASE_ASSETS_UPLOADS ?>./img/check-product.svg" alt="">
                            <img class="h-[16px] object-cover"
                                src="<?= BASE_ASSETS_UPLOADS ?>./img/home_credit_product_sale.webp" alt="">
                            <a class="text-[#000]" href="#">Giảm 400.000đ khi thanh toán bằng thẻ tín dụng
                                Home Credit</a>
                        </li>
                        <li class="text-[12px] my-[10px] mx-[5px] flex items-center gap-[3px] ">
                            <img class="mr-[4px]" src="<?= BASE_ASSETS_UPLOADS ?>./img/check-product.svg" alt="">
                            <a class="text-[#000]" href="#">Liên hệ B2B để được tư vấn giá tốt nhất cho
                                khách hàng doanh nghiệp khi mua số lượng nhiều</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="flex flex-wrap mt-[20px] min-h-[250px] mb-[10px]  w-[1200px]  my-[0] mx-[auto] py-[10px]">
    <hr class="mb-[15px] mt-[10px] bg-[#f5f5f5] w-full">
    <div
        class="same-product bg-[#fcf2f2] border-[1px] border-solid border-[#c51f27] text-[#c51f27] rounded-[8px] text-[12px] font-bold max-h-[30px] py-[5px] px-[10px] cursor-pointer w-fit mb-[20px]">

        SẢN PHẨM TƯƠNG TỰ

    </div>
    <div class="product-list-title flex justify-between w-full mb-[20px]">
        <h2 class="uppercase text-[#444] font-semibold text-[22px] mr-[20px] text-nowrap">
            SẢN PHẨM TƯƠNG TỰ
        </h2>
    </div>
    <div class="list-items w-full flex gap-[20px] justify-between overflow-hidden">
        <!-- ITEM IN HERE -->
        <?php foreach ($sameProducts as $sameProduct) { ?>
            <div class="item px-[15px] w-[224.8px] rounded-[15px] shadow-menu relative">
                <div class="sale-item-tag absolute top-0 left-0 h-[31px] w-[80px]">
                    <img class="w-full h-full" src="<?= BASE_ASSETS_UPLOADS ?>./img/sale-tag.png" alt="" />
                    <p
                        class="sale-price absolute top-[50%] translate-y-[-70%] left-[10px] text-[#fff] text-[12px] font-bold">
                        Giảm <?= $sameProduct['discount'] ?>%
                    </p>
                </div>
                <a href="?act=productDetail&id=<?= $sameProduct['id'] ?>&cateId=<?= $sameProduct['category_id'] ?>"
                    class="text-[#444]">
                    <div class="item-img w-full mt-[25px] flex justify-center">
                        <img class="w-[160px]" src="<?= BASE_ASSETS_UPLOADS . $sameProduct['image'] ?>" alt="" />
                    </div>
                    <div class="item-title mb-[5px]">
                        <h3 class="text-[#444] line-clamp-3 text-[14px] font-semibold h-[65px] mt-[20px]">
                            <?= $sameProduct['name'] ?>
                        </h3>
                    </div>
                    <div class="item-price text-nowrap mb-[5px]">
                        <p class="inline-block new-price text-[16px] text-[#d70018] font-bold">
                            <?= number_format($sameProduct['sale_price'], 0, ',', '.') ?>đ
                        </p>
                        <p class="inline-block old-price text-[14px] text-[#707070] line-through font-semibold">
                            <?= number_format($sameProduct['price'], 0, ',', '.') ?>đ
                        </p>
                    </div>
                    <div class="item-member text-[#444] mb-[5px] text-[11px] flex items-center gap-[3px]">
                        <span class="text-nowrap">Smember giảm thêm đến</span>
                        <span class="text-[14px] text-[#d70018] font-bold">300.000đ</span>
                    </div>
                    <div
                        class="item-promotion mb-[50px] border-[1px] border-solid border-[#e5e7eb] bg-[#f3f4f6] rounded-[5px] text-[12px] p-[5px]">
                        <p class="line-clamp-2">
                            Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn
                            3-6 tháng
                        </p>
                    </div>
                </a>
                <div class="item-bottom flex justify-between mb-[10px]">
                    <div class="item-rating">
                        <i class="fa-solid fa-star text-[#f59e0b] text-[15px]"></i>
                        <i class="fa-solid fa-star text-[#f59e0b] text-[15px]"></i>
                        <i class="fa-solid fa-star text-[#f59e0b] text-[15px]"></i>
                        <i class="fa-solid fa-star text-[#f59e0b] text-[15px]"></i>
                        <i class="fa-solid fa-star text-[#f59e0b] text-[15px]"></i>
                    </div>
                    <div class="item-like">
                        <span class="inline-block text-[#777] text-[12px]">Yêu thích
                        </span>
                        <a href="#">
                            <i class="fa-regular text-[#777] fa-heart text-[15px] cursor-pointer"></i></a>
                    </div>
                </div>
            </div>
        <?php  } ?>
    </div>
</section>
<div
    class="comment-container bg-[#f9fafb] rounder-[10px] shadow-menu mt-[15px] p-[10px] w-[1200px] my-0 mx-auto min-h-[250px]">
    <h2 class="uppercase text-[#444] font-semibold text-[22px] mr-[20px] text-nowrap">Bình luận</h2>
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <?php
            if (is_array($_SESSION['error'])) {
                foreach ($_SESSION['error'] as $err) {
                    echo "<p>$err</p>";
                }
            } else {
                echo "<p>{$_SESSION['error']}</p>";
            }
            ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST" class="relative w-full flex gap-[10px] mt-[10px]">
        <div class="text-area-comment w-[80%]">
            <img class="absolute left-0" src="<?= BASE_ASSETS_UPLOADS ?>./img/imgComment.webp" alt="">
            <textarea id="message" name="comment" rows="6"
                class="inline-block p-2.5 w-full text-sm text-gray-900 bg-[#fff] rounded-[10px] shadow-formComment pl-[85px] border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Xin mời để lại câu hỏi, CellphoneS sẽ trả lời lại trong 1h, các câu hỏi sau 22h - 8h sẽ được trả lời vào sáng hôm sau"></textarea>

        </div>
        <?php if (isset($_SESSION['user_admin']) || isset($_SESSION['user_client'])) { ?>
            <div class="btn-comment w-[15%]">
                <button type="submit" id="liveToastBtn"
                    class="w-[70px] h-[40px] p-[10px] bg-[#d7000e] rounded-[8px] text-[#fff] flex gap-[5px] items-center ">
                    <div class="icon-paper-plane"><svg height="15" fill=#fff xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M511.6 36.86l-64 415.1c-1.5 9.734-7.375 18.22-15.97 23.05c-4.844 2.719-10.27 4.097-15.68 4.097c-4.188 0-8.319-.8154-12.29-2.472l-122.6-51.1l-50.86 76.29C226.3 508.5 219.8 512 212.8 512C201.3 512 192 502.7 192 491.2v-96.18c0-7.115 2.372-14.03 6.742-19.64L416 96l-293.7 264.3L19.69 317.5C8.438 312.8 .8125 302.2 .0625 289.1s5.469-23.72 16.06-29.77l448-255.1c10.69-6.109 23.88-5.547 34 1.406S513.5 24.72 511.6 36.86z">
                            </path>
                        </svg></div>

                    Gửi
                </button>
            </div>
        <?php } else { ?>
            <a href="<?= BASE_URL ?>?act=show-form-login"
                class=" cursor-pointer text-[12px] h-[40px] p-[10px] bg-[#d7000e] rounded-[8px] text-[#fff]   ">
                Đăng nhập để bình luận
            </a>
        <?php } ?>
    </form>
    <div class="item-comment">
        <?php foreach ($review as $cmt) { ?>
            <div class="item-conmment-box">
                <div class="cmt-user-infor mb-[15px] mt-[10px]">
                    <div class="user-infor  flex items-center gap-[5px]">
                        <div class="user-img h-[25px] w-[25px]">
                            <img class="w-full h-full object-cover rounded-[50%]"
                                src="<?= BASE_ASSETS_UPLOADS ?><?= $cmt['u_avatar'] ?? '/img/user-img-default.png' ?>"
                                alt="">
                        </div>
                        <div class="user-name text-[14px] font-bold capitalize text-[#4a4a4a]">
                            <p>
                                <?= $cmt['u_name'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="cmt-user bg-[#fff] rounded-[10px] shadow-menu p-[10px] text-[13px] w-[80%] ">
                    <?= $cmt['comment'] ?>
                    <a onclick="confirm('Bạn Có Chắc Muốn Xóa Hay Không?')"
                        href="<?= BASE_URL ?>?act=deleteReview&id=<?= $cmt['id'] ?>"
                        class="delete-btn text-[#ff0000] ml-[10px]">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
            </div>
    </div>

    <hr class="mb-[15px] mt-[10px] bg-[#f5f5f5] w-full">
<?php } ?>

</div>
</div>
<?php unset($_SESSION['error']) ?>