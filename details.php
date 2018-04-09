<?php
	require_once('admin/phpscripts/config.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$tbl = "tbl_movies";
		$col = "movies_id";
		$getSingle = getSingle($tbl, $col, $id);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Details</title>
<link rel="stylesheet" href="admin/css/main.css">
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
					<li><a href="index.php">Movies</a></li>
					<li><a href="admin/admin_createuser.php">Create New User</a></li>
					<li><a href="admin/admin_edituser.php">Edit Account</a></li>
					<li><a href="admin/admin_deleteuser.php">Delete Account</a></li>
					<li><a href="admin/phpscripts/caller.php?caller_id=logout">Sign Out</a></li>
				</ul>
			</div>
		</nav>

		<h1 id="logo">Flashback</h1>
	</header>

	<?php
		if(!is_string($getSingle)){
			$row = mysqli_fetch_array($getSingle);
			echo "<div class=\"movDetails\">

				<h2>{$row['movies_title']}</h2>
				<p>{$row['movies_year']}</p>
				<h3>{$row['movies_storyline']}</h3>
				<a href=\"index.php\">Back To Movies</a>
				</div>";
		}else{
			echo "<p class=\"error\">{$getSingle}</p>";
		}
	?>

	<?php include('includes/footer.html'); ?>
</body>
</html>
