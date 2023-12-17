<?php
    include("includes/header.php");
    include("middleware/adminMiddleware.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $brand = getBrandId('brand_tbl', $id);

                    if(mysqli_num_rows($brand) > 0){
                        $data = mysqli_fetch_array($brand);
            ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Sửa Thương hiệu</h4>
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="brand_id" value="<?php echo $data["brand_id"];?>">
                                            <label for="">Tên thương hiệu</label>
                                            <input type="text" name="brand_name" id="" class="form-control" value="<?php echo $data["brand_name"];?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Hình ảnh</label>
                                            <input type="file" name="brand_image" id="" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Hình ảnh hiện tại</label>
                                            <div>
                                                <input type="hidden" name="old_images" value="<?php echo $data["brand_image"];?>">
                                                <img style="width: 50px; height: 50px;" src="../uploads/brand/<?php echo $data['brand_image'];?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Tên danh mục</label>
                                            <select name="category_id" class="form-select text-center">
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
                                            <button type="submit" class="btn btn-primary" name="brand-update">Thay đổi</button>
                                            <button class="btn btn-primary" name="cancel">Thoát</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
            <?php
                    }
                    else{
                        echo "Danh mục không tồn tại";
                    }
                }
                else{
                    echo "Không có danh mục";
                };
            ?>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>