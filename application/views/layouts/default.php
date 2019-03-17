<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<!-- Normalize CSS include -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<!-- font-awesome -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Main CSS file include -->
	<link rel="stylesheet" type="text/css" href="/public/css/main.css">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/magnifyingglass-256.png">
</head>
<body>
	<?php echo $content; ?>

	<!-- jQuery include -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Main JS file include -->
	<script src="/public/script/code.js"></script>
</body>
</html>