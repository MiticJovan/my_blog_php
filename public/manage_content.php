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
			<h2>Manage Subject</h2>
			Menu name: <?php echo $current_subject["manu_name"]; ?><br />
			<a href="edit_subject.php?subject=<?php echo $current_subject["id"]; ?>">Edit Subject</a>

			<?php } elseif ($current_page) { ?>
			<h2>Manage Page</h2>
			<p>Menu name: <?php echo $current_page["manu_name"]; ?></p><br />
			<?php } else { ?>
				<p>Please select subject or a page.</p>
			<?php } ?> 
		</div>
	</div>

			<?php include("../includes/layouts/footer.php") ?> 
