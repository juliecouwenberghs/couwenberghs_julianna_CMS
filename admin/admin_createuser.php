<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	confirm_logged_in();
	if(isset($_POST['submit'])) {
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$userlvl = $_POST['userlvl'];
		if(empty($userlvl)){
			$message = "Please select a user level.";
		}else{
			$result = createUser($fname, $username, $password, $email, $userlvl);
			$message = $result;
		}
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

<section class="form">
	<h2>Welcome New User!</h2>
	<?php if(!empty($message)){echo $message;} ?>
		<form action="admin_createuser.php" method="post">
			<label>First Name:</label>
			<input type="text" name="fname" value="	<?php if(!empty($fname)){echo $fname;} ?>
			"><br><br>

			<label>Username:</label>
			<input type="text" name="username" value="	<?php if(!empty($username)){echo $username;} ?>
			"><br><br>

			<label>Password:</label>
			<input type="text" name="password" value="	<?php if(!empty($password)){echo $password;} ?>
			"><br><br>

			<label>Email:</label>
			<input type="text" name="email" value="	<?php if(!empty($email)){echo $email;} ?>
			"><br><br>

			<label>User Level:</label>
			<select name="userlvl" class="level">
				<option value="">Please select a user level</option>
				<option value="2">Beginner</option>
				<option value="1">Master</option>
			</select><br><br>

			<input class="submitBut" type="submit" name="submit" value="Create User">
		</form>
</section>

	<?php include('../includes/footer.html'); ?>

</body>
</html>
