<div id="noPosts"><center>There are no posts to display!</center></div>

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