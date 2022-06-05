<?php
?>
<h1>Form thêm mới danh mục</h1>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nhập tên</label>
        <input type="text" name="name" value="" class="form-control" id="name"/>
    </div>
    <div class="form-group">
        <div class="form-group">
            <label for="avatar">Ảnh đại diện</label>
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
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="number" name="status" value="" class="form-control" id="avatar"/>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" value="" class="form-control" id="description"/>
    </div>

    <input type="submit" name="submit" value="Save" class="btn btn-primary">
    <a href="index.php?controller=category&action=index" class="btn btn-default">Back</a>
</form>
