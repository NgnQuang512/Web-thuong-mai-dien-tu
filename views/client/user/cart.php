<?php if (!empty($_SESSION['user_admin']) || !empty($_SESSION['user_client'])): ?>
    <?php if (!empty($cartItems)): ?>
        <?php if (!empty($_SESSION['error'])): ?>
            <div class="flex items-center p-4 mb-4 text-sm text-white rounded-lg  bg-[#ac3b3a] mt-[100px]">
                <ul>
                    <?php foreach ($_SESSION['error'] as $err):  ?>
                        <li><?= $err ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['error']) ?>
        <?php endif; ?>
        <?php if (!empty($_SESSION['success']) && is_array($_SESSION['success'])): ?>
            <div class="flex items-center p-4 mb-4 text-sm text-white rounded-lg bg-[#2ce347] mt-[100px]">
                <ul>
                    <?php foreach ($_SESSION['success'] as $msg): ?>
                        <li><?= htmlspecialchars($msg) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <form class="w-[1290px] mt-[100px] pb-[30px] border-[1px] border-[#ccc] rounded-[15px] px-[10px] mx-auto my-[0]"
            action="<?= BASE_URL ?>?act=update-cart" method="POST">
            <table class="w-full">
                <thead>
                    <tr class="flex justify-between font-bold ">
                        <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                            Sản phẩm
                        </td>
                        <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                            Giá</td>
                        <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                            Màu
                            sắc
                        </td>
                        <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[15%] text-center  text-nowrap">
                            Dung
                            lượng
                        </td>
                        <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                            Số
                            lượng
                        </td>
                        <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                            Thành
                            tiền
                        </td>
                        <td class="p-[10px] w-[5%]  text-nowrap"></td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $count = 0;
                    foreach ($cartItems as $item): ?>
                        <tr class="flex justify-between font-bold">
                            <td class="p-[10px] w-[10%]">
                                <img class="w-[140px] object-cover" src="<?= BASE_ASSETS_UPLOADS . $item['pd_image'] ?>" alt="">
                            </td>
                            <td class="p-[10px] w-[10%] text-center"><?= number_format($item['pd_sale_price'], 0, ',', '.') ?>đ</td>
                            <td class="p-[10px] w-[10%] text-center"><?= $item['color_value'] ?></td>
                            <td class="p-[10px] w-[15%] text-nowrap text-center"><?= $item['size_value'] ?></td>
                            <td class="p-[10px] w-[10%] text-center">
                                <input class="w-[40px] h-[40px] border-[1px] border-[#ccc] rounded-[5px] text-center" type="number"
                                    name="products[<?= $item['variant_id'] ?>][quantity]" value="<?= $item['c_quantity'] ?>"
                                    min="1">
                                <input type="hidden" name="products[<?= $item['variant_id'] ?>][product_id]"
                                    value="<?= $item['pd_id'] ?>">
                                <input type="hidden" name="products[<?= $item['variant_id'] ?>][variant_id]"
                                    value="<?= $item['variant_id'] ?>">
                            </td>
                            <td class="p-[10px] w-[10%] text-center">
                                <?= number_format(($item['c_quantity'] * $item['pd_sale_price']), 0, ',', '.') ?>đ</td>
                            <td class="p-[10px] w-[5%] text-center">
                                <a href="<?= BASE_URL ?>?act=remove-item-from-cart&user_id=<?= $userId ?>&product_id=<?= $item['pd_id'] ?>&variant_id=<?= $item['variant_id'] ?>"
                                    class="text-[#e1042b]">
                                    <i class="fa-solid fa-trash text-[35px]"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="w-full border-b-[3px] border-solid border-[#222]"></tr>
                        <input type="hidden" name="product_id" value="<?= $item['pd_id'] ?>">
                    <?php
                        $count = $item['c_quantity'] * $item['pd_sale_price'];
                        $total += $count;
                    endforeach; ?>
                </tbody>
            </table>

            </tbody>
            </table>
            <h2 class=" font-bold float-right mt-[30px]">
                Tổng thành tiền: <?= number_format($total, 0, ',', '.')  ?>đ</h2>

            <div class="w-full flex flex-row-reverse gap-[20px] mt-[90px]">
                <button type="submit"
                    class="px-[20px] py-[10px] border-[1px] rounded-[10px] bg-[#e1042b] text-[#fff] font-bold">
                    Lưu và Cập nhật giỏ hàng
                </button>
                <a class="px-[20px] py-[10px] border-[1px] rounded-[10px] bg-[#e1042b] text-[#fff] font-bold"
                    href="<?= BASE_URL ?>?act=goToPayment">Thanh toán</a>
            </div>
        </form>
    <?php else: ?>
        <div
            class="w-[1290px] mt-[100px] pb-[30px] text-center border border-[#ccc] rounded-2xl px-5 mx-auto shadow-lg bg-gradient-to-r from-blue-50 to-white">
            <p class="text-lg font-medium text-gray-700 mb-5">
                Giỏ Hàng Trống
            </p>
            <a class="inline-block px-[100px] py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-400 focus:ring-offset-2 transition-all"
                href="<?= BASE_URL ?>">
                Thêm Sản Phẩm Vào Giỏ Hàng
            </a>
        </div>
    <?php endif; ?>
<?php else: ?>
    <div
        class="w-[1290px] mt-[100px] pb-[30px] text-center border border-[#ccc] rounded-2xl px-5 mx-auto shadow-lg bg-gradient-to-r from-blue-50 to-white">
        <p class="text-lg font-medium text-gray-700 mb-5">
            Bạn phải đăng nhập để xem giỏ hàng
        </p>
        <a class="inline-block px-[100px] py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-400 focus:ring-offset-2 transition-all"
            href="<?= BASE_URL ?>?act=show-form-login">
            Đăng nhập ngay
        </a>
    </div>

<?php endif; ?>