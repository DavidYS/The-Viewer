
<?php
session_start();
require 'database.php';
if( isset($_SESSION['user_id']) ){
	$records = $conn->prepare('SELECT user_id,email,password FROM users WHERE user_id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$user = NULL;
	if( count($results) > 0){
		$user = $results;
	}

	class TableRows  {
		public $Id, $Director, $Title, $Type, $Display;
		public function __construct(){
			$this->Display = '<tr><td><a>'.$this->Director.'</a></td><td><a>'.$this->Title.'</a></td><td><a>'.$this->Type.'</a></td><td><a id="close">X</a></td></tr>';
		}
	}
	if(!empty($_POST['search'])):
		$movie= $_POST['search'];
	$stmt = $conn->query("SELECT * FROM movies WHERE (Director LIKE '%$movie%') OR (Title LIKE '%$movie%') OR (Type LIKE '%$movie%')");
	$stmt->setFetchMode(PDO::FETCH_CLASS, "TableRows");	
	endif;	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>The Viewer</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
	<style>
		.navbar-right {
			margin-left:30vw;
		}
		#close {
			font-weight:800;
			color:red;
		}
		#close:hover {
			font-weight:900
		}
	</style>
</head>
<body>
	<div class='cointainer'>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="file.php">
						<p>The Viewer</p>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-left">
							<li class="<?php
							if(basename($_SERVER['PHP_SELF'],'.php') == 'index')
								echo 'active';
							else
								echo '';
							?>"><a href="file.php">Home <span class="sr-only">(current)</span></a></li>

							<form class="navbar-form navbar-left" role="search" method='POST' action='search.php'>

								<input type="text" class="form-control" name='search' placeholder="Movie, Genre, Actor">

								<button type="submit" id='searchButton' class="btn btn-info disabled">Search</button>
							</form>
					
							<ul class='nav navbar-nav navbar-right'>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $user['email']; ?> <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li class="<?php
										if(basename($_SERVER['PHP_SELF'],'.php') == 'working')
											echo 'active';
										else
											echo '';
										?>"><a href="profile.php">Your Profile</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="logout.php">Log Out</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
			<div class='container'>
			<?php 	
			if(!empty($_POST['search'])):	?>

			<h3>Search your favorite movie.</h3>
			<div class='table-responsive container'>
				<table class='table table-striped table-hovered'>
					<tr><th>Director</th><th>Title</th><th>Type</th><th></th></tr>

					<?php	while($result = $stmt->fetch()){
						print($result->Display);
					}
					endif;
					?>
				</table>
			</div>
<div class='container'>
<a href="add.php"><button class="btn btn-success btn-block">Add a Movie</button></a>
</div>
</div>
	<script>
		$(document).ready(function(){
			$(' td #close').click(function(){
				$(this).closest('tr').fadeOut();
			})
		})

	</script>
		<script src="index.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</body>
		</html>