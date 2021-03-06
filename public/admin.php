<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php confirm_logged_in(); ?> 

<?php $layout_context = "admin"; ?> 
<?php include("../includes/layouts/header.php"); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin</title>
	<link rel="stylesheet" media="all" type="text/css" href="css/public.css">
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,700" rel="stylesheet">
</head>
<body>
<div id="main">
	<div id="navigation">
		&nbsp;
	</div>
	<div id="page">
		<h2>Admin Menu</h2>
		<p>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]); ?> .</p>
		<ul>
			<li><a href="manage_content.php">Manage Website Content</a></li>
			<li><a href="manage_admins.php">Manage Admin Users</a></li>
			<li><a href="logout.php">Log Out</a></li>
		</ul> 
	</div>
</div>
<div id="footer">Copyright 2018, OMS Zone &nbsp; author Mitic Jovan</div>
</body>
</html>