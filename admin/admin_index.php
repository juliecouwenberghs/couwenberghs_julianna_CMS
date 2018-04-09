<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Flashback!</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header id="mainHeader">
		<nav role="navigation">
  		<div id="menuToggle">
				<input type="checkbox"/>
					<span></span>
    			<span></span>
    			<span></span>

				<ul id="menu">
					<li><a href="../index.php">Movies</a></li>
					<li><a href="admin_createuser.php">Create New User</a></li>
					<li><a href="admin_edituser.php">Edit Account</a></li>
					<li><a href="admin_deleteuser.php">Delete Account</a></li>
					<li><a href="phpscripts/caller.php?caller_id=logout">Sign Out</a></li>
				</ul>
			</div>
		</nav>

		<h1 id="logo">Flashback</h1>
	</header>

	<section id="intro">
		<h2 class="hidden">Introduction</h2>
		<a href="../index.php">MOVIES</a>
		<p id="firsttext">Welcome to Flashback! We have all of the classics, most treasured, and newest films!</p>
	</section>

	<?php include('../includes/footer.html'); ?>

</body>
</html>
