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
                    $category = getById('categories', $id);

                    if(mysqli_num_rows($category) > 0){
                        $data = mysqli_fetch_array($category);
            ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Sửa Danh mục</h4>
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="category_id" value="<?php echo $data["category_id"];?>">
                                            <label for="">Tên danh mục</label>
                                            <input type="text" name="category_name" id="" class="form-control" value="<?php echo $data["category_name"];?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Hình ảnh</label>
                                            <input type="file" name="category_images" id="" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Hình ảnh hiện tại</label>
                                            <div>
                                                <input type="hidden" name="old_images" value="<?php echo $data["category_image"];?>">
                                                <img style="width: 50px; height: 50px;" src="../uploads/<?php echo $data['category_image'];?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" name="category-update">Thay đổi</button>
                                            <button class="btn btn-primary" name="category-cancel">Thoát</button>
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