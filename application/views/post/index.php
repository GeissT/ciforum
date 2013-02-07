<?php foreach ($post as $content) { ?>

    <tr>
        <td>
            <table width="100%" cellspacing="0">
                <tr>
                    <td id="postTitle"><b><font size="8"><?= $content->postTitle ?></font></b></td>
                    <td id="postAuthor"><i><?= $content->postAuthor ?></i></td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <!-- seperator -->
    </tr>

    <tr>
        <td id="borderUnderRow"><?= $content->postContent ?></td>
    </tr>

<?php } ?>
<?php if($loggedIn == 1) { ?>
<table>
    <tr>
        <td><strong>Actions: </strong></td>
        <td><a href="<?= site_url('post/reply/' . $pid) ?>">Add Reply</a></td>
    </tr>
</table>
<?php
}
?>
<?php
if (isset($replies)) {
    foreach ($replies as $reply) {
        ?>
        <tr>
            <td>
                <table width="100%" cellspacing="0" border="1px solid">
                    <tr>
                        <td style="width: 15%;">
                            <b><?= $reply->author ?></b>
                        </td>
                        <td style="width: 85%;">
                            <?= $reply->content ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    <?php
    }
}
?>