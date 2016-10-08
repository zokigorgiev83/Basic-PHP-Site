<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header>
	
	<div class="container">
	
		<h1 class="title"><a href="index.php">&nbsp;The Most Important Musicians</a></h1>
		
		<nav>
			<ul>
				<li class="musicians<?php if ($section == "musicians") { echo " on"; } ?>"><a href="catalog.php?cat=musicians">Musicians</a></li>
				<li class="groups<?php if ($section == "groups") { echo " on"; } ?>"><a href="catalog.php?cat=groups">Groups</a></li>        		
        		<li class="suggest<?php if ($section == "suggest") { echo " on"; } ?>"><a href="suggest.php">Suggest</a></li>
   			</ul>
		</nav>

	</div>

</header>

<main>
