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
                        <th>Ngày đặt</th>
                        <th>Tên người nhận</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Loại Thanh toán</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Ngày đặt</th>
                        <th>Tên người nhận</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Loại Thanh toán</th>
                        <th>Chức năng</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data as $bill): ?>
                            <tr>
                                <td><?= $bill['id'] ?></td>
                                <td><?= $bill['create_at'] ?></td>
                                <td><?= $bill['user_name'] ?></td>
                                <td><?= $bill['total'] ?></td>
                                <td><?= $statusLabels[$bill['bill_status']] ?? 'Unknown' ?></td>
                                <td><?= $paymentLabels[$bill['payment_type']] ?? 'Unknown' ?></td>
                                <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-success"
                                        href="<?= BASE_URL_ADMIN . '&act=bills-show&id=' . $bill['id'] ?>">Show</a>
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