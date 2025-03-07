<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title ?></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?= $title ?></li>
        </ol>
        <?php
        if (isset($_SESSION['success'])) {
            $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

            echo "<div class='alert $class'>{$_SESSION['msg']}</div>";

            unset($_SESSION['success']);
            unset($_SESSION['msg']);
        }
        ?>
        <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($_SESSION['error'] as $err):  ?>
                <li><?= $err ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['error']) ?>
        <?php endif; ?>

        <form class="border p-4" action="<?= BASE_URL_ADMIN . '&act=users-store' ?>" method="POST"
            enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?= $_SESSION['data']['name'] ?? null ?>">
                    </div>
                    
                    <div class="mb-3 mt-3">
                            <label for="role_id" class="form-label">Role:</label>
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="<?= $role['id'] ?>"> <?= $role['name'] ?> </option>

                            </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">email:</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="<?= $_SESSION['data']['email'] ?? null ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="password" class="form-label">password:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="<?= $_SESSION['data']['password'] ?? null ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="address" class="form-label">address:</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="<?= $_SESSION['data']['address'] ?? null ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="phone" class="form-label">phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="<?= $_SESSION['data']['phone'] ?? null ?>">
                    </div>
                </div>


                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar:</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">

                    <?php if (!empty($user['u_avatar'])): ?>
                    <img src="<?= BASE_ASSETS_UPLOADS . $user['u_avatar'] ?>" width="100px">
                    <?php endif; ?>
                </div>
            </div>
            <a class="btn btn-dark" href="<?= BASE_URL_ADMIN ?>&act=users-index">Quay lại trang danh sách</a>
            <button class="btn btn-success " type="submit">Tạo Mới</button>

        </form>

        <?php unset($_SESSION['data']) ?>
    </div>
    </div>
    </div>
</main>