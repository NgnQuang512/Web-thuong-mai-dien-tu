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
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
                <a class="btn btn-success" href="<?= BASE_URL_ADMIN ?>&act=categories-create">Tạo mới</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Icons</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Icons</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data as $category): ?>
                        <tr>
                            <td><?= $category['id'] ?></td>
                            <td><?= $category['name'] ?></td>
                            <td>
                                <p class="text-center"><i
                                        class="fa-solid display-6   <?= $category['icon_name'] ?> "></i></p>
                            </td>
                            <td>
                                <a class="btn btn-success"
                                    href="<?= BASE_URL_ADMIN . '&act=categories-show&id=' . $category['id'] ?>">Chi tiết</a>
                                <a class="btn btn-info"
                                    href="<?= BASE_URL_ADMIN . '&act=categories-edit&id=' . $category['id'] ?>">Cập nhật</a>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>