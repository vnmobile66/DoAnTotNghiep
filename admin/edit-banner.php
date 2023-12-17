<?php
    include("includes/header.php");
    include("middleware/adminMiddleware.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Sửa Banner</h4>
                </div>
                <?php
                if(isset($_GET["id"])){
                    $id = $_GET['id'];
                    $banners = getBannerId("banner_tbl",$id);
                    if(mysqli_num_rows($banners) > 0){
                        $data = mysqli_fetch_array($banners);
                ?>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="banner_id" value="<?php echo $data["banner_id"];?>">
                                <div class="col-md-12">
                                    <label for="">Hình ảnh hiện tại</label>
                                    <div>
                                        <input type="hidden" name="old_images" value="<?php echo $data["banner_images"];?>">
                                        <img style="width: 50%; height: 50%;" src="../uploads/banners/<?php echo $data['banner_images'];?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Hình ảnh</label>
                                    <input type="file" name="new_banner_images" id="" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="show-banner">Hiển thị</label>
                                    <input type="checkbox" name="show-banner" id="show-banner" <?php echo $data["banner_show"]=='1'?'checked':''?>>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="banner-update">Thay đổi</button>
                                    <button class="btn btn-primary" name="banner-cancel">Thoát</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>