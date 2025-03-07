<script>
    const variantSizes = <?= json_encode($variant_size) ?>;
    const variantColors = <?= json_encode($variant_color) ?>;

    let variantCounter = <?= count($variantGetProduct) ?>;
    const createVarian = () => {
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
                <input type="radio" class="btn-check" name="data_variant[${variantCounter}][size_id]" value="${size.id}" id="size_${variantCounter}_${size.id}" autocomplete="off">
                <label class="btn btn-outline-primary" for="size_${variantCounter}_${size.id}">${size.size_value}</label>
            `;
        });

        let colorOptions = '';
        variantColors.forEach(color => {
            colorOptions += `
                <input type="radio" class="btn-check" name="data_variant[${variantCounter}][color_id]" value="${color.id}" id="color_${variantCounter}_${color.id}" autocomplete="off">
                <label class="btn btn-outline-primary" for="color_${variantCounter}_${color.id}">${color.color_value}</label>
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
                    <input type="number" class="form-control" name="data_variant[${variantCounter}][quantity]" value="$_SESSION['data_variant'][${variantCounter}]['quantity'] ?? null">
                </div>
            </div>
            <div class="row p-2 mb-3">
                <div class="col-6">
                    <label class="form-label">Giá:</label>
                    <input type="text" class="form-control" name="data_variant[${variantCounter}][price-varian]">
                </div>
                <div class="col-6">
                    <label class="form-label">Giá Sale:</label>
                    <input type="text" class="form-control" name="data_variant[${variantCounter}][price-sale-varian]">
                </div>
            </div>
            <div class="text-end mb-3">
                <button type="button" class="btn btn-outline-danger" onclick="removeVarian(this)">Xóa</button>
            </div>
        `;
        newVarian.appendChild(newElm);

        variantCounter++;
    };

    const removeVarian = (btn) => {
        const parent = btn.closest('.items-varian');
        if (parent) {
            parent.remove();
        }
    };


    function deleteVariant(element, key) {
        const allVariants = document.querySelectorAll('.variant-item');

        if (allVariants.length === 1) {
            alert('Không được phép xóa biến thể cuối cùng!');
            return;
        }
    const variantItem = element.closest('.variant-item');
    if (variantItem) {
        variantItem.remove();
    }


}

</script>
