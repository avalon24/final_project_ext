<?php include 'view/fp_header.php'; ?>
<main>
    <h1>Login Page!!</h1>
    <h3><?php echo $message ?></h3>
    <h4><?php echo $success ?></h4>
    <form action="index.php" method="post" id="login_form">
        <input type=hidden name="action" value="user_login">

	<label>User ID: </label>
	<input type="text" name="user_name" placeholder="Your email ID" />
	<br>

	<label>Password: </label>
	<input type="password" name="user_pwd" />
	<br>

	<label>&nbsp;</label>
	<input type="submit" value="Login" />
	<br><br>
    </form>

    <a href="register.php">New user</a>  |  <a href="pwd_reset.php">Forgot Password</a>
    
</main>
<?php include 'view/fp_footer.php'; ?>
