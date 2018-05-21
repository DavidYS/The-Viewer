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
  <style>
   .carousel-control.right {
    background-image: linear-gradient(to right,hsla(0, 0%, 0%, 0.0001) 0,hsla(0, 0%, 100%, 0.5) 100%) !important;
  }

  .navbar-right {
    margin-left:17vw;
  }
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
    width: 30%;
    margin: auto;
    display:inline;
    width:27vw;
    height:38vw;
    max-width:370px;
    max-height:505px;
  }
  .carousel-inner {
    margin-bottom:50px;
  }

  .othertop{margin-top:10px;}
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
        <h2>Find a movie for Friday night</h2>
        <p>For more details about movie, click on the image.</p>
        <div class='action'>
          <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li class="item1 active"></li>
              <li class="item2"></li>
              <li class="item3"></li>
              <li class="item4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="photos/GoodFellas.jpg" class='img-responsive'>
                <img src="photos/TheGodfatherI.jpg" class='img-responsive'>
                <img src="photos/TheShawshankRedemption.jpg" class='img-responsive'>
              </div>

              <div class="item">
                <img src="photos/Seven.jpg" class='img-responsive'>
                <img src="photos/TheGodfatherII.jpg" class='img-responsive'>
                <img src="photos/AngryMen.jpg" class='img-responsive'>
              </div>
              <div class="item">
                <img src="photos/Prisoners.jpg" class='img-responsive'>
                <img src="photos/TheGreenMile.jpg" class='img-responsive'>
                <img src="photos/TheBandit.jpg" class='img-responsive'>
              </div>

              <div class="item">
                <img src="photos/TaxiDriver.jpg" class='img-responsive'>
                <img src="photos/Heat.jpg" class='img-responsive'>
                <img src="photos/Casino.jpg" class='img-responsive'>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <div class='container'>
        <div class='drama'>
          <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li class="item1 active"></li>
              <li class="item2"></li>
              <li class="item3"></li>
              <li class="item4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="photos/Titanic.jpg" class='img-responsive'>
                <img src="photos/Schindler'sList.jpg" class='img-responsive'>
                <img src="photos/ForestGump.jpg" class='img-responsive'>
              </div>

              <div class="item">
                <img src="photos/YourName.jpg" class='img-responsive'>
                <img src="photos/InterStellar.jpg" class='img-responsive'>
                <img src="photos/Children.jpg" class='img-responsive'>
              </div>
              <div class="item">
                <img src="photos/BeautyAndTheBeast.jpg" class='img-responsive'>
                <img src="photos/TheIntouchables.jpg" class='img-responsive'>
                <img src="photos/LionKing.jpg" class='img-responsive'>
              </div>

              <div class="item">
                <img src="photos/TheGreenMile.jpg" class='img-responsive'>
                <img src="photos/CasaBlanca.jpg" class='img-responsive'>
                <img src="photos/LifeIsBeautiful.jpg" class='img-responsive'>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class='container'>
      <div class='family'>
        <div id="myCarousel" class="carousel slide">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li class="item1 active"></li>
            <li class="item2"></li>
            <li class="item3"></li>
            <li class="item4"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="photos/WallE.jpg" class='img-responsive'>
              <img src="photos/Children.jpg" class='img-responsive'>
              <img src="photos/LionKing.jpg" class='img-responsive'>
            </div>

            <div class="item">
              <img src="photos/InsideOut.jpg" class='img-responsive'>
              <img src="photos/ToyStory.jpg" class='img-responsive'>
              <img src="photos/Zootopia.jpg" class='img-responsive'>
            </div>
            <div class="item">
              <img src="photos/InterStellar.jpg" class='img-responsive'>
              <img src="photos/BeautyAndTheBeast.jpg" class='img-responsive'>
              <img src="photos/Up.jpg" class='img-responsive'>
            </div>

            <div class="item">
              <img src="photos/KungFu.jpg" class='img-responsive'>
              <img src="photos/Incredibles.jpg" class='img-responsive'>
              <img src="photos/LifeIsBeautiful.jpg" class='img-responsive'>
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class='container'>
    <div class='sf'>
      <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li class="item1 active"></li>
          <li class="item2"></li>
          <li class="item3"></li>
          <li class="item4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="photos/TheMatrix.jpg" class='img-responsive'>
            <img src="photos/Thor.jpg" class='img-responsive'>
            <img src="photos/CaptainAmerica.jpg" class='img-responsive'>
          </div>

          <div class="item">
            <img src="photos/DeadPool.jpg" class='img-responsive'>
            <img src="photos/Superman.jpg" class='img-responsive'>
            <img src="photos/Inception.jpg" class='img-responsive'>
          </div>
          <div class="item">
            <img src="photos/TheDarkKnight.jpg" class='img-responsive'>
            <img src="photos/Arrival.jpg" class='img-responsive'>
            <img src="photos/StarTrek.jpg" class='img-responsive'>
          </div>

          <div class="item">
            <img src="photos/RealSteel.jpg" class='img-responsive'>
            <img src="photos/Logan.jpg" class='img-responsive'>
            <img src="photos/HarryPotter.jpg" class='img-responsive'>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

    var $search = $('input[name="search"]');
    var $sButton = $('#searchButton');
    $sButton.click(function(){
     event.preventDefault();

   });
    $($search).on('keyup blur focusout focusin hover', function(){
      var search = $search.val();

      if(search.length > 0)
        { $sButton.unbind('click')
      $sButton.removeClass('disabled');
    }
    else
    {
      $sButton.on('click',function(){
        event.preventDefault();})

      $sButton.addClass('disabled');

    }
  })
    $('img').hover(function() {
      $(this).nextAll().css('opacity', '0.4');
      $(this).prevAll().css('opacity', '0.4');
      $(this).css('opacity', '1');
      $(this).click(function() {
        var file = this.src.split(/(\\|\/)/g).pop();
        localStorage.setItem("movie",file);
        window.location='movie.php';
      }); 
    }, function() {
      $('img').css('opacity', '1');
    });
    $('this').hover(function() {
      $(this.parent()).delay();
    })
    $("div #myCarousel").carousel({interval: 2500});
    w
    $(".item1").click(function(){
      $(this).closest('#myCarousel').carousel(0);
    });
    $(".item2").click(function(){
      $(this).closest('#myCarousel').carousel(1);
    });
    $(".item3").click(function(){
      $(this).closest('#myCarousel').carousel(2);
    });
    $(".item4").click(function(){
      $(this).closest('#myCarousel').carousel(3);
    });
    
    $(".left").click(function(){
      $(this).closest('#myCarousel').carousel("prev");
    });
    $(".right").click(function(){
      $(this).closest('#myCarousel').carousel("next");
    });
  });
</script>


</body>
</html>
