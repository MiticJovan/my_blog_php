	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?>
<?php 
 if (isset($_POST['submit'])) {
 //PRocess the form
 $manu_name = mysql_prep($_POST["manu_name"]);
 $position = (int) $_POST["position"];
 $visible = (int) $_POST["visible"];

$query = "INSERT INTO subjects (";
$query .= "  manu_name, position, visible";
$query .= ") VALUES (";
$query .= " '{$manu_name}', {$position}, {$visible}";
$query .= ")";
$result = mysqli_query($connection, $query);

 if ($result) {
 	//Success
 	$message = "Subject created.";
 	redirect_to("manage_content.php");
 	} else {
 		//Failure
 		$message = "Subject creation failed.";
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