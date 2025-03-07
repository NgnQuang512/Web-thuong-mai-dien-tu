<script>
    const variantSizes = <?= json_encode($variant_size) ?>;
    const variantColors = <?= json_encode($variant_color) ?>;

    const createVarian = () => {
        let count_items = document.querySelectorAll('.items-varian').length;
        console.log("Bắt đầu thêm biến thể");

        const newVarian = document.getElementById('multi_varian');
        if (!newVarian) {
            console.error("Không tồn tại ID `multi_varian`");
            return;
        }

        const newElm = document.createElement('div');
        newElm.classList.add("items-varian", "border-top");

        let sizeOptions = '';
        variantSizes.forEach(size => {
            sizeOptions += `
                <input type="radio" class="btn-check" name="data_variant[${count_items}][size_id]" value="${size.id}" id="size_${count_items}_${size.id}" autocomplete="off">
                <label class="btn btn-outline-primary" for="size_${count_items}_${size.id}">${size.size_value}</label>
            `;
        });

        let colorOptions = '';
        variantColors.forEach(color => {
            colorOptions += `
                <input type="radio" class="btn-check" name="data_variant[${count_items}][color_id]" value="${color.id}" id="color_${count_items}_${color.id}" autocomplete="off">
                <label class="btn btn-outline-primary" for="color_${count_items}_${color.id}">${color.color_value}</label>
            `;
        });

        newElm.innerHTML = `
            <div class="row p-2 mb-3">
                <div class="col-4">
                    <label class="form-label">Dung lượng:</label>
                    <div class="btn-group">
                        ${sizeOptions}
                    </div>
                </div>
                <div class="col-4">
                    <label class="form-label">Màu sắc:</label>
                    <div class="btn-group">
                        ${colorOptions}
                    </div>
                </div>
                <div class="col-4">
                    <label class="form-label">Số lượng:</label>
                    <input type="number" class="form-control" name="data_variant[${count_items}][quantity]" value="">
                </div>
            </div>
            <div class="row p-2 mb-3">
                <div class="col-6">
                    <label class="form-label">Giá:</label>
                    <input type="text" class="form-control" name="data_variant[${count_items}][price-varian]">
                </div>
                <div class="col-6">
                    <label class="form-label">Giá Sale:</label>
                    <input type="text" class="form-control" name="data_variant[${count_items}][price-sale-varian]">
                </div>
            </div>
            <div class="text-end mb-3">
                <button type="button" class="btn btn-outline-danger" onclick="removeVarian(this)">Xóa</button>
            </div>
        `;

        newVarian.append(newElm);
    };

    const removeVarian = (btn) => {
        const parent = btn.closest('.items-varian');
        if (parent) {
            parent.remove();
        }
    };
</script>
