<!DOCTYPE html>
<html lang="en">
<head>
<title>The Viewer</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="index.css">
<style>
.container-fluid {
  overflow-x:hidden;
}
</style>
</head>
<body>
  <div class='container-fluid'>
    <div class='bg'>
      <div class='logo'>
        <h1>The Viewer</h1>
      </div>
      <div class="row 1">
        <div class='col-xs-12'>
          <img src="photos/GhostBusters.jpg" alt="" class="img-responsive shape">
          <img src="photos/BeautyAndTheBeast.jpg" alt="" class="img-responsive shape">
          <img src="photos/Divergent.jpg" alt="" class="img-responsive shape">
          <img src="photos/Drive.jpg" alt="" class="img-responsive shape">
          <img src="photos/FightClub.jpg" alt="" class="img-responsive shape">
          <img src="photos/LifeIsBeautiful.jpg" alt="" class="img-responsive shape">
          <img src="photos/Titanic.jpg" alt="" class="img-responsive shape">
          <img src="photos/SherlockHolmes.jpg" alt="" class="img-responsive shape">
          <img src="photos/JungleBook.jpg" alt="" class="img-responsive shape">
        </div>
      </div>
      <div class='row 2'>
        <div class='col-xs-12'>
         <img src="photos/InterStellar.jpg" alt="" class="img-responsive shape">
         <img src="photos/GoodFellas.jpg" alt="" class="img-responsive shape">
         <img src="photos/HarryPotter.jpg" alt="" class="img-responsive shape">
         <img src="photos/LawAbidingCitizen.jpg" alt="" class="img-responsive shape"> 
         <img src="photos/SkyFall.jpg" alt="" class="img-responsive shape">
         <img src="photos/TheGodfatherI.jpg" alt="" class="img-responsive shape">
         <img src="photos/Rocky.jpg" alt="" class="img-responsive shape">
         <img src="photos/Perfume.jpg" alt="" class="img-responsive shape">
         <img src="photos/TheGrey.jpg" alt="" class="img-responsive shape">
       </div>
     </div>

     <div class='row 3'>
      <div class='col-xs-12'>
        <img src="photos/BlackSwan.jpg" alt="" class="img-responsive shape">
        <img src="photos/Gamer.jpg" alt="" class="img-responsive shape">
        <img src="photos/TheShawshankRedemption.jpg" alt="" class="img-responsive shape">
        <img src="photos/Schindler'sList.jpg" alt="" class="img-responsive shape"> 
        <img src="photos/ForestGump.jpg" alt="" class="img-responsive shape">
        <img src="photos/Inception.jpg" alt="" class="img-responsive shape">
        <img src="photos/TheMatrix.jpg" alt="" class="img-responsive shape">
        <img src="photos/Life.jpg" alt="" class="img-responsive shape">
        <img src="photos/Nacho-Libre.jpg" alt="" class="img-responsive shape">
      </div>
    </div>
  </div>
  <div class="blog-posts row" style='margin-top:-80px;'>
    <div class="post col-xs-4 post-1">
     <img src="photos/LawAbidingCitizen.jpg" class='img-responsive square'>
   </div>
   <div class="post col-xs-4 post-3">
    <img src="photos/Arrival.jpg" class='img-responsive square'>
  </div>
  <div class='post col-xs-4 post-2'>
   
    <div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>

          <form action="register.php" method="post">

            <div class="top-row">
              <div class="field-wrap">
                <label>
                  First Name<span class="req">*</span>
                </label>
                <input type="text" name='first_name' required autocomplete="off" />
              </div>

              <div class="field-wrap">
                <label>
                  Last Name<span class="req">*</span>
                </label>
                <input type="text" name='last_name' required autocomplete="off"/>
              </div>
            </div>

            <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email" name='email' required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Set A Password<span class="req">*</span>
              </label>
              <input type="password" name='password' required autocomplete="off"/>
            </div>

            <button type="submit" class="button button-block"/>Get Started</button>

          </form>

        </div>

        <div id="login">   
          <h1>Welcome Back!</h1>

          <form action='login.php' method="post">

            <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email" name='email' required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" name='password' required autocomplete="off"/>
            </div>


            <button class="button button-block"/>Log In</button>

          </form>

        </div>

      </div><!-- tab-content -->

    </div>
  </div>
</div>
<br>
<footer class='row'>
  <div id="share-buttons">
    <!-- Buffer -->
    <a href="https://bufferapp.com/add?url=https://simplesharebuttons.com&amp;text=Simple Share Buttons" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/buffer.png" alt="Buffer" />
    </a>

    <!-- Digg -->
    <a href="http://www.digg.com/submit?url=https://simplesharebuttons.com" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/diggit.png" alt="Digg" />
    </a>

    <!-- Email -->
    <a href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://simplesharebuttons.com">
      <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
    </a>

    <!-- Facebook -->
    <a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>

    <!-- Google+ -->
    <a href="https://plus.google.com/share?url=https://simplesharebuttons.com" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
    </a>

    <!-- LinkedIn -->
    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://simplesharebuttons.com" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
    </a>

    <!-- Pinterest -->
    <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
      <img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
    </a>

    <!-- Print -->
    <a href="javascript:;" onclick="window.print()">
      <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
    </a>

    <!-- Reddit -->
    <a href="http://reddit.com/submit?url=https://simplesharebuttons.com&amp;title=Simple Share Buttons" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
    </a>

    <!-- Tumblr-->
    <a href="http://www.tumblr.com/share/link?url=https://simplesharebuttons.com&amp;title=Simple Share Buttons" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
    </a>

    <!-- Twitter -->
    <a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
      <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>

  </div>
</footer>
</div>


</div>
<script src="jquery/jquery.min.js"></script>
<script src="index.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
