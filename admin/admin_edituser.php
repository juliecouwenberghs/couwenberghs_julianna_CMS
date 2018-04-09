<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	//confirm_logged_in();
	$id = $_SESSION['user_id'];
	//echo $id;
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$found_user = mysqli_fetch_array($popForm, MYSQLI_ASSOC);
	//echo $found_user;

	if(isset($_POST['submit'])) {
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
			$message = $result;
	}

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

<section class="editForm">
	<h2>Edit Your Account</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post">
	<label>First Name:</label>
	<input type="text" name="fname" value="<?php echo $found_user['user_fname']; ?>
"><br><br>

	<label>Username:</label>
	<input type="text" name="username" value="<?php echo $found_user['user_name']; ?>
"><br><br>

	<label>Password:</label>
	<input type="text" name="password" value="<?php echo $found_user['user_pass']; ?>
"><br><br>

	<label>Email:</label>
	<input type="text" name="email" value="<?php echo $found_user['user_email']; ?>
"><br><br>
	<input class="submitBut" type="submit" name="submit" value="Submit Changes">
	</form>
</section>

	<?php include('../includes/footer.html'); ?>

</body>
</html>
