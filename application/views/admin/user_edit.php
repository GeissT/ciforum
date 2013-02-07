<?php echo form_open('admin/user/' . $id); ?>
<table style="margin:auto;">
    <?php if (validation_errors()) { ?>
        <tr>
            <td colspan="2" style="background-color: #C1C1C1;"><center><?php echo validation_errors(); ?></center></td>
    </tr>
<?php } ?>

<?php foreach ($user as $client) { ?>
    <tr>
        <td>Username</td>
        <td><input type="text" name="username" value="<?= $client->username ?>" /></td>
    </tr>
    <tr>
        <td>New Password</td>
        <td><input type="password" name="password" value="" /></td>
    </tr>
    <tr>
        <td>Role</td>
        <td><select name="role">
                <option value="blank"></option>
                <option value="admin">Admin</option>
                <option value="mod">Moderator</option>
                <option value="mem">Normal Member</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>New Email</td>
        <td><input type="text" name="email" value="<?= $client->email ?>" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Submit" /></td>
    </tr>
<?php } ?>

</table>