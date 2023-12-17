<?php
    include("includes/header.php");
    include("middleware/adminMiddleware.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Thêm Thương hiệu</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Tên thương hiệu</label>
                                <input type="text" name="brand_name" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Hình ảnh</label>
                                <input type="file" name="brand_image" id="" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Tên danh mục</label>
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
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="brand-save">Lưu</button>
                                <button class="btn btn-primary" name="brand-cancel">Thoát</button>
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