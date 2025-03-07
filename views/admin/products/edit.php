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

        <form class="border p-4" action="<?= BASE_URL_ADMIN . '&act=products-update&id=' . $product['id'] ?>"
            method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?= $product['name'] ?? null ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="category" class="form-label">Thể loại</label>
                        <select id="category" class="form-control" name="category_id">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?= $category['id'] ?>"
                                    <?= $product['category_id'] == $category['id'] ? "selected" : "" ?>>
                                    <?= $category['name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="brand" class="form-label">Nhãn hiệu</label>
                        <select id="brand" class="form-control" name="brand_id">
                            <?php foreach ($brands as $brand) { ?>
                                <option value="<?= $brand['id'] ?>"
                                    <?= $product['brand_id'] == $brand['id'] ? "selected" : "" ?>>
                                    <?= $brand['name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="price" class="form-label">Giá chưa giảm:</label>
                        <input type="text" class="form-control" id="price" name="price"
                            value="<?= $product['price'] ?? null ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="sale_price" class="form-label">Giá đã giảm:</label>
                        <input type="text" class="form-control" id="sale_price" name="sale_price"
                            value="<?= $product['sale_price'] ?? null ?>">
                    </div>
                </div>


                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh sản phẩm:</label>
                    <input type="file" class="form-control" id="image" name="image">

                    <?php if (!empty($product['image'])): ?>
                        <img src="<?= BASE_ASSETS_UPLOADS . $product['image'] ?>" width="100px">
                    <?php endif; ?>
                </div>
                <div class="col-12 border rounded-2 p-2">
                    <p>Biến thể sản phẩm:</p>
                    <div id="multi_varian">
                        <div class="items-varian">
                            <?php foreach ($variantGetProduct as $key => $variant): ?>
                                <div class="variant-item" data-index="<?= $key ?>">
                                    <div class="row p-2 mb-3">
                                        <div class="col-4">
                                            <label for="size" class="form-label">dung lượng:</label>
                                            <div class="btn-group">
                                                <?php foreach ($variant_size as $size): ?>
                                                    <input
                                                        type="radio"
                                                        class="btn-check"
                                                        name="data_variant[<?= $key ?>][size_id]"
                                                        value="<?= $size['id'] ?>"
                                                        id="size_<?= $key ?>_<?= $size['id'] ?>"
                                                        <?= $variant['vr_size_id'] == $size['id'] ? 'checked' : '' ?>
                                                        autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="size_<?= $key ?>_<?= $size['id'] ?>">
                                                        <?= $size['size_value'] ?>
                                                    </label>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="color" class="form-label">Màu sắc:</label>
                                            <div class="btn-group">
                                                <?php foreach ($variant_color as $color): ?>
                                                    <input
                                                        type="radio"
                                                        class="btn-check"
                                                        name="data_variant[<?= $key ?>][color_id]"
                                                        value="<?= $color['id'] ?>"
                                                        id="color_<?= $key ?>_<?= $color['id'] ?>"
                                                        <?= $variant['vr_color_id'] == $color['id'] ? 'checked' : '' ?>
                                                        autocomplete="off">
                                                    <label class="btn btn-outline-primary" for="color_<?= $key ?>_<?= $color['id'] ?>">
                                                        <?= $color['color_value'] ?>
                                                    </label>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="quantity" class="form-label">Số Lượng:</label>
                                            <input type="number" class="form-control" name="data_variant[<?= $key ?>][quantity]" value="<?= $variant['vr_variant_quantity'] ?>">
                                        </div>
                                    </div>

                                    <div class="row p-2 mb-3">
                                        <div class="col-6">
                                            <label for="price-varian" class="form-label">Giá:</label>
                                            <input type="text" class="form-control" name="data_variant[<?= $key ?>][price-varian]" value="<?= $variant['vr_variant_price'] ?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="price-sale-varian" class="form-label">Giá Sale:</label>
                                            <input type="text" class="form-control" name="data_variant[<?= $key ?>][price-sale-varian]" value="<?= $variant['vr_variant_price_sale'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3 text-end me-2 ">
                                        <a onclick="deleteVariant(this, <?= $key ?>)" class="btn btn-outline-danger">Xóa</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="mb-3 mt-3 text-end me-2">
                        <a onclick="createVarian()" class="btn btn-outline-secondary">Thêm Biến Thể</a>
                    </div>
                </div>
                <div class="mb-3 mt-3">
                    <label for="description">Mô tả của sản phẩm:</label>
                    <textarea class="form-control" id="description" name="description"><?= $product['description'] ?></textarea>

                </div>
                <div class="mb-3 mt-3">
                    <label for="content">Giới thiệu của sản phẩm:</label>
                    <textarea class="form-control" id="content" name="content"><?= $product['content'] ?></textarea>
                </div>
            </div>
            <a class="btn btn-dark" href="<?= BASE_URL_ADMIN ?>&act=products-index">Quay lại trang danh sách</a>
            <button class="btn btn-success " type="submit">Update</button>

        </form>

        <?php unset($_SESSION['data']) ?>
    </div>
    </div>
    </div>
</main>