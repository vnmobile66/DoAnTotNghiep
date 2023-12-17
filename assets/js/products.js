$('.addToCart').click(function (e){
  e.preventDefault();
  var qty = $(this).closest('.products-data').find('.qty').val();
  var prod_id = $(this).val();
  $.ajax({
    method: "POST",
    url: "functions/handlecart.php",
    data: {
      "prod_id": prod_id,
      "prod_qty": qty,
      "scope": "add"
    },
    success: function (response){
      if(response == 401){
        alert("Vui lòng đăng nhập");
      }
      else if(response == 200){
        alert("Thành công");
      }
      else if(response == "active"){
        alert("Đã có trong giỏ hàng");
      }
      else{
        alert("Thất bại");
      }
    }
  })
})