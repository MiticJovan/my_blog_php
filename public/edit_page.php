	<?php require_once("../includes/session.php"); ?> 
	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?> 
	<?php require_once("../includes/validation_functions.php"); ?>

	<?php find_selected_page(); ?>

	<?php 
	//Unlike new_page.php, we don't need a subject_id to be sent
	//We already have it stored in pages.subject_id.
	if (!$current_page) {
		redirect_to("manage_content.php");		
	}
	?> 
	<?php if (isset($_POST['submit'])) {
 //Process the form

		$id = $current_page["id"];
		$manu_name = mysql_prep($_POST["manu_name"]);
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];
		$content = mysql_prep($_POST["content"]);
 	//validation
		$required_fields = array("manu_name", "position", "visible", "content");
		validate_presences($required_fields);

		$fields_with_max_lengths = array("manu_name" => 30);
		validate_max_lengths($fields_with_max_lengths);

		if (empty($errors)) {
 	//perform Update
			$query = "UPDATE pages SET ";
			$query .= "manu_name = '{$manu_name}', ";
			$query .= "position = {$position}, ";
			$query .= "visible = {$visible}, ";
			$query .= "content = '{$content}' ";
			$query .= "WHERE id = {$id} ";
			$query .= "LIMIT 1";
			$result = mysqli_query($connection, $query); 

			if ($result && mysqli_affected_rows($connection) == 1) {
 	//Success
				$_SESSION["message"] = " Post updated. ";
				redirect_to("manage_content.php?subject=" . urlencode($current_subject["id"]));
			} else {
 		//Failure
				$_SESSION["message"] = " Post updation failed. ";
				redirect_to("manage_subject.php");
			}
		}
	}else {
 	//This is probably a Get request

 } //end: if (isset($_POST['submit']))
 ?>

 <?php include("../includes/layouts/header.php"); ?> 
 <div id="main">
 	<div id="navigation">
 		<?php echo navigation($current_subject, $current_page); ?>
 	</div>
 	<div id="page">
 		<?php echo message(); ?>
 		<?php echo form_errors($errors); ?>
 		<br>
 		<h2>Edit Post:<?php echo htmlentities($current_page["manu_name"]); ?></h2>
 		<form action="edit_page.php?page=<?php echo urlencode($current_page["id"]); ?> " method="post">
 			<p>Post name:
 				<input type="text" name="manu_name" value="<?php echo htmlentities($current_page["manu_name"]); ?> ">
 			</p> 
 			<p>Position:
 				<select name="position">
 					<?php 
 					$page_set = find_pages_for_subject($current_page["subject_id"]);
 					$page_count = mysqli_num_rows($page_set);				
 					for ($count = 1; $count <=  $page_count; $count++){
 						echo "<option value=\"{$count}\"";
 						if ($current_page["position"] == $count) {
 							echo " selected";
 						}
 						echo ">{$count}</option>";  
 					}
 					?> 
 				</select>
 			</p>
 			<p>Visible:
 				<input type="radio" name="visible" value="0" <?php if ($current_page["visible"] == 0) { echo "checked"; ?> /> No &nbsp;
 				<input type="radio" name="visible" value="1" <?php if ($current_page["visible"] == 1) { echo "checked";} ?> /> Yes
 			</p>
 			<p>Content:<br><br>
 				<textarea name="content" rows="10" cols="70"><?php echo htmlentities($current_page['content']); ?> </textarea>
 			</p>
 			<input class="button" type="submit" name="submit" value="Create Post">
 		</form>
 		<br>
 		<button class="button"><a href="manage_content.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Cancel</a></button>
 	</div>
 </div>