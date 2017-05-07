<?php include 'view/fp_header.php'; ?>
<main>
    <h1>Reset password!!</h1>
    <h3><?php echo $message ; ?></h3>
    
    <form action="index.php" method="post" id="reset_form">
    <input type=hidden name="action" value="pwd_reset">
        
	<input type="hidden" name="userid" value="<?php echo $result[0]['userid']; ?>" />
        <input type="hidden" name="uname"  value="<?php echo $result[0]['uname'];  ?>" />

	<label>Question: <?php echo $result[0]['resetq']; ?></label><br><br>

        <label>Answer: </label>
	<input type="text" name="reseta" placeholder="Your answer" /><br><br><br>

	<label>New password:</label>
	<input type="password" name="password"><br><br>

	<label>Retype password: </label>
	<input type="password" name="pass_temp"><br><br>
	
	<label>&nbsp;</label>
	<input type="submit" value="Submit" /><br><br>
    
    </form>
</main>
<?php include 'view/fp_footer.php'; ?>
