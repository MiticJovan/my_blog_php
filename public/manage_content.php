	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?> 
	<?php require_once("../includes/session.php"); ?>
	<?php include("../includes/layouts/header.php"); ?> 
	<?php find_selected_page(); ?> 

	<div id="main">
		<div id="navigation">
			<?php echo navigation($current_subject, $current_page); ?>
			<br>
			<a href="new_subject.php">+ Add a subject</a>
		</div>
		<div id="page">
			<?php echo message();?> 
			<?php if ($current_subject) { ?>
			<h2>Manage Post</h2>
			Post name: <?php echo $current_subject["manu_name"]; ?><br /><br>
			<button><a href="edit_subject.php?subject=<?php echo $current_subject["id"]; ?>">Edit Subject</a></button>

			<?php } elseif ($current_page) { ?>
			<h2>Manage Page</h2>
			<p>Post name: <?php echo $current_page["manu_name"]; ?></p><br />
			<?php } else { ?>
				<p>Please select post or a page.</p>
			<?php } ?> 
		</div>
	</div>

			<?php include("../includes/layouts/footer.php") ?> 
