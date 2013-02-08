<?php echo form_open('admin/forum/' . $id); ?>
<table style="margin:auto;">
    <?php if (validation_errors()) { ?>
        <tr>
            <td colspan="2" style="background-color: #C1C1C1;"><center><?php echo validation_errors(); ?></center></td>
    </tr>
<?php } ?>

    <tr>
        <td>Title</td>
        <td><input type="text" name="title" value="<?= $forum->title ?>" /></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><input type="text" name="description" value="<?= $forum->description ?>" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Submit" /></td>
    </tr>

</table>