<ul class="flex mt-[100px] h-full items-center">
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
                Tìm kiếm sản phẩm
            </p>
        </a>
    </li>
</ul>
<section class="flex flex-wrap mt-[20px] min-h-[250px] mb-[10px]">
    <div class="list-items w-full flex  flex-wrap gap-[20px] overflow-hidden">
        <!-- ITEM IN HERE -->
        <?php foreach ($products as $product) { ?>
            <div class="item px-[15px] w-[223px] rounded-[15px] shadow-menu relative">
                <div class="sale-item-tag absolute top-0 left-0 h-[31px] w-[80px]">
                    <img class="w-full h-full" src="<?= BASE_ASSETS_UPLOADS ?>/img/sale-tag.png" alt="" />
                    <p
                        class="sale-price absolute top-[50%] translate-y-[-70%] left-[10px] text-[#fff] text-[12px] font-bold">
                        Giảm <?php echo $product['discount'] ?>%
                    </p>
                </div>
                <a href="?act=productDetail&id=<?= $product['id'] ?>&cateId=<?= $product['category_id'] ?>"
                    class="text-[#444]">
                    <div class="item-img w-full mt-[25px] flex justify-center">
                        <img class="w-[160px]" src="<?= BASE_ASSETS_UPLOADS ?>/<?php echo $product['image'] ?>" alt="" />
                    </div>
                    <div class="item-title mb-[5px]">
                        <h3 class="text-[#444] line-clamp-3 text-[14px] font-semibold h-[65px] mt-[20px]">
                            <?php echo $product['name'] ?>
                        </h3>
                    </div>
                    <div class="item-price text-nowrap mb-[5px]">
                        <p class="inline-block new-price text-[16px] text-[#d70018] font-bold">
                            <?= number_format($product['sale_price'], 0, ',', '.') ?>đ
                        </p>
                        <p class="inline-block old-price text-[14px] text-[#707070] line-through font-semibold">
                            <?= number_format($product['price'], 0, ',', '.') ?>đ
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