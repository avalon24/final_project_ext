<?php include 'view/fp_header.php'; ?>
<main>
    <h1>Forgot password!!</h1>
    <h3><?php echo $message ?></h3>
    <h4>Please enter your details below:</h4>
    <form action="index.php" method="post" id="reset_form">
    <input type=hidden name="action" value="get_ques">

	<center><label>User ID: </label>
	<input type="text" name="user_name" placeholder="Your email ID" /><br><br>

	<label>&nbsp;</label>
	<input type="submit" value="Enter" /><br><br>
    </form>
</main>
<?php include 'view/fp_footer.php'; ?>
