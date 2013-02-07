<?php echo form_open('user/register'); ?>
<table style="margin:auto;">
    <?php if(validation_errors()) {?>
    <tr>
        <td colspan="2" style="background-color: #C1C1C1;"><center><?php echo validation_errors(); ?></center></td>
    </tr>
    <?php } ?>
    <tr>
        <td>Username</td>
        <td><input type="text" name="username" value="" /></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password" value="" /></td>
    </tr>
    <tr>
        <td>Confirm Password</td>
        <td><input type="password" name="password_conf" value="" /></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email" value="" /></td>
    </tr>
    <tr>
        <td>Confirm Email</td>
        <td><input type="text" name="email_conf" value="" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Submit" /></td>
    </tr>
</table>