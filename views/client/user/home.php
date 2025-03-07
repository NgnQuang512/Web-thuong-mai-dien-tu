<?php

?>
<section class="flex justify-between gap-[20px]">
    <!-- MENU  -->
    <div class="menu-main w-[225px] mt-[20px] rounded-[15px] shadow-menu bg-[#ffffff]">
        <?php foreach ($categories as $category) { ?>
            <a href="?act=goToCate&idCate=<?php echo $category['category_id'] ?>"
                class="menu-item flex justify-between items-center hover:bg-[#ddd] py-[10px] px-[10px] rounded-[5px]">
                <p class="flex items-center gap-[5px]">
                    <i class="  fa-solid <?php echo $category['icon_name'] ?> text-black text-[25px]"></i>
                    <span class="text-[12px] font-bold text-[#343a40]">
                        <?php echo $category['category_name'] ?></span>
                </p>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        <?php  } ?>
    </div>
    <!-- SLIDER -->
    <div class="slider w-[767.5px] h-[450px] mt-[20px] rounded-b-[10px] shadow-menu bg-[#ffffff]">
        <div id="slider-container-img" class=" w-full h-[75%] relative overflow-hidden">
            <?php foreach ($sliders as $slider) { ?>
                <img src="<?= BASE_ASSETS_UPLOADS ?><?= $slider['s_img_slider'] ?>"
                    class="w-full h-full object-cover absolute first:left-[0%] left-[-100%]" alt="" />
            <?php } ?>
        </div>
        <div class="slider-title w-full h-[25%] flex">
            <?php foreach ($sliders as $slider) { ?>
                <div class="slider-title-item w-[20%] hover:bg-[#eee] cursor-pointer flex items-center justify-center  ">
                    <p class="text-[13px] text-center">
                        <?= $slider['s_content'] ?>
                    </p>
                </div>
            <?php  } ?>
        </div>
    </div>
    <!-- RIGHT BANNER -->
    <div class="right-banner w-[265px] h-[450px] flex flex-wrap justify-between flex-col mt-[20px]">
        <a href="#" class="shadow-menu h-[25%] block w-full rounded-[10px]">
            <img src="<?= BASE_ASSETS_UPLOADS ?>/img/right-banner-1.webp"
                class="w-full h-full object-cover rounded-[10px]" alt="" />
        </a>
        <a href="#" class="shadow-menu h-[25%] block w-full rounded-[10px]">
            <img src="<?= BASE_ASSETS_UPLOADS ?>/img/right-banner-2.webp"
                class="w-full h-full object-cover rounded-[10px]" alt="" />
        </a>
        <a href="#" class="shadow-menu h-[25%] block w-full rounded-[10px]">
            <img src="<?= BASE_ASSETS_UPLOADS ?>/img/right-banner-3.webp"
                class="w-full h-full object-cover rounded-[10px]" alt="" />
        </a>
    </div>
</section>
<a href="#" class="banner w-full mt-[15px] block">
    <img class="w-full rounded-[10px] shadow-menu" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner.gif" alt="" />
</a>
<?php foreach ($data as $value) { ?>
    <section class="flex flex-wrap mt-[20px] min-h-[250px] mb-[10px]">
        <?php foreach ($value['categories'] as $category) { ?>

            <div class="product-list-title flex justify-between w-full mb-[20px]">
                <a href="?act=goToCate&idCate=<?= $category['id'] ?>"
                    class="uppercase text-[#444] font-semibold text-[22px] mr-[20px] text-nowrap w-[30%]">
                    <?php echo $category['name'] ?>
                </a>

            <?php } ?>
            <div class="list-item-tag flex justify-end gap-3">
                <?php foreach ($value['brands'] as $brands) { ?>

                    <a href="?act=goToBrand&idBrand=<?= $brands['id'] ?>&idCate=<?= $brands['category_id'] ?>"
                        class="flex items-center justify-center  last:mr-0 bg-[#f3f4f6] border-[1px] border-solid border-[#e5e7eb] rounded-[10px] text-[#444] text-[13px] h-[34px] px-[10px] py-[10px] text-nowrap">
                        <p class=""><?php echo $brands['name'] ?></p>
                    </a>

                <?php } ?>
            </div>
            </div>
            <div class="list-items w-full flex  gap-[20px] overflow-hidden">
                <!-- ITEM IN HERE -->
                <?php foreach ($value['products'] as $products) { ?>
                    <div class="item px-[15px] w-[233px] rounded-[15px] shadow-menu relative">
                        <div class="sale-item-tag absolute top-0 left-0 h-[31px] w-[80px]">
                            <img class="w-full h-full" src="<?= BASE_ASSETS_UPLOADS ?>/img/sale-tag.png" alt="" />
                            <p
                                class="sale-price absolute top-[50%] translate-y-[-70%] left-[10px] text-[#fff] text-[12px] font-bold">
                                Giảm <?php echo $products['discount'] ?>%
                            </p>
                        </div>
                        <a href="?act=productDetail&id=<?= $products['id'] ?>&cateId=<?= $products['category_id'] ?>"
                            class="text-[#444]">
                            <div class="item-img w-full mt-[25px] flex justify-center">
                                <img class="w-[160px]" src="<?= BASE_ASSETS_UPLOADS ?>/<?php echo $products['image'] ?>" alt="" />
                            </div>
                            <div class="item-title mb-[5px]">
                                <h3 class="text-[#444] line-clamp-3 text-[14px] font-semibold h-[65px] mt-[20px]">
                                    <?php echo $products['name'] ?>
                                </h3>
                            </div>
                            <div class="item-price text-nowrap mb-[5px]">
                                <p class="inline-block new-price text-[16px] text-[#d70018] font-bold">
                                    <?= number_format($products['sale_price'], 0, ',', '.') ?>đ
                                </p>
                                <p class="inline-block old-price text-[14px] text-[#707070] line-through font-semibold">
                                    <?= number_format($products['price'], 0, ',', '.') ?>đ
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
                <?php } ?>
            </div>
    </section>
<?php } ?>
<section class="mt-[20px]">
    <div class="brand-banner mt-[20px] mb-[20px]">
        <a href="#" class="banner-title uppercase text-[#444] text-[22px] font-semibold">Ưu đãi sinh
            viên</a>
    </div>
    <div class="banner-container flex justify-between w-full gap-[10px]">
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-sale-1.webp" alt="" />
        </a>
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-sale-1.webp" alt="" />
        </a>
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-sale-1.webp" alt="" />
        </a>
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-sale-1.webp" alt="" />
        </a>
    </div>
