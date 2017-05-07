<?php include 'view/fp_header.php';?>
<main>
    <h3><?php echo $message ?></h3>
    <h5><i> * marked fields are mandatory!</i><h5>
    <h4>Enter your personal details below:</h4>
    <form action="index.php" method="post" id="register_form">
        <input type="hidden" name="action" value="new_user">

	<label>*Given Name: </label>
	<input type="text" name="f_name" placeholder="Your name" /><br>

        <label>*Last Name: </label>
        <input type="text" name="l_name" placeholder="Last name" /><br><br>

        <label> Phone No: </label>
        <input type="text" name="contact" placeholder="Enter 10 digits only" ><br><br>

        <label>*Date of Birth: </label>
        <input type="date" name="dob" /><br>

        <label>*Gender: </label>
        <select name="gender" >
            <option value="Female">Female
            <option value="Male">Male
            <option value="Other">Other
        </select><br>
									     
        <h4>Following information will be used as your <b>Login</b> credentials</h4>

        <label>*Email ID: </label>
        <input type="text" name="email" placeholder="Valid email address" /><br>

        <label>*New Password: </label>
	<input type="password" name="password"><br>

	<label>*Reenter Password: </label>
	<input type="text" name="pass_temp"><br>

        <h4>Select a secret question from below for password reset</h4>
	<label>*Question: </label>
	<select name="reset_ques" >
            <option value="1">What is your favorite color?
	    <option value="2">What is your mother's maiden name?
	    <option value="3">What is the name of your favorite movie?
	    <option value="4">What is your favorite cuisine?
	</select><br>

	<label>*Answer:</label>
	<input type="text" name="reset_ans" /><br><br>

	<label>&nbsp; </label>
        <input type="submit" value="submit">
    </form>

</main>
<?php include 'view/fp_footer.php'; ?>
