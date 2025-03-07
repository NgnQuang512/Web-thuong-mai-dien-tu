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
                            <th>id</th>
                            <th>Người Bình Luận</th>
                            <th>Sản Phẩm Bình Luận</th>
                            <th>Nội Dung</th>
                            <th>created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Người Bình Luận</th>
                            <th>Sản Phẩm Bình Luận</th>
                            <th>Nội Dung</th>
                            <th>created_at</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($comments as $comment): ?>
                            <tr>
                                <td><?= $comment['id'] ?></td>
                                <td><?= $comment['u_name'] ?></td>
                                <td><?= $comment['pd_name'] ?></td>
                                <td><?= $comment['comment'] ?></td>
                                <td><?= $comment['created_at'] ?></td>
                                <td>
                                    <a class="btn btn-info" href="<?= BASE_URL_ADMIN . '&act=review-show&id=' . $comment['id'] ?>">Chi Tiết</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN . '&act=review-delete&id=' . $comment['id'] ?>" onclick="confirm('Bạn Có chắc muốn xóa hay không?')">Xóa</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>