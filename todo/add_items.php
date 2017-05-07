<?php include '../view/fp_header.php' ?>
<main>

    <h1>Add new items</h1>
    <h3><?php echo $message ?></h3>
    <h4>Hi <?php echo $_COOKIE['login'] ?>, to add an item please enter the following values - </h4>

    <form action="index.php" method="post" id="add_items_form">
    <input type="hidden" name="action" value="add_items">

	<label>Due Date:</label>
	<input type="date" name="due_dt" ><br><br>

	<label>Due Time:</label>
	<input type="time" name="due_tm" ><br><br>
        
	<label>Item Description:</label>
	<input type="text" name="item_desc" ><br><br><br>
        
	<label>&nbsp;</label>
	<input type="submit" value="Submit"/><br><br>
	
    </form>
    
    <form action="index.php" method="post">
    <input type="hidden" name="action" value="pending_items">
        <label>&nbsp;</label>
	<input type="submit" value="Go Back"><br><br>

    </form>

</main>
<?php include '../view/fp_footer.php' ?>
