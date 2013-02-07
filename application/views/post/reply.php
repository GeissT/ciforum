<?php echo form_open('post/reply/' . $pid); ?>
<table style="margin:auto;">
    <?php if(validation_errors()) {?>
    <tr>
        <td colspan="2" style="background-color: #C1C1C1;"><center><?php echo validation_errors(); ?></center></td>
    </tr>
    <?php } ?>
    <tr>
        <td>Reply</td>
        <td><input type="text" name="content" value="" /></td>
    </tr>
        <td></td>
        <td><input type="submit" value="Submit" /></td>
    </tr>
</table>