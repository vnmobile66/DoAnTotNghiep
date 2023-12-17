<?php
    include("includes/header.php");
    include("middleware/adminMiddleware.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Thêm Danh mục</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Tên danh mục</label>
                                <input type="text" name="category_name" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Hình ảnh</label>
                                <input type="file" name="category_images" id="" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="category-save">Lưu</button>
                                <button class="btn btn-primary" name="category-cancel">Thoát</button>
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