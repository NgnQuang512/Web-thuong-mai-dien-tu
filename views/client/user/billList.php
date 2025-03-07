<?php if (!empty($_SESSION['user_admin']) || !empty($_SESSION['user_client'])): ?>
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
<form class="w-[1290px] mt-[100px] pb-[30px]  border-[1px] border-[#ccc] rounded-[15px] px-[10px] mx-auto my-[0]"
    action="">
    <table class="w-full">
        <thead>
            <tr class="flex justify-between font-bold ">
                <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                    Mã đơn</td>
                <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                    Ngày đặt</td>
                <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                    Trạng thái</td>
                <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                    Hình thức TT
                </td>
                <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                    Người nhận
                </td>
                <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                    Địa chỉ
                </td>
                <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                    SĐT
                </td>
                <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                    Tổng tiền
                </td>
                <td class="border-b-[3px] border-solid border-[#e1042b] p-[10px] w-[10%] text-center  text-nowrap">
                    Chức Năng
                </td>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item) : ?>
                <tr class="flex justify-between font-bold ">
                    <td class="p-[10px] w-[10%] text-center "><?= $item['id'] ?></td>
                    <td class="p-[10px] w-[10%] text-center "><?= $item['create_at'] ?></td>
                    <td class="p-[10px] w-[10%] text-center "><?= $statusLabels[$item['bill_status']] ?? 'Unknown' ?></td>
                    <td class="p-[10px] w-[10%] text-center "><?= $paymentLabels[$item['payment_type']] ?? 'Unknown' ?></td>
                    <td class="p-[10px] w-[10%] text-center "><?= $item['user_name'] ?></td>
                    <td class="p-[10px] w-[10%] text-center "><?= $item['user_address'] ?></td>
                    <td class="p-[10px] w-[10%] text-center "><?= $item['user_phone'] ?></td>
                    <td class="p-[10px] w-[10%] text-center "><?= number_format($item['total'], 0, ',', '.') ?>đ</td>
                    <td class="p-[10px] w-[10%]  text-center">
                        <a href="?act=bills-detail&id=<?= $item['id'] ?>">Xem chi tiết</i></a>
                    </td>
                </tr>
                <tr class="w-full border-b-[3px] border-solid border-[#222]"></tr>


            <?php endforeach; ?>
        </tbody>
    </table>
</form>
<?php else: ?>
    <div class="w-[1290px] mt-[100px] pb-[30px] text-center  border-[1px] border-[#ccc] rounded-[15px] px-[10px] mx-auto my-[0]">
        <a class="px-6 py-3 bg-blue-500 font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition-all" href="<?= BASE_URL ?>?act=show-form-login">Bạn phải đăng nhập để thao tác</a>
    </div>
<?php endif; ?>