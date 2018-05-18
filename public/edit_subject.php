	<?php require_once("../includes/session.php"); ?> 
	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?> 
	<?php require_once("../includes/validation_functions.php"); ?> 


	<?php find_selected_page(); ?>
<?php 
if (!$current_subject) {
	//subject ID was missing or invalid or subject couldn't be found in the database
	redirect_to("manage_content.php");
}
?> 
<?php 
 if (isset($_POST['submit'])) {


 //validations
 $required_fields = array("manu_name", "position", "visible");
 validate_presences($required_fields);

 $fields_with_max_lengths = array("manu_name" => 30);
 validate_max_lengths($fields_with_max_lengths);

 if (empty($errors)) {
 	//perform update

 	$id = $current_subject["id"];
 	$manu_name = mysql_prep($_POST["manu_name"]);
 	$position = (int) $_POST["position"];
 	$visible = (int) $_POST["visible"];

 	$query = "UPDATE subjects SET ";
 	$query .= "manu_name = '{$manu_name}', ";
 	$query .= "position = {$position}, ";
 	$query .= "visible = {$visible} ";
 	$query .= "WHERE id = {$id} ";
 	$query .= "LIMIT 1";
 	$result = mysqli_query($connection, $query);

 	if ($result && mysqli_affected_rows($connection) >= 0) {
 	//Success
 		$_SESSION["message"] = " Post updated. ";
 		redirect_to("manage_content.php");
 	} else {
 		//Failure
 		$message = " Post update failed. ";
 		redirect_to("manage_subject.php");
 	}
 }
 }else {
 	//This is probably a Get request
 	
 } //end: if (isset($_POST['submit']))
 ?>

	<?php if (!$current_subject) {
		redirect_to("manage_content.php"); 
	} ?> 


	<?php include("../includes/layouts/header.php"); ?> 
	
 

	<div id="main">
		<div id="navigation">
			<?php echo navigation($current_subject, $current_page); ?>
		</div>
		<div id="page">
			<?php //message is just a variable, doesn't use the SESSION
			if (!empty($message)) {
				echo "<div class=\"message\">" . htmlentities($message) . "</div>";
			}
			 ?> 
			<?php echo form_errors($errors); ?>
			<h2>Edit Post : <?php echo htmlentities($current_subject["manu_name"]);?></h2>
			<form action="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>" method="post">
			<p>Post name:
				<input type="text" name="manu_name" value="<?php echo htmlentities($current_subject["manu_name"]);?>">
			</p> 
			<p>Position:
			<select name="position">
				<?php 
				$subject_set = find_all_subjects();
				$subject_count = mysqli_num_rows($subject_set);				
				for ($count = 1; $count <=  $subject_count; $count++){
					echo "<option value=\"{$count}\"";
					if ($current_subject["position"] == $count) {
						echo " selected";
					} 
					echo ">{$count}</option>";  
				}
				 ?> 
			</select>
			</p>
			<p>Visible:
				<input type="radio" name="visible" value="0" <?php if ($current_subject["visible"] == 0) { echo "checked"; } ?> > No &nbsp;
				<input type="radio" name="visible" value="1" <?php if ($current_subject["visible"] == 1) { echo "checked"; } ?> > Yes	
			</p>
			<input type="submit" name="submit" value="Edit Subject">
			</form>
			<br>
			<button class="button"><a href="manage_content.php">Cancel</a></button>&nbsp;&nbsp;
			<button class="button"><a href="delete_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>" onclick= "return confirm('Are you sure?');">Delete</a></button>
		</div>
	</div>

			<?php include("../includes/layouts/footer.php") ?> 
