	<?php require_once("../includes/session.php"); ?> 
	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?>  
	<?php require_once("../includes/validation_functions.php"); ?>

	<?php include("../includes/layouts/header.php"); ?>

<?php 
$current_subject = find_subject_by_id($_GET["subject"]);
if (!$current_subject) {
	//subject ID was missing or invalid or subject couldn't be found in the database
	redirect_to("manage_content.php");
}
//$pages_set = find_pages_for_subject($current_subject["id"]);
//if (mysqli_num_rows($pages_set) > 0) {
 	//$_SESSION["message"] = " Can't delete post menu with pages inside. ";
 	//redirect_to("manage_content.php?subject={$current_subject["id"]}");	
// }

$id = $current_subject["id"];
$query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
$result = mysqli_query($connection, $query);

 	if ($result && mysqli_affected_rows($connection) == 1) {
 		//Success
 		$_SESSION["message"] = " Post deleted. ";
 		redirect_to("manage_content.php");
 	} else {
 		//Failure
 		$_SESSION["message"] = " Post deletion failed. ";
 		redirect_to("manage_content.php?subject={$id}");

 	}
?>
