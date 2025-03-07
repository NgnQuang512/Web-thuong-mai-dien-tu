<script>
    let selectedSizeId = null;
    let selectedColorId = null;
    let variants = <?php echo json_encode($variants); ?>;

    function selectVariant(id, type) {
        if (type === 'size') {
            selectedSizeId = id;
            selectedColorId = null;
        } else if (type === 'color') {
            selectedColorId = id;
        }
        highlightSelection(type, id);
        if (selectedSizeId !== null && selectedColorId !== null) {
            const selectedVariant = variants.find(variant =>
                variant.vr_size_id === selectedSizeId && variant.vr_color_id === selectedColorId
            );

            if (selectedVariant) {
                document.getElementById('variant').value = selectedVariant.v_id;
                console.log("Selected vr_id:", selectedVariant.v_id);
            } else {
                console.log('Không tìm thấy variant phù hợp.');
            }
        }

    }
    function highlightSelection(type, value) {
    let elements = document.querySelectorAll(`.${type}-option`);
    elements.forEach(el => {
        if (el.getAttribute(`data-${type}-id`) === value.toString()) {
            el.style.borderColor = "#fd2424"; // Màu viền khi được chọn
            el.style.boxShadow = "0 0 5px rgba(253, 36, 36, 0.5)"; // Thêm bóng đổ để nổi bật
        } else {
            el.style.borderColor = "#d1d5db"; // Màu viền mặc định
            el.style.boxShadow = "none"; // Xóa bóng đổ nếu không chọn
        }
    });
}
</script>