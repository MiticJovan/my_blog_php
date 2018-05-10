	<?php require_once("../includes/db_connection.php"); ?>
	<?php require_once("../includes/functions.php"); ?> 
	<?php include("../includes/layouts/header.php"); ?> 
	<?php find_selected_page(); ?> 

	<div id="main">
		<div id="navigation">
			<?php echo navigation($current_subject, $current_page); ?>
		</div>
		<div id="page">
			
		</div>
	</div>

			<?php include("../includes/layouts/footer.php") ?> 
