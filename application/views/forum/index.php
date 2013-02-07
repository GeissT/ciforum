<?php foreach ($posts as $post) { ?>

    <tr>
        <td id="borderUnderPostRow"><a href="<?= site_url('/post/' . $post->pid) ?>"><?= $post->postTitle ?></a></td>
        <td id="borderUnderPostRow"><center>0</center></td>
    <td id="borderUnderPostRow"><?= $post->postAuthor ?></td>
    </tr>

<?php } ?>

<tr>
    <td height="20px"><!-- seperator --></td>
</tr>

<?php if($loggedIn == 1) { ?>
<table>
    <tr>
        <td><strong>Actions: </strong></td>
        <td><a href="<?= site_url('post/add/' . $fid) ?>">Add Post</a></td>
    </tr>
</table>
<?php
}
?>