<?php
    include("includes/header.php");
    include("middleware/adminMiddleware.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Thêm Sản phẩm</h4>
                </div>
                <div class="card-body">
                    <form action="products_processor.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="">Tên sản phẩm</label>
                                <input type="text" name="products_name" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="">Hình ảnh</label>
                                <input type="file" name="products_image" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="">Tên danh mục</label>
                                <select name="category_id" class="form-select text-center">
                                    <option selected>-- Chọn Danh Mục --</option>  
                                    <?php
                                        $categories = getAll("categories");
                                        if(mysqli_num_rows($categories) > 0){
                                            foreach($categories as $item) {
                                    ?>
                                                <option value="<?php echo $item["category_id"];?>"><?php echo $item["category_name"];?></option>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "Không có danh mục";
                                        }
                                    ?>      
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="">Tên thương hiệu</label>
                                <select name="brand_id" class="form-select text-center">
                                    <option selected>-- Chọn Thương Hiệu --</option>  
                                    <?php
                                        $categories = getAll("brand_tbl");
                                        if(mysqli_num_rows($categories) > 0){
                                            foreach($categories as $item) {
                                    ?>
                                                <option value="<?php echo $item["brand_id"];?>"><?php echo $item["brand_name"];?></option>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "Không có thương hiệu";
                                        }
                                    ?>      
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="mt-2 mb-0" for="">Giá niêm yết</label>
                                <input type="number" name="products_price" id="" class="form-control" min="0" step="50000">
                            </div>
                            <div class="col-md-4">
                                <label class="mt-2 mb-0" for="">Giá khuyến mãi</label>
                                <input type="number" name="products_price_sales" id="" class="form-control" min="0" step="50000">
                            </div>
                            <div class="col-md-4">
                                <label class="mt-2 mb-0" for="">Số lượng</label>
                                <input type="number" name="products_qty" id="" class="form-control" min="1">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="sale">Khuyến mãi</label>
                                <input type="checkbox" name="sales" id="sale">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="showhomepage">Hiển thị trang chủ</label>
                                <input type="checkbox" name="show" id="showhomepage">
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="">Cấu hình chi tiết</label>
                                <textarea name="products_parameter" id="editor" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mt-2 mb-0" for="">Mô tả sản phẩm</label>
                                <textarea class="w-100" name="products_describe" id="describe" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="products-save">Lưu</button>
                                <button class="btn btn-primary" name="products-cancel">Thoát</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>