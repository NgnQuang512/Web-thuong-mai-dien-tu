$(document).ready(function () {
  $("#inputSearch").keyup(() => {
    const nameProduct = $("#inputSearch").val();
    if (nameProduct != "") {
      $.ajax({
        url: "index.php?act=search",
        method: "POST",
        data: {
          nameProduct: nameProduct,
        },
        success: function (data) {
          $("#searchResult").html(data);
          $("#searchResult").css("display", "block");

          $("#searchResult div").click(function () {
            const selectedProduct = $(this).text();
            const productId = $(this).data("id");  // Id sản phẩm
            $("#inputSearch").val(selectedProduct);
            $("#selectedProductId").val(productId);  // Lưu vào hidden field
            $("#searchResult").css("display", "none");
          });
        },
      });
    } else {
      $("#searchResult").css("display", "none");
    }
  });

  $(document).on("click", function (e) {
    if (!$(e.target).closest("#inputSearch, #searchResult").length) {
      $("#searchResult").css("display", "none");
    }
  });
});
