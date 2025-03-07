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
                <a class="btn btn-success" href="<?= BASE_URL_ADMIN ?>&act=users-create">Tạo mới</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>avatar</th>
                            <th>email</th>
                            <th>address</th>
                            <th>phone</th>
                            <th>role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>avatar</th>
                            <th>email</th>
                            <th>address</th>
                            <th>phone</th>
                            <th>role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data as $user): ?>
                            <tr>
                                <td><?= $user['u_id'] ?></td>
                                <td><?= $user['u_name'] ?></td>
                                <td>
                                    <?php if (!empty($user['u_avatar'])): ?>
                                        <img src="<?= BASE_ASSETS_UPLOADS . $user['u_avatar'] ?>" width="100px">
                                    <?php endif; ?>
                                </td>
                                <td><?= $user['u_email'] ?></td>
                                <td><?= $user['u_address'] ?></td>
                                <td><?= $user['u_phone'] ?></td>
                                <td><?= $user['r_name'] ?></td>
                                <td>
                                    <a class="btn btn-success" href="<?= BASE_URL_ADMIN . '&act=users-show&id=' . $user['u_id'] ?>">Chi tiết</a>
                                    <a class="btn btn-info" href="<?= BASE_URL_ADMIN . '&act=users-edit&id=' . $user['u_id'] ?>">Cập nhật</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                <table id="datatablesSimple1">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>avatar</th>
                            <th>email</th>
                            <th>address</th>
                            <th>phone</th>
                            <th>role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>avatar</th>
                            <th>email</th>
                            <th>address</th>
                            <th>phone</th>
                            <th>role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($dataClient as $user): ?>
                            <tr>
                                <td><?= $user['u_id'] ?></td>
                                <td><?= $user['u_name'] ?></td>
                                <td>
                                    <?php if (!empty($user['u_avatar'])): ?>
                                        <img src="<?= BASE_ASSETS_UPLOADS . $user['u_avatar'] ?>" width="100px">
                                    <?php endif; ?>
                                </td>
                                <td><?= $user['u_email'] ?></td>
                                <td><?= $user['u_address'] ?></td>
                                <td><?= $user['u_phone'] ?></td>
                                <td><?= $user['r_name'] ?></td>
                                <td>
                                    <a class="btn btn-success" href="<?= BASE_URL_ADMIN . '&act=users-show&id=' . $user['u_id'] ?>">Chi tiết</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>