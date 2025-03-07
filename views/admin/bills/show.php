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
            <form class="border p-4" action="<?= BASE_URL_ADMIN . '&act=bills-update&id=' . $data['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="bill_status" class="form-label">Trạng thái đơn hàng</label>
                            <select class="form-control" name="bill_status">
                                <option value="" disabled>Chọn trạng thái đơn hàng</option>
                                <option value="$data['bill_status']" selected disabled selected>
                                    <?= $statusLabels[$data['bill_status']] ?? 'Unknown' ?>
                                </option>
                                <option value="1">Chờ xử lí</option>
                                <option value="2">Đã xử lí</option>
                                <option value="3">Đang giao hàng</option>
                                <option value="4">Đã thanh toán</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-warning " type="submit">Cập nhật</button>
            </form>
            <!-- Bảng 1 -->
            <div class="card-body">
                <a class="btn btn-success" href="<?= BASE_URL_ADMIN . '&act=bills-index' ?>">Quay lại</a>
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
                        <?php foreach ($data as $key => $value): ?>
                            <tr>
                                <td class="border">
                                    <?php switch ($key) {
                                        case 'id':
                                            echo "ID hóa đơn";
                                            break;
                                        case 'create_at':
                                            echo "Thời gian đặt";
                                            break;
                                        case 'bill_status':
                                            echo "Trạng thái đơn";
                                            break;
                                        case 'payment_type':
                                            echo "Hình thức thanh toán";
                                            break;
                                        case 'user_id':
                                            echo "ID người mua";
                                            break;
                                        case 'user_name':
                                            echo "Tên người mua";
                                            break;
                                        case 'user_email':
                                            echo "Email";
                                            break;
                                        case 'user_address':
                                            echo "Địa chỉ giao hàng";
                                            break;
                                        case 'user_phone':
                                            echo "Điện thoại liên hệ";
                                            break;
                                        case 'total':
                                            echo "Tổng tiền";
                                            break;
                                        default:
                                            echo $key;
                                            break;
                                    } ?>
                                </td>
                                <td class="border">
                                    <?php
                                    switch ($key) {
                                        case 'total':
                                            echo number_format($value, 0, ',', '.') . "đ";
                                            break;
                                        case 'bill_status':
                                            echo $statusLabels[$value];
                                            break;
                                        case 'payment_type':
                                            echo $paymentLabels[$value];
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
                <a class="btn btn-success" href="<?= BASE_URL_ADMIN . '&act=bills-index' ?>">Quay lại</a>
            </div>
        </div>
        <!-- Bảng 2 -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>Danh sách sản phẩm
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Dung lượng</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Dung lượng</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($itemDetail as $item): ?>
                            <tr>
                                <td><?= $item['product_id'] ?></td>
                                <td>
                                    <img src="<?= BASE_ASSETS_UPLOADS . $item['product_img'] ?>" alt="" width="100px">
                                </td>
                                <td><?= $item['product_name'] ?></td>
                                <td><?= $item['color_value'] ?></td>
                                <td><?= $item['size_value'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= number_format($item['product_price'], 0, ',', '.') . "đ" ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>