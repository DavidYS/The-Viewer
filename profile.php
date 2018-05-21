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
  <link rel="stylesheet" type="text/css" href="index2.css">
  <style>
    .navbar-right {
      margin-left:20vw;
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
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </div>
 



   <div class="container">
<div class="row">
<div class="col-md-10 ">
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Edit Your Profile</legend>

<!-- Text input-->


<form method="POST" action="insert.php">

<div class="form-group">
  <label class="col-md-4 control-label" for="Name">Name</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-user">
        </i>
       </div>
       <input id="Name" name="Name" type="text" placeholder="Name" class="form-control input-md">
      </div>

    
  </div>

  
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="Upload photo">Upload photo</label>
  <div class="col-md-4">
    <input id="Upload photo" name="Upload photo" class="input-file" type="file">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Date Of Birth">Date Of Birth</label>  
  <div class="col-md-4">

  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-birthday-cake"></i>
        
       </div>
       <input id="Date Of Birth" name="Date Of Birth" type="text" placeholder="Date Of Birth" class="form-control input-md">
      </div>
  
    
  </div>
</div>


<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Gender">Gender</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="Gender-0">
      <input type="radio" name="Gender" id="Gender-0" value="1" checked="checked">
      Male
    </label> 
    <label class="radio-inline" for="Gender-1">
      <input type="radio" name="Gender" id="Gender-1" value="2">
      Female
    </label> 
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label col-xs-12" for="Address">Address</label>  
  <div class="col-md-2  col-xs-4">
  <input id="Address" name="Address" type="text" placeholder="District" class="form-control input-md ">
  </div>

  <div class="col-md-2 col-xs-4">

  <input id="Address" name="Address" type="text" placeholder="Area" class="form-control input-md ">
  </div>

  
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Address"></label>  
  <div class="col-md-2  col-xs-4">
  <input id="Address" name="Address" type="text" placeholder="Street" class="form-control input-md ">
  
  </div>
  
</div>









<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Occupation">Occupation</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-briefcase"></i>
        
       </div>
      <input id="Occupation" name="Occupation" type="text" placeholder="Occupation" class="form-control input-md">
      </div>
  
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Skills">Skills</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-graduation-cap"></i>
        
       </div>
     <input id="Skills" name="Skills" type="text" placeholder="Skills" class="form-control input-md">
      </div>
 
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Phone number ">Phone number </label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-phone"></i>
        
       </div>
    <input id="Phone number " name="Phone number " type="text" placeholder="Phone number " class="form-control input-md">
    
      </div>
  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Email Address">Email Address</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-envelope-o"></i>
        
       </div>
    <input id="Email Address" name="Email Address" type="text" placeholder="Email Address" class="form-control input-md">
    
      </div>
  
  </div>
</div>



<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Languages Known">Languages Known</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="Languages Known-0">
      <input type="checkbox" name="Languages Known" id="Languages Known-0" value="1">
      Romanian
    </label>
    </div>
  <div class="checkbox">
    <label for="Languages Known-1">
      <input type="checkbox" name="Languages Known" id="Languages Known-1" value="2">
      German
    </label>
    </div>
  <div class="checkbox">
    <label for="Languages Known-2">
      <input type="checkbox" name="Languages Known" id="Languages Known-2" value="3">
      English
    </label>
    </div>
  <div class="checkbox">
    <label for="Languages Known-3">
      <input type="checkbox" name="Languages Known" id="Languages Known-3" value="4">
      French
    </label>
    </div>

<div class="othertop">
    <label for="Languages Known-4">
    
     
  
    </label>

     <input type="input" name="LanguagesKnown" id="Languages Known-4"  placeholder="Other Language">
    </div>
    
  </div>
</div>




<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Description">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" rows="10"  id="Description" name="Description" placeholder="Describe yourself"></textarea>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" ></label>  
  <div class="col-md-4">
  <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Submit</a>
  <a href="profile.php" class="btn btn-danger" value=""><span class="glyphicon glyphicon-remove-sign"></span> Clear</a>
    
  </div>
</div>

</fieldset>
</form>
</div>
<div class="col-md-2 hidden-xs">
<img src="http://websamplenow.com/30/userprofile/images/avatar.jpg" class="img-responsive img-thumbnail ">
  </div>
</form>

</div>
   </div>
    <!-- jQuery Version 1.11.1 -->
    <script src="jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    
  <script src='index.js'></script>
    </div>
  </body>
  </html>
