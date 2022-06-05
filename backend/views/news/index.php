<?php
?>
<h2>Danh sách tin tức</h2>
<a href="index.php?controller=news&action=create" class="btn btn-success">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<br>
<br>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Name</th>
        <th>Summary</th>
        <th>Avatar</th>

        <th>Created at</th>
        <th>Updated at</th>
        <th>Action</th>
    </tr>
    <?php if (!empty($news)): ?>
        <?php foreach ($news as $new): ?>
            <tr>
                <td><?php echo $new['id'] ?></td>
                <td><?php echo $new['category_name'] ?></td>
                <td><?php echo $new['name'] ?></td>
                <td><?php echo $new['summary'] ?></td>
                <td>
                    <?php if (!empty($new['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $new['avatar'] ?>"/>
                    <?php endif; ?>
                </td>


                <td><?php echo date('d-m-Y H:i:s', strtotime($new['created_at'])) ?></td>
                <td><?php echo !empty($new['updated_at']) ? date('d-m-Y H:i:s', strtotime($new['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_detail = "../frontend/index.php?controller=news&action=detail&id=" . $new['id'];
                    $url_update = "index.php?controller=news&action=update&id=" . $new['id'];
                    $url_delete = "index.php?controller=news&action=delete&id=" . $new['id'];
                    ?>
                    <a title="Detail" target="_blank" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
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
<p><?php echo $pages ?></p>