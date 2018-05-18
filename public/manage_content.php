	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?> 
	<?php require_once("../includes/session.php"); ?>
	<?php include("../includes/layouts/header.php"); ?> 
	<?php find_selected_page(); ?> 

	<div id="main">
		<div id="navigation">
			<br>
			<a href="admin.php">&laquo; Main menu</a>
			<?php echo navigation($current_subject, $current_page); ?>
			<br>
			<a href="new_subject.php">+ Add a subject</a>
		</div>
		<div id="page">
			<?php echo message();?> 
			<?php if ($current_subject) { ?>
			<h2>Manage Post</h2>
			Post name: <?php echo  htmlentities($current_subject["manu_name"]); ?><br /><br>
			<button><a href="edit_subject.php?subject=<?php echo  urlencode($current_subject["id"]); ?>">Edit Subject</a></button><br><br>
			<button class="button"><a href="delete_subject.php?subject=<?php echo $current_subject["id"] ?>" onclick= "return confirm('Are you sure?');">Delete</a></button><br><br>
			Position: <?php echo $current_subject["position"]; ?> <br>
			Visible: <?php echo $current_subject["visible"] == 1 ? 'yes' : 'no'; ?> <br><br>
			<?php } elseif ($current_page) { ?>
			<h2>Manage Page</h2>
			<p>Post name: <?php echo htmlentities($current_page["manu_name"]); ?></p><br />
			Position: <?php echo $current_page["position"] ?> <br>
			Visible: <?php echo $current_page["visible"] == 1 ? 'yes' : 'no' ?> <br><br>
			Content: <br><br>
			<div class="view-content">
				<?php echo  htmlentities($current_page["content"]) ?>
			</div>


			<?php } else { ?>
				<p>Please select post or a page.</p>
			<?php } ?> 
		</div>
	</div>

			<?php include("../includes/layouts/footer.php") ?>
