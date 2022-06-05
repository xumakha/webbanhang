
<h2>Cập nhật user</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"
               value="<?php echo $user['username'] ?>" disabled class="form-control"/>
    </div>
    <div class="form-group">
        <label for="first_name">First_name</label>
        <input type="text" name="first_name" id="first_name"
               value="<?php echo $user['first_name'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="last_name">Last_name</label>
        <input type="text" name="last_name" id="last_name"
               value="<?php echo $user['last_name'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone"
               value="<?php echo $user['phone'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"
               value="<?php echo $user['email'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address"
               value="<?php echo $user['address'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <div class="form-group">
            <label for="avatar">Ảnh đại diện</label>
            <input id="avatar" type="file" name="avatar" onchange="PreviewImage();" />
            <br>
            <img id="uploadPreview" src="assets/uploads/<?php if (isset($user['avatar'])){echo $user['avatar']; } ?>" style="width: 20%; height: 20%;" />
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
        <label for="jobs">Jobs</label>
        <input type="text" name="jobs" id="jobs"
               value="<?php echo $user['jobs'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="facebook">Facebook</label>
        <input type="text" name="facebook" id="facebook"
               value="<?php echo $user['facebook'] ?>"
               class="form-control"/>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=user&action=index" class="btn btn-default">Back</a>
        <a style="float: right" href="index.php?controller=user&action=changePassword&id=<?php echo $user['id'] ?>" class="changepw btn btn-red">Đổi mật khẩu</a>
    </div>

</form>
