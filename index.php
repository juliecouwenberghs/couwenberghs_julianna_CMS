<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	require_once('admin/phpscripts/config.php');
	if(isset($_GET['filter'])){
		$tbl = "tbl_movies";
		$tbl2 = "tbl_genre";
		$tbl3 = "tbl_mov_genre";
		$col = "movies_id";
		$col2 = "genre_id";
		$col3 = "genre_name";
		$filter = $_GET['filter'];
		$getMovies = filterType($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to the Finest Selection of Blu-rays on the internets!</title>
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

	<?php include('includes/nav.html');?>

<div id="movCon">
	<?php

		if(!is_string($getMovies)){
			while($row = mysqli_fetch_array($getMovies)){
				echo "<div class=\"movList\">
					<a href=\"details.php?id={$row['movies_id']}\"><img src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\"></a>
					<h2>{$row['movies_title']}</h2>

					</div>";
			}
		}else{
			echo "<p class=\"error\">{$getMovies}</p>";
		}
	?>
</div>

<?php include('includes/footer.html'); ?>

</body>
</html>
