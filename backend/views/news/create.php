<div class="lte-dashboard">
    <div class="row">
        <div class='col-xs-12'>
            <div class='box box-red'>

            </div>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class='col-xs-12'>
            <div class='box box-header'>
                <div class='box-header'>
                    <h3 class="box-title"><i class="fa fa-edit"></i> Form thêm mới tin tức</h3>
                </div>
                <div class='box-body'>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="category_id">Chọn danh mục</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <?php foreach ($categories as $category):
                                    $selected = '';
                                    if (isset($_POST['category_id']) && $category['id'] == $_POST['category_id']) {
                                        $selected = 'selected';
                                    }
                                    ?>
                                    <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                                        <?php echo $category['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Nhập tiêu đề tin tức</label>
                            <input type="text" name="name" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>"
                                   class="form-control" id="title"/>
                        </div>
                        <div class="form-group">
                            <label for="avatar">Ảnh thumbnail</label>
                            <input id="avatar" type="file" name="avatar" onchange="PreviewImage();" />
                            <br>
                            <img id="uploadPreview" style="width: 20%; height: 20%;" />
                            <script type="text/javascript">

                                function PreviewImage() {
                                    var oFReader = new FileReader();
                                    oFReader.readAsDataURL(document.getElementById("avatar").files[0]);

                                    oFReader.onload = function (oFREvent) {
                                        document.getElementById("uploadPreview").src = oFREvent.target.result;
                                    };
                                };

                            </script>
                        </div>
                        <div class="form-group">
                            <label for="price">Tóm tắt</label>
                            <input type="summary" name="summary" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>"
                                   class="form-control" id="price"/>
                        </div>
                        <div class="form-group">
                            <label for="amount">Nội dung</label>
                            <textarea name="content" class="form-control" id="amount"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
                            <a href="index.php?controller=news&action=index" class="btn btn-default">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>