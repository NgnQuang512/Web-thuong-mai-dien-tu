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
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Nội dung</th>
                            <th>Ngày cập nhật</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Nội dung</th>
                            <th>Ngày cập nhật</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data as $slider): ?>
                            <tr>
                                <td><?= $slider['s_id'] ?></td>
                                <td><?= $slider['p_name'] ?></td>
                                <td>
                                    <?php if (!empty($slider['s_img_slider'])): ?>
                                        <img src="<?= BASE_ASSETS_UPLOADS . $slider['s_img_slider'] ?>" width="150px">
                                    <?php endif; ?>
                                </td>
                                <td><?= $slider['s_content'] ?></td>
                                <td><?= $slider['s_created_at'] ?></td>
                                <td>
                                <a class="btn <?=$slider['s_status']==1 ? 'btn-success' : 'btn-warning'?>" href="<?= BASE_URL_ADMIN . '&act=sliders-status&id=' . $slider['s_id'] ?>">
                                    <?=$slider['s_status']==1 ? 'Hiện' : 'Ẩn'?>
                                </a>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="<?= BASE_URL_ADMIN . '&act=sliders-edit&id=' . $slider['s_id'] ?>">Cập nhật</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN . '&act=sliders-delete&id=' . $slider['s_id'] ?>">Xóa</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>