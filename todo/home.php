<?php include '../view/fp_header.php'; ?>
<main>
    <h4>Welcome...<?php echo $_COOKIE['login']; echo $success; ?></h4><br><br>

    <form action="index.php" method="post" name="upd_prof_form">
    <input type="hidden" name="action" value="upd_profile" >
        <label><i># Update your profile data</i></label>
	<input type=submit value="Go">
    </form><br><br>

    <form action="change_pwd.php" method="post" name="pwd_chng_form">
    <input type="hidden" name="action" value="pwd_change" >
        <label><i># Change Password</i></label>
	<input type="submit" value="Go">
    </form><br><br>

    <form action="index.php" method="post" name="pending_form">
    <input type="hidden" name="action" value="pending_items">
        <label><i># List of pending items</i></label>
	<input type="submit" value="Go">
    </form><br><br>

    <form action="index.php" method="post" name="finished_form">
    <input type="hidden" name="action" value="finished_items" >
        <label><i># List of finished items</i></label>
	<input type="submit" value="Go">
    </form><br><br><br><br>

    <form action="../index.php" method="post" name="logout_form">
    <input type="hidden" name="action" value="user_logout">
        <label>&nbsp;</label>
	<input type="submit" value="Logout" />
    </form><br><br>
</main>
<?php include '../view/fp_footer.php'; ?>
