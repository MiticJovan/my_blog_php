	<?php require_once("../includes/session.php"); ?> 
	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?> 


<?php 
$current_page = find_page_by_id($_GET["page"], false);
if (!$current_page) {
	//subject ID was missing or invalid or subject couldn't be found in the database
	redirect_to("manage_content.php");
}
//$pages_set = find_pages_for_subject($current_subject["id"]);
//if (mysqli_num_rows($pages_set) > 0) {
 	//$_SESSION["message"] = " Can't delete post menu with pages inside. ";
 	//redirect_to("manage_content.php?subject={$current_subject["id"]}");	
// }

$id = $current_page["id"];
$query = "DELETE FROM pages WHERE id = {$id} LIMIT 1";
$result = mysqli_query($connection, $query);

 	if ($result && mysqli_affected_rows($connection) == 1) {
 		//Success
 		$_SESSION["message"] = " Post Page deleted. ";
 		redirect_to("manage_content.php");
 	} else {
 		//Failure
 		$_SESSION["message"] = " Post Page deletion failed. ";
 		redirect_to("manage_content.php?page={$id}");

 	}
?>