</section>
<section class="mt-[20px]">
    <div class="brand-banner mt-[20px] mb-[20px]">
        <a href="#" class="banner-title uppercase text-[#444] text-[22px] font-semibold">Ưu đãi thanh
            toán</a>
    </div>
    <div class="banner-container flex justify-between w-full gap-[10px]">
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-pay-sale-1.webp" alt="" />
        </a>
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-pay-sale-1.webp" alt="" />
        </a>
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-pay-sale-1.webp" alt="" />
        </a>
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-pay-sale-1.webp" alt="" />
        </a>
    </div>
</section>
<section class="mt-[20px]">
    <div class="brand-banner mt-[20px] mb-[20px]">
        <a href="#" class="banner-title uppercase text-[#444] text-[22px] font-semibold">Chuyên trang thương
            hiệu</a>
    </div>
    <div class="banner-container flex justify-between w-full gap-[10px]">
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-brand-1.webp" alt="" />
        </a>
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-brand-1.webp" alt="" />
        </a>
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-brand-1.webp" alt="" />
        </a>
        <a href="#" class="w-[25%]">
            <img class="rounded-[10px]" src="<?= BASE_ASSETS_UPLOADS ?>/img/banner-brand-1.webp" alt="" />
        </a>
    </div>
</section>
<section class="mt-[20px] mb-[50px]">
    <div class="news-title mt-[20px] mb-[20px]">
        <a href="#" class="uppercase text-[#444] text-[22px] font-semibold">TIN CÔNG NGHỆ</a>
    </div>
    <div class="news-container flex justify-between w-full gap-[20px]">
        <a href="#"
            class="border pb-[10px] border-solid border-[#dedede] rounded-[15px] text-[#000] w-[25%] duration-500 ease-in-out hover:scale-105">
            <img src="<?= BASE_ASSETS_UPLOADS ?>/img/news-1.jpeg"
                class="h-[160px] w-full p-[5px] object-cover rounded-t-[15px]" alt="" />
            <p class="line-clamp-2 px-[5px] text-[#444] text-[16px] h-[48px] font-semibold">
                6 tính năng của Android mà iOS 18 vẫn chưa có
            </p>
        </a>
        <a href="#"
            class="border pb-[10px] border-solid border-[#dedede] rounded-[15px] text-[#000] w-[25%] duration-500 ease-in-out hover:scale-105">
            <img src="<?= BASE_ASSETS_UPLOADS ?>/img/news-1.jpeg"
                class="h-[160px] w-full p-[5px] rounded-t-[15px] object-cover" alt="" />
            <p class=" line-clamp-2 px-[5px] text-[#444] text-[16px] h-[48px] font-semibold">
                Đây là smartphone 5G nhỏ nhất thế giới: Chip Dimensity 7300,
                12GB RAM và pin 4000mAh
            </p>
        </a>
        <a href="#"
            class="border pb-[10px] border-solid border-[#dedede] rounded-[15px] text-[#000] w-[25%] duration-500 ease-in-out hover:scale-105">
            <img src="<?= BASE_ASSETS_UPLOADS ?>/img/news-1.jpeg"
                class="h-[160px] w-full p-[5px] rounded-t-[15px] object-cover" alt="" />
            <p class="line-clamp-2 px-[5px] text-[#444] text-[16px] h-[48px] font-semibold">
                Huawei ra mắt FreeBuds 6i với công nghệ chống ồn chủ động thông
                minh được nâng cấp, giá 1.79 triệu đồng
            </p>
        </a>
        <a href="#"
            class="border pb-[10px] border-solid border-[#dedede] rounded-[15px] text-[#000] w-[25%] duration-500 ease-in-out hover:scale-105">
            <img src="<?= BASE_ASSETS_UPLOADS ?>/img/news-1.jpeg"
                class="h-[160px] w-full p-[5px] rounded-t-[15px] object-cover" alt="" />
            <p class="line-clamp-2 px-[5px] text-[#444] text-[16px] h-[48px] font-semibold">
                S-News Cuối Tuần #37: Red Magic 9S Pro Series ra mắt, AnTuTu
                chia sẻ 10 smartphone có hiệu năng mạnh nhất
            </p>
        </a>
    </div>
</section>