
<h2>Đổi mật khẩu</h2>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="facebook">Mật khẩu cũ</label>
        <input type="password" name="password" id="facebook"
               value=""
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="facebook">Mật khẩu mới</label>
        <input type="password" name="new_password" id="facebook"
               value=""
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="facebook">Nhập lại mật khẩu mới</label>
        <input type="password" name="new_password_confirm" id="facebook"
               value=""
               class="form-control"/>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=user&action=update&id=<?php echo $_GET['id'] ?>" class="btn btn-default">Back</a>
    </div>
</form>
