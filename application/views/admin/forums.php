<table width="100%">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>

<?php
foreach($forums as $category) {
?>

    <tr>
        <td><center><?= $category->fid ?></td>
        <td><center><?= $category->title ?></td>
        <td><center><?= $category->description ?></td>
        <td><center><a href="<?= site_url('admin/forum/' . $category->fid) ?>">Edit</a> | <a href="<?= site_url('admin/forum/delete/' . $category->fid) ?>">Delete</a></td>
    </tr>

<?php
}
?>

</table>