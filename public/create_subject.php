	<?php require_once("../includes/session.php"); ?> 
	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?>
	<?php require_once("../includes/validation_functions.php"); ?>

<?php 
 if (isset($_POST['submit'])) {
 //Process the form
 $manu_name = mysql_prep($_POST["manu_name"]);
 $position = (int) $_POST["position"];
 $visible = (int) $_POST["visible"];

 //validations
 $required_fields = array("manu_name", "position", "visible");
 validate_presences($required_fields);

 $fields_with_max_lengths = array("manu_name" => 30);
 validate_max_lengths($fields_with_max_lengths);

 if (!empty($errors)) {
 	$_SESSION["errors"] = $errors;
 	redirect_to("new_subject.php");
 } 

$query = "INSERT INTO subjects (";
$query .= "  manu_name, position, visible";
$query .= ") VALUES (";
$query .= " '{$manu_name}', {$position}, {$visible}";
$query .= ")";
$result = mysqli_query($connection, $query);

 if ($result) {
 	//Success
 	$_SESSION["message"] = "Post created.";
 	redirect_to("manage_content.php");
 	} else {
 		//Failure
 		$_SESSION ["message"] = "Post creation failed.";
 		redirect_to("new_subject.php");
 	}
 }else {
 	//This is probably a Get request
 	redirect_to("new_subject.php");
 }
 ?> 

	<?php 
	if (isset($connection)) {mysqli_close($connection);}
	?> 