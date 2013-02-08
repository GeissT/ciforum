<table width="100%">
    <tr>
        <th>Forum ID</th>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Actions</th>
    </tr>

<?php
foreach($posts as $post) {
?>

    <tr>
        <td><center><?= $post->fid ?></td>
        <td><center><?= $post->pid ?></td>
        <td><center><?= $post->postTitle ?></td>
        <td><center><?= $post->postAuthor ?></td>
        <td><center><a href="<?= site_url('admin/post/' . $post->pid) ?>">Edit</a> | <a href="<?= site_url('admin/post/delete/' . $post->pid) ?>">Delete</a></td>
    </tr>

<?php
}
?>

</table>