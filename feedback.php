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
if(!empty($_POST['feedback'])):
  $sql = "INSERT INTO feedback (Feedback) VALUES (:Feedback)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':Feedback',$_POST['feedback']);
$stmt->execute(); 
endif;
?>
<!DOCTYPE HTML>
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
</head>
<body>
<div class="container">
<div class="jumbotron text-xs-center">
  <h1 class="display-3">Thank You!</h1>
  <div class="container alert alert-success" style="margin:40px 30px;"> Successfully send your feedback.</div>
  <hr>
  
    Want to know more about our project? <a href="#">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href='file.php'>Return to previous page</a>
  </p>
</div>
</div>
</body>
</html>