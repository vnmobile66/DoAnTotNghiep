$(document).ready(function (){
    $('.delete-products').click(function (e) {
        e.preventDefault();
        var id = $(this).val();
        swal({
            title: "Bạn chắc chắn muốn xóa sản phẩm?",
            text: "Sau khi xóa, sản phẩm sẽ không thể khôi phục",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "products_processor.php",
                    data: {
                        'products_id': id,
                        'delete-products': true
                    },
                    success: function (response){
                        console.log(response)
                        if(response == 200){
                            swal({
                                title: "Thành công",
                                text: "Đã xóa sản phẩm",
                                icon: "success",
                            });
                            $("#products_table").load(location.href + " #products_table")
                        }
                        else if(response == 500){
                            swal({
                                title: "Thất bại",
                                text: "Không thể xóa sản phẩm",
                                icon: "error",
                            });
                        }
                    }
                });
            } else {
                swal("Mời bạn xem tiếp sản phẩm");
            }
        });
    })
});