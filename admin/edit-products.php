<?php
    include("includes/header.php");
    include("middleware/adminMiddleware.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET["id"])){
                    $id = $_GET['id'];
                    $products = getProductsId("products_tbl",$id);
                    if(mysqli_num_rows($products) > 0){
                        $data = mysqli_fetch_array($products);
            ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm Sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <form action="products_processor.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="products_id" value="<?php echo $data["products_id"];?>">
                                <div class="col-md-6">
                                    <label class="mt-2 mb-0" for="">Tên sản phẩm</label>
                                    <input type="text" name="products_name" id="" class="form-control" value="<?php echo $data["products_name"];?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="mt-2 mb-0" for="">Hình ảnh</label>
                                    <input type="file" name="products_image" id="" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Hình ảnh hiện tại</label>
                                    <div>
                                        <input type="hidden" name="old_image" value="<?php echo $data["products_image"];?>">
                                        <img style="width: 50px; height: 50px;" src="../uploads/products/<?php echo $data['products_image'];?>" alt="">
                                    </div>
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
                                                    <option value="<?php echo $item["category_id"];?>"<?php echo $data["category_id"] == $item["category_id"]?'selected':'';?>><?php echo $item["category_name"];?></option>
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
                                                    <option value="<?php echo $item["brand_id"];?>"<?php echo $data["brand_id"]==$item["brand_id"]?'selected':'';?>><?php echo $item["brand_name"];?></option>
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
                                    <input type="number" name="products_price" id="" class="form-control" min="0" step="50000" value="<?php echo $data["products_price"];?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="mt-2 mb-0" for="">Giá khuyến mãi</label>
                                    <input type="number" name="products_price_sales" id="" class="form-control" min="0" step="50000" value="<?php echo $data["products_price_sales"];?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="mt-2 mb-0" for="">Số lượng</label>
                                    <input type="number" name="products_qty" id="" class="form-control" min="1" value="<?php echo $data["products_qty"];?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="mt-2 mb-0" for="sale">Khuyến mãi</label>
                                    <input type="checkbox" name="sales" id="sale" <?php echo $data["deal"]=='1'?'checked':''?>>
                                </div>
                                <div class="col-md-6">
                                    <label class="mt-2 mb-0" for="showhomepage">Hiển thị trang chủ</label>
                                    <input type="checkbox" name="show" id="showhomepage" <?php echo $data["active_homepage"]=='1'?'checked':''?>>
                                </div>
                                <div class="col-md-6">
                                    <label class="mt-2 mb-0" for="">Cấu hình chi tiết</label>
                                    <textarea name="products_parameter" id="editor" cols="30" rows="10" value=""><?php echo $data["products_parameter"];?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="mt-2 mb-0" for="">Mô tả sản phẩm</label>
                                    <textarea class="w-100" name="products_describe" id="describe" cols="30" rows="10" value=""><?php echo $data["products_describe"];?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="products-update">Thay đổi</button>
                                    <button class="btn btn-primary" name="products-cancel">Thoát</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php
                    }
                    else{
                        echo "Sản phẩm không tồn tại";
                    }
                }
                else{
                    echo "Không có sản phẩm";
                };
            ?>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>