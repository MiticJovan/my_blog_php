<!DOCTYPE html>
<html>
<head>
	<title>Footer</title>
</head>
<body>
<div id="footer"> Copyright &copy; &nbsp; <?php echo date("Y M") ?> &nbsp; by OMS Zone &nbsp; author: Mitic Jovan</div>
</body>
</html>
<?php 
	// 5.Close database connection
if (isset($connection)) {
	mysqli_close($connection);
}
?> 