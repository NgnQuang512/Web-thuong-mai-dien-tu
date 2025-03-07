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

        <form class="border p-4" action="<?= BASE_URL_ADMIN . '&act=sliders-update&id=' . $slider['s_id']?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Sản phẩm cũ</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $slider['p_name'] ?? null ?>" disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="date" class="form-label">Ngày chỉnh sửa</label>
                        <input 
                        type="datetime-local" 
                        class="form-control" 
                        id="created_at" 
                        name="created_at" 
                        value="<?= isset($slider['s_created_at']) ? date('Y-m-d\TH:i', strtotime($slider['s_created_at'])) : '' ?>" 
                        disabled>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="content" class="form-label">Mô tả</label>
                        <input type="text" class="form-control" id="content" name="content" value="<?= $slider['s_content'] ?? null ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                            <label for="img_slider" class="form-label">Chọn ảnh mới</label>
                            <input type="file" class="form-control" id="img_slider" name="img_slider">
                            <br/>
                            <!-- Hiển thị ảnh hiện tại nếu có -->
                            <?php if (!empty($slider['s_img_slider'])): ?>
                                <img id="currentImage" src="<?= BASE_ASSETS_UPLOADS .  $slider['s_img_slider'] ?>" class="img-fluid w-100 mx-auto" id="img_slider">
                            <?php endif; ?>

                            <!-- Thêm thẻ img để xem trước ảnh mới -->
                            <img id="previewImage" class="img-fluid w-100 mx-auto" style="display: none; margin-top: 10px;">
                        </div>
                </div>
            </div>
            <a class="btn btn-dark" href="<?= BASE_URL_ADMIN ?>&act=sliders-index">Quay lại trang danh sách</a>
            <button class="btn btn-success " type="submit">Update</button> 
        </form>
        <?php unset($_SESSION['data']) ?>
    </div>
    </div>
    </div>
</main>
<script>
// Hien thi anh
const imageInput = document.getElementById('img_slider');
const previewImage = document.getElementById('previewImage');
const currentImage = document.getElementById('currentImage');

imageInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
            if (currentImage) currentImage.style.display = 'none';
        };
        reader.readAsDataURL(file);
    } else {
        previewImage.style.display = 'none';
        if (currentImage) currentImage.style.display = 'block';
    }
});
</script>