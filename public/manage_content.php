	<?php require_once("../includes/session.php"); ?>
	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?> 
	 <?php $layout_context = "admin" ?>
	<?php include("../includes/layouts/header.php"); ?>
	<?php confirm_logged_in(); ?>
	 
 
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
				Position: <?php echo $current_subject["position"]; ?> <br>
				Visible: <?php echo $current_subject["visible"] == 1 ? 'yes' : 'no'; ?> <br><br>
				<button><a href="edit_subject.php?subject=<?php echo  urlencode($current_subject["id"]); ?>">Edit Subject</a></button><br><br>
				<button><a href="delete_subject.php?subject=<?php echo $current_subject["id"] ?>" onclick= "return confirm('Are you sure?');">Delete</a></button><br><br>
				<hr>
				<h3>Post in this subject:</h3>
				<ul>
					<?php 
					$subject_pages = find_pages_for_subject($current_subject["id"]);
					while ($page = mysqli_fetch_assoc($subject_pages)) {
						echo "<li>";
						$safe_page_id = urlencode($page["id"]);
						echo "<a href=\"manage_content.php?page={$safe_page_id}\">";
						echo htmlentities($page["manu_name"]);
						echo "</a>";
						echo "</li>";
					}
					?> 
				</ul>
				<br>
				+ <a href="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Add a new Post to this subject</a>
		</div>
			<?php } elseif ($current_page) { ?>
				<h2>Manage Page</h2>
				<p>Post name: <?php echo htmlentities($current_page["manu_name"]); ?></p>
				<span>Position: <?php echo $current_page["position"] ?></span> <br>
				<span>Visible: <?php echo $current_page["visible"] == 1 ? 'yes' : 'no' ?></span>
				<p>Content:</p>
				<div class="view-content">
					<?php echo  htmlentities($current_page["content"]) ?>
				</div>
				<br>
				<br>
				<button><a href="edit_page.php?page=<?php echo urlencode($current_page['id']); ?>">Edit Page</a></button>
				<br><br>
				<button><a href="delete_page.php?page=<?php echo urlencode($current_page["id"]); ?>" onclick= "return confirm('Are you sure?');">Delete</a></button><br><br>

				<?php } else { ?>
					<p>Please select Post subject or a Post page.</p>
					<?php } ?> 
		</div>
	</div>

				<?php include("../includes/layouts/footer.php") ?>
