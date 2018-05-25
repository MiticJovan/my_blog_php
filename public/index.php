	<?php require_once("../includes/session.php"); ?>
	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?> 
	<?php $layout_context = "public" ?>
	<?php include("../includes/layouts/header.php"); ?>
	 
 
	<?php find_selected_page(); ?> 

	<div id="main">
		<div id="navigation">
			<?php echo public_navigation($current_subject, $current_page); ?>
		</div>
		<div id="page">
			<?php if ($current_subject) { ?>
				<h2>Manage Post</h2>
				Post name: <?php echo  htmlentities($current_subject["manu_name"]); ?><br /><br>

			<?php } elseif ($current_page) { ?>
			<?php echo  htmlentities($current_page["content"]); ?>

				<?php } else { ?>
					<p>Please select Post subject or a Post page.</p>
					<?php } ?> 
		</div>
	</div>

				<?php include("../includes/layouts/footer.php") ?>
