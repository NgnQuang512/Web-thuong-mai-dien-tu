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
        </table>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
                <a class="btn btn-success" href="<?= BASE_URL_ADMIN ?>&act=products-create">Tạo mới</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Thể loại</th>
                            <th>Nhãn hiệu</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Thể loại</th>
                            <th>Nhãn hiệu</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><?= $product['name'] ?></td>
                            <td>
                                <?php if (!empty($product['image'])): ?>
                                <img src="<?= BASE_ASSETS_UPLOADS . $product['image'] ?>" width="100px">
                                <?php endif; ?>
                            </td>
                            <td><?= $product['brand_name'] ?></td>
                            <td><?= $product['category_name'] ?></td>
                            <td>
                                <div class="d-flex flex-column text-nowrap align-items-center">
                                    <a class="btn w-100 mb-1 btn-success"
                                        href="<?= BASE_URL_ADMIN . '&act=products-show&id=' . $product['id'] ?>">Chi tiết</a>
                                    <a class="btn w-100 mb-1 btn-info"
                                        href="<?= BASE_URL_ADMIN . '&act=products-edit&id=' . $product['id'] ?>">Cập nhật</a>
                                    <a class="btn w-100 mb-1 btn-danger"
                                        href="<?= BASE_URL_ADMIN . '&act=products-delete&id=' . $product['id'] ?>"
                                        onclick="return confirm('Bạn có chắc muốn xóa hay không?')">Xóa</a>
                                </div>

                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>