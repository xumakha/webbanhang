<?php
?>
<h2>Danh sách phản hồi</h2>
<br>
<br>
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Action</th>
    </tr>
    <?php if (!empty($contacts)): ?>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?php echo $contact['id'] ?></td>
                <td><?php echo $contact['name'] ?></td>
                <td><?php echo $contact['email'] ?></td>
                <td><?php echo $contact['subject'] ?></td>
                <td><?php echo $contact['message'] ?></td>
                <td>
                    <?php
                    $url_delete = "index.php?controller=contact&action=delete&id=" . $contact['id'];
                    ?>
                    <a title="Delete" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif; ?>
</table>
<!--<p>--><?php //echo $pages ?><!--</p>-->