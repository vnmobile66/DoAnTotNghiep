$(document).on('input', '.cartQty', function(){
    var qty = $(this).closest('.products-data').find('.cartQty').val();
    // Bug (Chỉ thay đổi được số lượng ở sản phẩm gần nhất)
    var prod_id = $(this).closest('.products-data').find('.prodId').val();
    $.ajax({
        method: "POST",
        url: "functions/handlecart.php",
        data: {
          "prod_id": prod_id,
          "prod_qty": qty,
          "scope": "update"
        },
        success: function (response){
            if(response == 200){
                $('#myCarts').load(location.href + " #myCarts")
            }
            else{
                alert("Thất bại");
            }
        }
    })
})

$(document).on('click', '.deleteItem', function () {
    var cart_id = $(this).val();
    $.ajax({
        method: "POST",
        url: "functions/handlecart.php",
        data: {
            "cart_id": cart_id,
            "scope": "delete"
        },
        success: function (response) {
            if(response == 200){
                alert("Thành công");
                $('#myCarts').load(location.href + " #myCarts")
            }
            else{
                alert("Thất bại");
            }
        }
    });
});