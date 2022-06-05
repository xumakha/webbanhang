<?php
?>
<h2>Danh sách danh mục</h2>
<a href="index.php?controller=category&action=create" class="btn btn-success">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<br>
<br>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Category name</th>
        <th>Type</th>
        <th>Avatar</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Action</th>
    </tr>
    <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category['id'] ?></td>
                <td><?php echo $category['name'] ?></td>
                <td><?php echo $category['type'] ?></td>
                <td>
                    <?php if (!empty($category['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $category['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo $category['description'] ?></td>
                <td><?php echo $category['status'] ?></td>

                <td><?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])) ?></td>
                <td><?php echo !empty($category['updated_at']) ? date('d-m-Y H:i:s', strtotime($category['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=category&action=detail&id=" . $category['id'];
                    $url_update = "index.php?controller=category&action=update&id=" . $category['id'];
                    $url_delete = "index.php?controller=category&action=delete&id=" . $category['id'];
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
</table
    <p><?php echo $pages ?></p>