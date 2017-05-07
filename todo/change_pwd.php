<?php include 'view/fp_header.php'; ?>
<main>
    <h1>Change password!!</h1>
    <h3><?php echo $message; ?></h3>
    <h4>Hi <?php echo $_COOKIE['login'] ?>, please update: </h4>    
    <form action="index.php" method="post" id="reset_form">
    <input type=hidden name="action" value="change_pwd">
        
	<input type="hidden" name="userid" value="<?php echo $_COOKIE['userid']; ?>" />
	<input type="hidden" name="reseta" value="<?php echo $_COOKIE['secret_ans']; ?>" />

	<label>New password:</label>
	<input type="password" name="password"><br><br>

	<label>Retype password: </label>
	<input type="password" name="pass_temp"><br><br>
	
	<label>&nbsp;</label>
	<input type="submit" value="Submit" /><br><br>
    
    </form>
</main>
<?php include 'view/fp_footer.php'; ?>
