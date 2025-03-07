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
                            <th>Dữ Liệu</th>
                            <th>Giá trị</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($product as $key => $value): ?>
                        <tr>
                            <td class="border">
                                <?php switch ($key) {
                                        case 'name':
                                            echo "Tên sản phẩm";
                                            break;
                                        case 'image':
                                            echo "Ảnh sản phẩm";
                                            break;
                                        case 'price':
                                            echo "Giá gốc sản phẩm";
                                            break;
                                        case 'sale_price':
                                            echo "Giá đã giảm sản phẩm";
                                            break;
                                        case 'brand_name':
                                            echo "Nhãn hiệu";
                                            break;
                                        case 'view_count':
                                            echo "Lượt xem";
                                            break;
                                        case 'discount':
                                            echo "Phần trăm giảm giá";
                                            break;
                                        case 'description':
                                            echo "Mô tả";
                                            break;
                                        case 'content':
                                            echo "Giới thiệu sản phẩm";
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
                                        case 'image':
                                            if ((!empty($value))) {
                                                $link = BASE_ASSETS_UPLOADS . $value;
                                                echo "<img src='$link' width='100px'>";
                                            }
                                            break;
                                        case 'price':
                                            echo number_format($value, 0, ',', '.') . "đ";
                                            break;
                                        case 'sale_price':
                                            echo number_format($value, 0, ',', '.') . "đ";
                                            break;
                                               case 'discount':
                                            echo $value. "%";
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