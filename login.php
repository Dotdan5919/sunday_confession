<?php




if(isset($_GET['talker']))
{

    $talker=$_GET['talker'];


    echo "<script> alert('$talker, Please Login  ' ) </script>"   ." "."" ;



}
else if((isset($_SESSION['user'])) or (isset($_SESSION['admin']) ) )
{

header('location:index.php');

}



?>



<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="assets/img/favicon.png">

    <!-- Title -->
    <title>Sunday Confessions </title>
    
    <!-- Font Google -->
    <link href="../../css.css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    
    <!-- CSS Plugins -->
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/elegant-font-icons.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>  
    <!--loading -->
    <div class="loading">
        <div class="circle"></div>
    </div>
    <!--/-->

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <!--logo-->
        <div class="logo">
          <a href="index.php">
            <img src="assets/img/logo-dark.png" alt="" class="logo-dark" />
            <img src="assets/img/logo-white.png" alt="" class="logo-white" />
          </a>
        </div>
        <!--/-->

        <!--navbar-collapse-->
        <div class="collapse navbar-collapse" id="main_nav">
          <ul class="navbar-nav ml-auto mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link active" href="index.php"> Home </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link" href="about.php">About </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php"> Confess </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php"> Register </a>
            </li>
          </ul>
        </div>
        <!--/-->

        <!--navbar-right-->
        <div class="navbar-right ml-auto">
          <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
              <input type="checkbox" id="checkbox" />
              <div class="slider round"></div>
            </label>
          </div>
          <div class="social-icones">
            <ul class="list-inline">
              <li>
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li>
                <a href="instagram.com/sundaycnfssns">
                  <i class="fab fa-instagram"></i>
                </a>
              </li>
              <li>
                <a href="http://twitter.com/sundaycnfssns">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="https://youtube.com/channel/UC1BG18z9hBrktfq3qpBdQfQ">
                  <i class="fab fa-youtube"></i>
                </a>
              </li>
            </ul>
          </div>

          <div class="search-icon">
            <i class="icon_search"></i>
          </div>

          

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> </span>
        </button>
        </div>
      </div>
    </nav>
    <!--/-->

    <!--Login-->
    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>Login</h5>
                </div>
                <form action="processor.php" class="sign-form widget-form " method="POST">
                        <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email*" 
                        name="email" >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"
                         placeholder="Password*" name="password" >
                    </div>
                    <div class="sign-controls form-group">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                            <label class="custom-control-label" for="rememberMe">Remember Me</label>
                        </div>
                        <a href="#" class="btn-link  ml-auto">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn-custom">Login</button>
                    </div>
                    
                    <p class="form-group text-center">Don't have an account? <a href="register.php" class="btn-link">Create One</a> </p>
                    
                </form>
            </div> 
        </div>
    </section>        

    <!--newslettre-->
    <section class="newslettre">
        <div class="container-fluid">
            <div class="newslettre-width text-center">
                <div class="newslettre-info">
                    <h5>Subscribe to our Newslatter</h5>
                    <p> Sign up for free and be the first to get notified about new posts. </p>
                </div>
                <form action="#" class="newslettre-form">
                    <div class="form-flex">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your email adress" required="required">
                        </div>
                        <button class="submit-btn" type="submit">Subscribe</button>
                    </div>
                </form>
                <div class="social-icones">
                    <ul class="list-inline">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>Facebook</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>Twitter </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>Instagram </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-youtube"></i>Youtube</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!--footer-->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                    <span>Copyright © 2022 <b class="text-dark">weware</b>. All Right Reserved</span>
                    <div class="back">
                        <a href="#" class="back-top">
                            <i class="arrow_up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--Search-form-->
    <div class="search">
        <div class="container-fluid">
            <div class="search-width  text-center">
                <button type="button" class="close">
                    <i class="icon_close"></i>
                </button>
                <form class="search-form" action="#">
                    <input type="search" value="" placeholder="What are you looking for?">
                    <button type="submit" class="search-btn">search</button>
                </form>
            </div>
        </div>
    </div>
    <!--/-->
  
  
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.5.0.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- JS Plugins  -->
    <script src="assets/js/ajax-contact.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/switch.js"></script>
    
    <!-- JS main  -->
    <script src="assets/js/main.js"></script>


</body>
</html>