<html>
    <head>
        <title>ciForum</title>
        <link href="<?= site_url('public/css/default.css') ?>" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="logowrapper">
            <table width="100%">
                <tr>
                    <td width="80%">
                        <font size="7">ciForum 0.1d</font>
                    </td>
                    <td width="20%">
                        <table align="center">
                            <tr> <?php if ($loggedIn == 0) { ?>
                                    <td><a href="<?= site_url('user/login') ?>">Login</a></td>
                                    <td>|</td>
                                    <td><a href="<?= site_url('user/register') ?>">Register</td>
                                <?php } ?>
                                <?php if ($loggedIn == 1) { ?>
                                    <td><a href="<?= site_url('user') ?>">My Account</a></td>
                                    <td>|</td>
                                    <td><a href="<?= site_url('user/logout') ?>">Logout</td>
                                <?php } ?>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div id="headwrapper">
            <!-- NAVIGATION START -->
            <table width="70%" id="nav">
                <tr>
                    <td width="25%">
                <center><a href="<?= site_url() ?>">Home</a></center>
                </td>
                <td>
                    |
                </td>
                <td width="25%">
                <center><a href="<?= site_url('about') ?>">About</a></center>
                </td>
                <td>
                    |
                </td>
                <td width="25%">
                <center><a href="<?= site_url('members') ?>">Members</a></center>
                </td>
                <td>
                    |
                </td>
                <td width="25%">
                <center><a href="<?= site_url('contact') ?>">Contact</a></center>
                </td>
                </tr>
            </table>
            <!-- NAVIGATION END -->
        </div>
        <div id="wrapper">
            <table width="100%" id="main" cellspacing="0">
                <tr>
                    <td id='forumTitle' width='70%'><center><b>Forum</b></center></td>
                <td id='postcount' width='70%'><center><b>Post Count</b></center></td>
                </tr>