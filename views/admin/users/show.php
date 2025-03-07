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
                            <th>Dữ Liệu</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($user as $key => $value): ?>
                            <tr>
                                <td class="border">
                                <?php switch ($key) {
                                        case 'name':
                                            echo "Họ Tên";
                                            break;
                                        case 'avatar':
                                            echo "Ảnh đại diện ";
                                            break;
                                        case 'email':
                                            echo "Email";
                                            break;
                                        case 'password':
                                            echo "password";
                                            break;
                                        case 'brand_name':
                                            echo "Nhãn hiệu";
                                            break;
                                        case 'role_id':
                                            echo "Tài khoản";
                                            break;
                                        case 'address':
                                            echo "Địa chỉ";
                                            break;
                                        case 'phone':
                                            echo "Số điện thoại";
                                            break;
                                        case 'created_at':
                                            echo "Ngày tạo";
                                            break;
                                        case 'updated_at':
                                            echo "Ngày sửa";
                                            break;
                                        default:
                                            echo $key;
                                            break;
                                    } ?>
                                </td>
                                <td class="border">
                                    <?php
                                    switch ($key) {
                                        case 'avatar':
                                            if ((!empty($value))) {
                                                $link = BASE_ASSETS_UPLOADS . $value;
                                                echo "<img src='$link' width='100px'>";
                                            }
                                            break;
                                        case 'role_id':
                                            if($value == 2){
                                                echo 'Quản Trị';
                                            }else{
                                                echo"Người dùng";
                                            }
                                            break;
                                        case 'password':
                                            echo '**********';
                                            break;
                                        default:
                                            echo $value;
                                            break;
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>