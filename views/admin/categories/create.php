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

        <form class="border p-4" action="<?= BASE_URL_ADMIN . '&act=categories-store' ?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Category Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $_SESSION['data']['name'] ?? null ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="iocn_name" class="form-label">Icons:</label>
                        <textarea class="form-control" id="icon_name" name="icon_name"><?= $_SESSION['data']['icon_name'] ?? null ?></textarea>
                    </div>
                </div>
            </div>
            <a class="btn btn-dark" href="<?= BASE_URL_ADMIN ?>&act=categories-index">Quay lại trang danh sách</a>
            <button class="btn btn-success" type="submit">Tạo Mới</button> 
        </form>

        <?php unset($_SESSION['data']) ?>
    </div>
</main>
