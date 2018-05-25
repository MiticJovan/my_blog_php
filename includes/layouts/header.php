<?php 
	if (!isset($layout_context)) {
		$layout_context = "public"; 
	} 
	?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog <?php if ($layout_context == "admin") { echo "Admin";} ?></title>
	<link rel="stylesheet" media="all" type="text/css" href="public/css/public.css">
	<link rel="stylesheet" media="all" type="text/css" href="css/public.css">
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,700" rel="stylesheet">
</head>
<body>
<div id="header">
	<h1>Blog Page <?php if ($layout_context == "admin") { echo "Admin";} ?></h1>
</div>