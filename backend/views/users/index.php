<?php
?>



<h2>Danh sách user</h2>
<br>
<br>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>User name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Email</th>
        <th>Avatar</th>
        <th>Jobs</th>
        <th>Facebook</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['first_name'] ?></td>
                <td><?php echo $user['last_name'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td><?php echo $user['address'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td>
                    <img style="width: 100px; height: 100px;" src="assets/uploads/<?php echo $user['avatar'] ?>">
                </td>
                <td><?php echo $user['jobs'] ?></td>
                <td>
                    <a target="_blank" href="<?php echo $user['facebook'] ?>">
                        <?php echo $user['facebook'] ?>
                    </a>
                </td>
                <td><?php echo $user['created_at'] ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=user&action=detail&id=" . $user['id'];
                    $url_update = "index.php?controller=user&action=update&id=" . $user['id'];
                    $url_delete = "index.php?controller=user&action=delete&id=" . $user['id'];
                    ?>
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif; ?>
</table>