<?php echo form_open('post/add/' . $fid); ?>
<table style="margin:auto;">
    <tr>
        <td>Title</td>
        <td><input type="text" name="title" value="" /></td>
    </tr>
    <tr>
        <td>Content</td>
        <td><textarea rows="5" cols="80" name="content"></textarea></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Submit" /></td>
    </tr>
</table>