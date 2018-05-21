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
<link rel="stylesheet" type="text/css" href="movie.css">
<style>
.navbar-right {
margin-left:30vw;
}
.shape {
width: 27vw;
height:33vw;
}
.title {
text-align:center;
}
.hide-bullets {
list-style:none;
margin-left: -42px;
margin-top:20px;
}

.thumbnail {
padding: 0;
}
ul img {
max-width:6vw;
max-height:8vw;
}
.carousel {
width:28vw;
}
.carousel img {
max-width:20vw;
max-height:27vw;
margin-left:15%;
background-size:cover;
}

body{ background: #fafafa;}
.widget-area.blank {
background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
-webkit-box-shadow: none;
-moz-box-shadow: none;
-ms-box-shadow: none;
-o-box-shadow: none;
box-shadow: none;
}
body .no-padding {
padding: 0;
}
.widget-area {
background-color: #fff;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
-webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
float: left;
margin-top: 30px;
padding: 25px 30px;
position: relative;
width: 100%;
}
.status-upload {
background: none repeat scroll 0 0 #f5f5f5;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
float: left;
width: 100%;
}
.status-upload form {
float: left;
width: 100%;
}
.status-upload form textarea {
background: none repeat scroll 0 0 #fff;
border: medium none;
-webkit-border-radius: 4px 4px 0 0;
-moz-border-radius: 4px 4px 0 0;
-ms-border-radius: 4px 4px 0 0;
-o-border-radius: 4px 4px 0 0;
border-radius: 4px 4px 0 0;
color: #777777;
float: left;
font-family: Lato;
font-size: 14px;
height: 142px;
letter-spacing: 0.3px;
padding: 20px;
width: 100%;
resize:vertical;
outline:none;
border: 1px solid #F2F2F2;
}

.status-upload ul {
float: left;
list-style: none outside none;
margin: 0;
padding: 0 0 0 15px;
width: auto;
}
.status-upload ul > li {
float: left;
}
.status-upload ul > li > a {
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #777777;
float: left;
font-size: 14px;
height: 30px;
line-height: 30px;
margin: 10px 0 10px 10px;
text-align: center;
-webkit-transition: all 0.4s ease 0s;
-moz-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
width: 30px;
cursor: pointer;
}
.status-upload ul > li > a:hover {
background: none repeat scroll 0 0 #606060;
color: #fff;
}
.status-upload form button {
border: medium none;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #fff;
float: right;
font-family: Lato;
font-size: 14px;
letter-spacing: 0.3px;
margin-right: 9px;
margin-top: 9px;
padding: 6px 15px;
}
.dropdown > a > span.green:before {
border-left-color: #2dcb73;
}
.status-upload form button > i {
margin-right: 7px;
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
?>"><a href="profile.php">Profile</a></li>
<li role="separator" class="divider"></li>
<li><a href="logout.php">Log Out</a></li>
</ul>
</li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</div>
</nav>
</div>
<div class='container'>

<div class="container">
<div id="main_area">
<!-- Slider -->
<div class="row">
<div class="col-sm-6" id="slider-thumbs">
<!-- Bottom switcher of slider -->
<ul class="hide-bullets">
<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-0">
<img src="photos/TheGodfatherI.jpg">
</a>
</li>

<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-1"><img src="photos/GD/1.jpg"></a>
</li>

<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-2"><img src="photos/GD/2.jpg"></a>
</li>

<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-3"><img src="photos/GD/3.jpg"></a>
</li>

<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-4"><img src="photos/GD/4.jpg"></a>
</li>

<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-5"><img src="photos/GD/5.jpg"></a>
</li>
<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-6"><img src="photos/GD/6.jpg"></a>
</li>

<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-7"><img src="photos/GD/7.jpg"></a>
</li>

<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-8"><img src="photos/GD/8.jpg"></a>
</li>

<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-9"><img src="photos/GD/9.jpg"></a>
</li>
<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-10"><img src="photos/GD/10.jpg"></a>
</li>

<li class="col-sm-3">
<a class="thumbnail" id="carousel-selector-11"><img src="photos/GD/11.jpg"></a>
</li>


</ul>
</div>
<div class="col-sm-6">
<div class="col-xs-12" id="slider">
<!-- Top part of the slider -->
<div class="row">
<div class="col-sm-12" id="carousel-bounding-box">
<div class="carousel slide" id="myCarousel">
<!-- Carousel items -->
<div class="carousel-inner">
<div class="active item" data-slide-number="0">
<img src="photos/TheGodfatherI.jpg"></div>

<div class="item" data-slide-number="1">
<img src="photos/GD/1.jpg"></div>

<div class="item" data-slide-number="2">
<img src="photos/GD/2.jpg"></div>

<div class="item" data-slide-number="3">
<img src="photos/GD/3.jpg"></div>

<div class="item" data-slide-number="4">
<img src="photos/GD/4.jpg"></div>

<div class="item" data-slide-number="5">
<img src="photos/GD/5.jpg"></div>

<div class="item" data-slide-number="6">
<img src="photos/GD/6.jpg"></div>

<div class="item" data-slide-number="7">
<img src="photos/GD/7.jpg"></div>

<div class="item" data-slide-number="8">
<img src="photos/GD/8.jpg"></div>

<div class="item" data-slide-number="9">
	<img src="photos/GD/9.jpg"></div>

	<div class="item" data-slide-number="10">
		<img src="photos/GD/10.jpg"></div>

		<div class="item" data-slide-number="11">
			<img src="photos/GD/11.jpg"></div>


			<!-- Carousel nav -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
	</div>
</div>
</div>
</div>
<!--/Slider-->
</div>

</div>
</div>
<div class='row'>


<h1 class='title'>The Godfather</h1>
<div class='col-xs-6'>
<p class='description'><b>Storyline</b> <br>When the aging head of a famous crime family decides to transfer his position to one of his subalterns, a series of unfortunate events start happening to the family, and a war begins between all the well-known families leading to insolence, deportation, murder and revenge, and ends with the favorable successor being finally chosen</p>
<hr>
<div class='crew'>
<p><b>Director</b>: Francis Ford Coppola</p>
<p><b>Writers</b>:  Mario Puzo (screenplay), Francis Ford Coppola (screenplay)</p>
<p><b>Stars</b>: Marlon Brando, Al Pacino, James Caan </p>
</div>
<hr>
<div class='details'>
<h3>Details</h3>
<p><b>Country</b>: USA</p>
<p><b>Language</b>:  English | Italian | Latin</p>
<p><b>Realease Date</b>: 24 March 1972 (USA)</p>
<p><b>Filming Locations</b>: NY Eye and Ear Infirmary, 2nd Avenue & East 13th Street, New York City, New York, USA </p>
</div>
<hr>
</div>
<div class='col-xs-6'>
<div class='comments'>
<h3><b>Last Comment</b></h3>
<hr>
<p id='comments'>The godfather trilogy is an exclusive set of movies that will continue to live with humanity, every generation will see them to say, "Oh that was 10 out of 10." If you watch them you will know that the world that lives inside the underworld is same as the one we live in except that people in underworld are so smart, in fact smartness is the only thing that can keep them there. Don Vito Caroleone's early life shown in part-II is very well done to show the Don in making, how a kid who couldn't even tell his name went on becoming a underworld don who keep most senators, judges and lawyers in his pocket. Meeting of don with the so call five families are among most impressive scenes.
I need not say much! The Godfather father trilogy been around for a while and everyone knows that they are great set of movies, its just the matter of when you actually get to see them.</p>
<p id='comment'></p>
<div class="row">

<div class="col-md-6">
	<div class="widget-area no-padding blank">
		<div class="status-upload">
			<div class='form'>
				<textarea style='padding:30px;width:30vw;' placeholder="What do you think about this movie?" ></textarea>
				<ul>
					<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
					<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
					<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
					<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
				</ul>
				<button class="btn btn-success"><i class="fa fa-share"></i> Share</button>
			</div>
		</div><!-- Status Upload  -->
	</div><!-- Widget Area -->
</div>


</div>
</div>

</div>
<script>
jQuery(document).ready(function($) {
$('#myCarousel').carousel({
interval: 5000
});
$('[id^=carousel-selector-]').click(function () {
var id_selector = $(this).attr("id");
try {
var id = /-(\d+)$/.exec(id_selector)[1];
jQuery('#myCarousel').carousel(parseInt(id));
} catch (e) {
console.log('Regex failed!', e);
}
});

$('#myCarousel').on('slid.bs.carousel', function (e) {
var id = $('.item.active').data('slide-number');
$('#carousel-text').html($('#slide-content-'+id).html());
});
$('button').click(function(){
var message = $('textarea').val();
$('#comments').fadeOut().delay();
$('#comment').text(message);
$('textarea').val('');
})

});
</script>

<script src='index.js'></script>
</body>
</html>
