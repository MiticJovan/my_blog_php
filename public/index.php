	<?php require_once("../includes/session.php"); ?>
	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?> 
	<?php $layout_context = "public" ?>
	<?php include("../includes/layouts/header.php"); ?>
	 
 
	<?php find_selected_page(true); ?> 

	<div id="main">
		<div id="navigation">
			<?php echo public_navigation($current_subject, $current_page); ?>
		</div>
		<div id="page">
			<?php if ($current_page) { ?>
					<h2><?php echo  htmlentities($current_page["manu_name"]); ?>&nbsp;
					<span style="margin-left: 200px; color: #000; font-size: 12px;"><?php echo date("Y/m/d"); ?></span> <br><br>
				<div class="view-content-public">
					<?php echo  nl2br(htmlentities($current_page["content"])); ?>
				</div>

				<?php } else { ?>
					<p>Welcome to Blog Page</p>
					<?php } ?> 
		</div>
	</div>

				<?php include("../includes/layouts/footer.php") ?>
