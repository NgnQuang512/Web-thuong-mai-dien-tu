<?php if(!empty($_SESSION['user_client']) || !empty($_SESSION['user_admin'])): ?>
<div class="mt-[100px]">
    <p class=" font-bold text-[#000]">Tài khoản: <?= $user['u_name'] ?> <a href="<?= BASE_URL ?>" class=" underline text-blue-600">Thoát</a></p>
    <?php
    if (isset($_SESSION['success'])) {

        echo "<div class='p-4 text-sm text-white rounded-lg bg-red-50 dark:bg-green-800'>{$_SESSION['success']}</div>";

        unset($_SESSION['success']);
    }
    ?>
    <form action="<?= BASE_URL ?>?act=update-info-user&id=<?= $user['u_id'] ?>" method="POST" enctype="multipart/form-data"
        class="max-w-sm mx-auto mt-[100px]">
        <div class="mb-5">
            <label for="img" class="block mb-2 text-sm font-medium text-gray-900">
                Ảnh đại diện</label>
            <div
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                <img class="rounded-[50%] h-[50px]" src="<?= BASE_ASSETS_UPLOADS ?><?= $user['u_avatar'] ?? '/img/user-img-default.png' ?>  " alt="">
                <span class=" mb-2 text-sm font-medium text-gray-900">Đổi ảnh đại diện:</span>
                <input type="file" id="avatar" name="avatar" class="" value="" />
            </div>
            <?php if (isset($_SESSION['error']['avatar_type'])): ?>
                <div class="p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium"><?= $_SESSION['error']['avatar_type'] ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                Họ Tên:</label>
            <input type="text" id="name" name="name"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                value="<?= $user['u_name'] ?? null ?>" />
            <?php if (isset($_SESSION['error']['name'])): ?>
                <div class="p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium"><?= $_SESSION['error']['name'] ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                Email:</label>
            <input type="text" id="email" name="email"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                value="<?= $user['u_email'] ?? null ?>" />
            <?php if (isset($_SESSION['error']['email'])): ?>
                <div class="p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium"><?= $_SESSION['error']['email'] ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-5">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">
                Số Điện Thoại</label>
            <input type="text" id="phone" name="phone"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                value="<?= $user['u_phone'] ?? null ?>" />
            <?php if (isset($_SESSION['error']['phone'])): ?>
                <div class="p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium"><?= $_SESSION['error']['phone'] ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-5">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">
                Địa chỉ</label>
            <input type="text" id="address" name="address"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                value="<?= $user['u_address'] ?? null ?>" />
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
            Đổi thông tin </button>
    </form>
</div>
<?php unset($_SESSION['error']) ?>

<?php else: ?>
    <div class="mt-12 text-center">
    <p class="text-lg font-medium text-gray-700 mb-4">Bạn Chưa Có Tài Khoản!    </p>
    <a href="<?= BASE_URL ?>?act=show-form-login" 
       class="inline-block text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
        Đăng nhập
    </a>
</div>
<?php endif; ?>