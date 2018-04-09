<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	//confirm_logged_in();
	$tbl = "tbl_user";
	$users = getAll($tbl);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
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

<section class="delForm">
	<h2>Are You Sure You Want To Delete Your Account?</h2>
	<?php
		while($row = mysqli_fetch_array($users)) {
			echo "{$row['user_fname']}<a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Delete My Account</a>";
		}?>
</section>

<?php include('../includes/footer.html'); ?>

</body>
</html>
