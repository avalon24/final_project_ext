<?php include '../view/fp_header.php' ?>
<main>
    <h4>Hello <?php echo $_COOKIE['login'] ?>, please find below the list of your finished items:</h4>

        <table id = 'display'>
        <tr>
            <td><b>Due Date<b></td>
            <td><b>Due Time<b></td>
            <td><b>Finished Task<b></td>
        </tr>
        <?php foreach($result as $finished) { ?>
        <tr>
            <td><i><?php echo $finished['t_date'];?></i></td>
            <td><i><?php echo $finished['t_time'];?></i></td>
	    <td><i><?php echo $finished['t_desc'];?></i></td>
	    <td><form action="index.php" method="post">
	        <input type="hidden" name="action" value="delete_item">
	            <input type="hidden" name="item_id" value="<?php echo $finished['t_id'] ?>"/> 
		    <input type="hidden" name="pg_val" value="C" />
		    <input type="submit" value="Delete">
		</form></td>

	</tr>
	<?php } ?>
	</table><br><br>
	
	<form action='home.php' method="post">
	    <input type="submit" value="Go back">
	</form><br>
	
</main>
<?php include '../view/fp_footer.php' ?>


