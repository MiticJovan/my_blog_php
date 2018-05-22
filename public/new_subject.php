	<?php require_once("../includes/session.php"); ?> 
	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?> 
	<?php include("../includes/layouts/header.php"); ?> 
	<?php require_once("../includes/validation_functions.php"); ?>

	<?php find_selected_page(); ?> 

	<div id="main">
		<div id="navigation">
			<?php echo navigation($current_subject, $current_page); ?>
		</div>
		<div id="page">
			<?php echo message(); ?> 
			<?php $errors = errors(); ?> 
			<?php echo form_errors($errors); ?>
			<br>
			<h2>Create Post</h2>
			<form action="create_subject.php" method="post">
			<p>Post name:
				<input type="text" name="manu_name" value="">
			</p> 
			<p>Position:
			<select name="position">
				<?php 
				$subject_set = find_all_subjects();
				$subject_count = mysqli_num_rows($subject_set);				
				for ($count = 1; $count <=  ($subject_count + 1); $count++){
					echo "<option value=\"{$count}\">{$count}</option>";  
				}
				 ?> 
			</select>
			</p>
			<p>Visible:
				<input type="radio" name="visible" value="0"> No &nbsp;
				<input type="radio" name="visible" value="1"> Yes	
			</p>
			<input class="button" type="submit" name="submit" value="Create Post">
			</form>
			<br>
			<br>
			<button class="button"><a href="manage_content.php">Cancel</a></button>
		</div>
	</div>

			<?php include("../includes/layouts/footer.php") ?> 
