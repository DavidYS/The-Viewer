<?php
session_start();
require 'database.php';
if( isset($_SESSION['user_id']) ){
  $records = $conn->prepare('SELECT user_id,email,password FROM users WHERE user_id = :user_id');
  $records->bindParam(':user_id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $user = NULL;
  if( count($results) > 0){
    $user = $results;
  }
}
$message = '';
if(!empty($_POST['director']) && !empty($_POST['title']) && !empty($_POST['type'])):
  $sql = "INSERT INTO movies (director,title,type) VALUES (:director,:title, :type)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':director',$_POST['director']);
$stmt->bindParam(':title',$_POST['title']); 
$stmt->bindParam(':type', $_POST['type']);
if( $stmt->execute() ):
  $message = '<div class="container centered alert alert-success" style="margin:40px 30px;"> Thanks for your support';
else:
  $message = '<div class="container alert alert-alert" style="margin:40px 30px;"> Sorry there must have been an issue adding your movie';
endif;
endif;
?>
<!Doctype HTML>
<html>
<head>
<html lang="en">
<head>
<title>The Viewer</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='add.css'>
<style>

.navbar-right {
	margin-left:20vw;
}

</style>
</head>
<body>
  <div class='container-fluid'>
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
              <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['user_id'])) { ?>
                <li class="<?php
                if(basename($_SERVER['PHP_SELF'],'.php') == 'login')
                  echo 'active';
                else
                  echo '';
                ?>"><a href="index.php">Login</a></li>

                <li class="<?php
                if(basename($_SERVER['PHP_SELF'],'.php') == 'register')
                  echo 'active';
                else
                  echo '';
                ?>"> <a href="index.php">Register</a></li>
              </ul>
              <?php } else { ?>
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
              <?php  } ?>
            </div>
          </div>
        </nav>
      </div>
        <?php if(!empty($message)): ?>
     <?php echo $message; ?> 
  </div>
    <?php endif; ?>
 			   <div class="form" style="margin-top:100px;">

      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Add a Movie</a></li>
        <li class="tab"><a href="#login">Feedback</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">   
          <h1>Add a Movie</h1>

          <form action="add.php" method="post">

            <div class="top-row">
              <div class="field-wrap">
                <label>
                  Director<span class="req">*</span>
                </label>
                <input type="text" name='director' required autocomplete="off" />
              </div>

              <div class="field-wrap">
                <label>
                  Title<span class="req">*</span>
                </label>
                <input type="text" name='title' required autocomplete="off"/>
              </div>
            </div>

            <div class="field-wrap">
              <label>
                Genre<span class="req">*</span>
              </label>
              <input type="text" name='type' required autocomplete="off"/>
            </div>


            <button type="submit" class="button button-block"/>Add Movie</button>

          </form>

        </div>

        <div id="login">   
          <h1>Feedback</h1>

          <form action='feedback.php' method="post">

            <div class="field-wrap">
              <label>
                Feedback<span class="req">*</span>
              </label>
              <input type="text" name='feedback' required autocomplete="off"/>
            </div>

        

            <button class="button button-block"/>Send FeedBack</button>

          </form>

        </div>

      </div><!-- tab-content -->

    </div>
    <script src='index.js'></script>
</body>
</html>