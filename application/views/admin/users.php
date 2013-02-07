<table width="100%">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

<?php
foreach($users as $user) {
?>

    <tr>
        <td><center><?= $user->id ?></td>
        <td><center><?= $user->username ?></td>
        <td><center><?= ucfirst($user->role) ?></td>
        <td><center><?= $user->email ?></td>
        <td><center><a href="<?= site_url('admin/user/' . $user->id) ?>">Edit</a> | <a href="<?= site_url('admin/user/delete/' . $user->id) ?>">Delete</a></td>
    </tr>

<?php
}
?>

</table>