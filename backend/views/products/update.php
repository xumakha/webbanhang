<div class="lte-dashboard">
    <div class="row">
        <div class='col-xs-12'>

        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class='col-xs-12'>
            <div class='box box-header'>
                <div class='box-header'>
                    <h3 class="box-title"><i class="fa fa-edit"></i> Form cập nhật sản phẩm</h3>
                </div>
                <div class='box-body'>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="category_id">Chọn danh mục</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <?php
                                foreach ($categories as $category):
                                    $selected = '';
                                    if ($category['id'] == $product['category_id']) {
                                        $selected = 'selected';
                                    }
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
                            <label for="title">Nhập tên sản phẩm</label>
                            <input type="text" name="title" value="<?php echo $product['title'] ?>"
                                   class="form-control" id="title"/>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="avatar">Ảnh đại diện</label>
                                <input id="avatar" type="file" name="avatar" onchange="PreviewImage();" />
                                <br>
                                <img id="uploadPreview" src="assets/uploads/<?php if (isset($product['avatar'])){echo $product['avatar']; } ?>" style="width: 20%; height: 20%;" />
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
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="number" name="price" value="<?php echo $product['price'] ?>"
                                   class="form-control" id="price"/>
                        </div>
                        <div class="form-group">
                            <label for="amount">Số lượng</label>
                            <input type="number" name="amount" value="<?php echo $product['amount'] ?>"
                                   class="form-control" id="amount"/>
                        </div>
                        <div class="form-group">
                            <label for="summary">Mô tả ngắn sản phẩm</label>
                            <textarea name="summary" id="summary"
                                      class="form-control"><?php echo $product['summary'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả chi tiết sản phẩm</label>
                            <textarea name="content" id="description"
                                      class="form-control"><?php echo $product['content'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
                            <a href="index.php?controller=product&action=index" class="btn btn-default">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>