<?php  
include('admin/conn.php');
session_start();

if(isset($_GET['page']))
{
$page=$_GET['page'];
if($page==1){
  $sel="SELECT * FROM episodes LIMIT 0 , 4";
  $run_episode=mysqli_query($conn,$sel);


}
else{

  $limit= ($page * 4) -4 ;
  $sel="SELECT * FROM episodes LIMIT $limit , 4";
  $run_episode=mysqli_query($conn,$sel);


}


}

else{

  $sel="SELECT * FROM episodes LIMIT 0 , 4";
  $run_episode=mysqli_query($conn,$sel);

  $page=1;

}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="assets/img/favicon.png" />

    <!-- Title -->
    <title>Sunday confession</title>

    <!-- Font Google -->
    <link
      href="../../css.css?family=Muli:300,400,500,600,700,800,900&display=swap"
      rel="stylesheet"
    />

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="assets/css/all.css" />
    <link rel="stylesheet" href="assets/css/elegant-font-icons.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.css" />
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
          <a href="index.html">
            <img src="assets/img/logo-dark.png" alt="" class="logo-dark" />
            <img src="assets/img/logo-white.png" alt="" class="logo-white" />
          </a>
        </div>
        <!--/-->

        <!--navbar-collapse-->
        <div class="collapse navbar-collapse" id="main_nav">
          <ul class="navbar-nav ml-auto mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link active" href="index.html"> Home </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link" href="about.php">About </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php"> Confess </a>
            </li>
            <?php


    if((isset($_SESSION['user'])) or (isset($_SESSION['admin']) ) ){
      if(isset($_SESSION['user'])){
     $username=$_SESSION['name'];}

     else if(isset($_SESSION['admin']))
     {

$username=$_SESSION['admin'];}


     

     $welcome="<h5 class='pl-3 ml-3 '> Welcome $username</h5>";

      echo"<li class='nav-item'>
      <a class='nav-link' href='logout.php'> logout </a>
    </li>";

    }
    else
    {
      $welcome="<h4> </h4>";


      echo"
      
      <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle'
                         href='index.html' data-toggle='dropdown'> Login </a>
                        <ul class='dropdown-menu fade-up'>
                            <li>
                                <a class='dropdown-item' href='login.php'>Login</a>
                            </li>
                            <li>
                                <a class='dropdown-item' href='register.php'>register </a>
                            </li>
                         
                        </ul>
                    </li>
    
      
 ";

    }


?>
            
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
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
      </div>
    </nav>
    <?php echo $welcome ?>
    <!--/-->
<?php

$date=Date("d-M-Y");
 
$sel="SELECT * FROM episodes WHERE _Date='$date'";
$run=mysqli_query($conn,$sel);
$num_rows=mysqli_num_rows($run);
if($num_rows >0){
$fetch=mysqli_fetch_assoc($run);
$episode1=$fetch['Episode'];
$content1=$fetch['Content'];
$picture1=$fetch['Picture'];

$date1=$fetch['_Date'];
}
else{

  $sel=" SELECT * FROM episodes ORDER BY Episode DESC LIMIT 1;";
  $run_new=mysqli_query($conn,$sel);
  $fetch=mysqli_fetch_array($run_new);
  $episode1=$fetch['Episode'];
  $content1=$fetch['Title'];
  $picture1=$fetch['Picture'];
  
  $date1=$fetch['_Date'];

}
$sel=" SELECT * FROM episodes ORDER BY Episode_id DESC LIMIT 1  ;";
$run_new2=mysqli_query($conn,$sel);
$fetch=mysqli_fetch_array($run_new2);
$episode2=$fetch['Episode'];
$content2=$fetch['Title'];
$picture2=$fetch['Picture'];

$date2=$fetch['_Date'];


$sel="SELECT * FROM episodes
ORDER BY RAND()
LIMIT 1; ";
$run_new3=mysqli_query($conn,$sel);
$fetch=mysqli_fetch_array($run_new3);
$episode3=$fetch['Episode'];
$content3=$fetch['Title'];
$picture3=$fetch['Picture'];

$date3=$fetch['_Date'];


?>
    <!--carousel-hero-->
    <section class="section carousel-hero">
      <div class="owl-carousel">
        <div
          class="hero d-flex align-items-center"
          style="background-image: url('admin/uploads/<?php echo"$picture1"?>')"
        >
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="hero-content">
                  <a href="<?php echo "post-default.php?episode=$episode1"?>
                  " class="categorie">episode <?php echo"$episode1"?></a>
                  <h2>
                  <?php echo"$content1"?>
                  </h2>

                  <div class="post-card-info">
                    <ul class="list-inline">
                      <li>
                        <a href="author.html">
                          <img src="assets/img/author/1.jpg" alt="" />
                        </a>
                      </li>
                      <li>
                        <a href="author.html"></a>
                      </li>

                      <li class="dot"></li>
                      <li><?php echo"$date1"?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="hero d-flex align-items-center"
          style="background-image: url('admin/uploads/<?php echo"$picture2"?>')"
        >
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="hero-content">
                <a href="<?php echo "post-default.php?episode=$episode2"?>
                  " class="categorie">episode <?php echo"$episode2"?></a>
                  <h2>
                  <?php echo"$content2"?>
                  </h2>
                  <div class="post-card-info">
                    <ul class="list-inline">
                      <li>
                        <a href="author.html">
                          <img src="assets/img/author/1.jpg" alt="" />
                        </a>
                      </li>
                      <li>
                        <a href="#"></a>
                      </li>
                      <li class="dot"></li>
                      <li><?php echo"$date2"?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="hero d-flex align-items-center"
          style="background-image: url('admin/uploads/<?php echo"$picture3"?>')"
        >
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="hero-content">
                <a href="<?php echo "post-default.php?episode=$episode3"?>
                  " class="categorie">episode <?php echo"$episode3"?></a>
                  <h2>
                  <?php echo"$content3"?>
                  </h2>

                  <div class="post-card-info">
                    <ul class="list-inline">
                      <li>
                        <a href="author.html">
                          <img src="assets/img/author/1.jpg" alt="" />
                        </a>
                      </li>
                      <li>
                        <a href="#"></a>
                      </li>
                      <li class="dot"></li>
                      <li><?php echo"$date3"?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/-->

    <!--blog post-->
    <section class="mt-80">
      <div class="container-fluid">
        <div class="row">
             
        <?php

        while($fetch=mysqli_fetch_assoc($run_episode)){
         

          $episode=$fetch['Episode'];
          $date=$fetch['_Date'];
          $title=$fetch['Title'];
          $content=$fetch['Content'];
 $count_content=str_word_count($content);
          if ($count_content<70)
          {
            $content_edited=$content;


          }
          else{


            $content_edited=substr($content, 0, 450) . "<br>" . 
            "<a class='link-info' href='post-default.php?episode=$episode'>
            Read  more....</a> ";


          }

            $episode_id=$fetch['Episode_id'];

            $picture=$fetch['Picture'];
  
            $sel22="SELECT * FROM comments WHERE Episode_id='$episode_id'";
            $run22=mysqli_query($conn,$sel22);
            $num_rows=mysqli_num_rows($run22);
            if($num_rows==1){
            $comment= $num_rows . " " . "Comment";

          }
          else{
            $comment= $num_rows . " " . "Comment";
  
          }
  
        
         

      
       


echo " 
<div class='col-lg-6 col-md-6'>
<!--Post-1-->
<div class='post-card'>
    <div class='post-card-image'>
        <a href='post-default.html'>
          <img  src='admin/uploads/$picture' alt='' />
        </a>
      </div>
  <div class='post-card-content'>
    <a href='post-default.php?episode=$episode' class='categorie'>Episode $episode</a>
    <h5>
      <a href='post-default.php?episode=$episode'
        >$title
      </a>
    </h5>
    <p>
     $content_edited
    </p>
    <div class='post-card-info'>
      <ul class='list-inline'>
        <li>
          <a href='post-default.php'>
            <img src='assets/img/author/1.jpg' alt='' />
          </a>
        </li>
        
        <li>
          <a href='post-default.php'>sunday confessions</a>
        </li>
        <button class='btn btn-default' type='submit' name='remove_comment' value='$episode_id'>
              <span class='glyphicon glyphicon-comment'> </span>  $comment 
              </button>
        <li class='dot'></li>
        <li>$date</li>
      </ul>
    </div>
  </div>
</div>
</div>



   ";




        }

     




        /*

<div class="col-lg-6 col-md-6">
<!--Post-1-->
<div class="post-card">
    <div class="post-card-image">
        <a href="post-default.html">
          <img src="assets/img/blog/11.jpg" alt="" />
        </a>
      </div>
  <div class="post-card-content">
    <a href="blog-grid.html" class="categorie">episode one</a>
    <h5>
      <a href="post-default.html"
        >7 Dinner Recipes for a Date Night at Home
      </a>
    </h5>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
      quam atque ipsa laborum sunt distinctio...
    </p>
    <div class="post-card-info">
      <ul class="list-inline">
        <li>
          <a href="author.html">
            <img src="assets/img/author/1.jpg" alt="" />
          </a>
        </li>
        <li>
          <a href="author.html">sunday confessions</a>
        </li>
        <li class="dot"></li>
        <li>January 15, 2021</li>
      </ul>
    </div>
  </div>
</div>
<!--/-->
</div>
-->
<div class="col-lg-6 col-md-6">
<!--Post-2-->
<div class="post-card">
    <div class="post-card-image">
        <a href="post-default.html">
          <img src="assets/img/blog/11.jpg" alt="" />
        </a>
      </div>
  <div class="post-card-content">
    <a href="post-default.html" class="categorie">episode two</a>
    <h5>
      <a href="post-default.html"
        >7 Dinner Recipes for a Date Night at Home
      </a>
    </h5>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
      quam atque ipsa laborum sunt distinctio...
    </p>
    <div class="post-card-info">
      <ul class="list-inline">
        <li>
          <a href="author.html">
            <img src="assets/img/author/1.jpg" alt="" />
          </a>
        </li>
        <li>
          <a href="author.html">sunday confessions</a>
        </li>
        <li class="dot"></li>
        <li>January 15, 2021</li>
      </ul>
    </div>
  </div>
</div>
<!--/-->
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6">
<!--Post-3-->
<div class="post-card">
  <div class="post-card-image">
    <a href="post-default.php">
      <img src="assets/img/blog/11.jpg" alt="" />
    </a>
  </div>
  <div class="post-card-content">
    <a href="post-default.php" class="categorie">episode three</a>
    <h5>
      <a href="post-default.php"
        >Top 10 Fashion Trends from Spring/Summer 2021</a
      >
    </h5>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
      quam atque ipsa laborum sunt distinctio...
    </p>
    <div class="post-card-info">
      <ul class="list-inline">
        <li>
          <a href="author.php">
            <img src="assets/img/author/1.jpg" alt="" />
          </a>
        </li>
        <li>
          <a href="author.php">sunday confessions</a>
        </li>
        <li class="dot"></li>
        <li>January 15, 2021</li>
      </ul>
    </div>
  </div>
</div>
<!--/-->
</div>
<div class="col-lg-6 col-md-6">
<!--Post-4-->
<div class="post-card">
  <div class="post-card-image">
    <a href="post-default.php">
      <img src="assets/img/blog/6.jpg" alt="" />
    </a>
  </div>
  <div class="post-card-content">
    <a href="post-default.php" class="categorie">episode four</a>
    <h5>
      <a href="post-default.php"
        >Top 10 Forests That Every Nature Lover Must Visit</a
      >
    </h5>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
      quam atque ipsa laborum sunt distinctio...
    </p>

    <div class="post-card-info">
      <ul class="list-inline">
        <li>
          <a href="author.php">
            <img src="assets/img/author/1.jpg" alt="" />
          </a>
        </li>
        <li>
          <a href="author.php">sunday confessions</a>
        </li>
        <li class="dot"></li>
        <li>January 15, 2021</li>
      </ul>
    </div>
  </div>
</div>
<!--/-->
</div>
</div>

<div class="row">



<div class="col-lg-6 col-md-6">
<!--Post-5-->
<div class="post-card">
  <div class="post-card-image">
    <a href="post-default.php">
      <img class="img-fluid" src="assets/img/blog/3.jpg" alt="" />
    </a>
  </div>
  <div class="post-card-content">
    <a href="post-default.php" class="categorie">episode five</a>
    <h5>
      <a href="post-default.php"
        >How To Make Burger And French Fries At Home?</a
      >
    </h5>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
      quam atque ipsa laborum sunt distinctio...
    </p>

    <div class="post-card-info">
      <ul class="list-inline">
        <li>
          <a href="author.php">
            <img src="assets/img/author/1.jpg" alt="" />
          </a>
        </li>
        <li>
          <a href="author.php">sunday confessions</a>
        </li>
        <li class="dot"></li>
        <li>January 15, 2021</li>
      </ul>
    </div>
  </div>
</div>
<!--/-->
</div>
<div class="col-lg-6 col-md-6">
<!--Post-6-->
<div class="post-card">
  <div class="post-card-image">
    <a href="post-default.php">
      <img src="assets/img/blog/8.jpg" alt="" />
    </a>
  </div>
  <div class="post-card-content">
    <a href="post-default.php" class="categorie">episode six</a>
    <h5>
      <a href="post-default.php"
        >Everything you need to know about visiting Amazon.</a
      >
    </h5>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
      quam atque ipsa laborum sunt distinctio...
    </p>

    <div class="post-card-info">
      <ul class="list-inline">
        <li>
          <a href="author.php">
            <img src="assets/img/author/1.jpg" alt="" />
          </a>
        </li>
        <li>
          <a href="author.php">sunday confessions</a>
        </li>
        <li class="dot"></li>
        <li>January 15, 2021</li>
      </ul>
    </div>
  </div>
</div>
<!--/-->
</div>
<div class="col-lg-6 col-md-6">
<!--Post-7-->
<div class="post-card">
  <div class="post-card-image">
    <a href="post-default.php">
      <img src="assets/img/blog/12.jpg" alt="" />
    </a>
  </div>
  <div class="post-card-content">
    <a href="post-default.php" class="categorie">episode seven</a>
    <h5>
      <a href="post-default.php"
        >20+ Girly Outfits to Buy for the First Day of Winter</a
      >
    </h5>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
      quam atque ipsa laborum sunt distinctio...
    </p>

    <div class="post-card-info">
      <ul class="list-inline">
        <li>
          <a href="author.php">
            <img src="assets/img/author/1.jpg" alt="" />
          </a>
        </li>
        <li>
          <a href="author.php">sunday confessions</a>
        </li>
        <li class="dot"></li>
        <li>January 15, 2021</li>
      </ul>
    </div>
  </div>
</div>
<!--/-->
</div>
<div class="col-lg-6 col-md-6">
<!--Post-8-->
<div class="post-card">
  <div class="post-card-image">
    <a href="post-default.php">
      <img src="assets/img/blog/3.jpg" alt="" />
    </a>
  </div>
  <div class="post-card-content">
    <a href="post-default.php" class="categorie">episode eight</a>
    <h5>
      <a href="post-default.php"
        >Learn How to make morocco's pincake step by step?</a
      >
    </h5>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
      quam atque ipsa laborum sunt distinctio...
    </p>

    <div class="post-card-info">
      <ul class="list-inline">
        <li>
          <a href="author.php">
            <img src="assets/img/author/1.jpg" alt="" />
          </a>
        </li>
        <li>
          <a href="author.php">sunday confessions</a>
        </li>
        <li class="dot"></li>
        <li>January 15, 2021</li>
      </ul>
    </div>
  </div>
</div>
*/

?>
        
          
          </div>

          <!--pagination-->
          <div class="col-lg-12  d-flex justify-content-center">
            <div class="pagination mt--10">
              <ul class="list-inline">
<?php 


          $sel="SELECT * FROM  episodes";
          $run= mysqli_query($conn,$sel);
          $num_rows=mysqli_num_rows($run);
          $num_of_pages=ceil($num_rows/4);


          for( $i =1 ; $i<=$num_of_pages;$i++ )
          {
              if ($page ==$i)
              {
            echo"      <li class='active'>
            <a href='index.php?page=$i'>$i</a>
          </li>
    "
    ;
              }
              else
              {

                echo"      <li>
                <a href='index.php?page=$i'>$i</a>
              </li>
        "
        ;


              }

          }
          

?>
<li>
                  <a href="#">
                    <i class="arrow_carrot-2right"></i>
                  </a>
                </li>

<!--
<li>
                  <a href="#">
                    <i class="arrow_carrot-2right"></i>
                  </a>
                </li>

                <li class="active">
                  <a href="#">1</a>
                </li>
                <li>
                  <a href="#">2</a>
                </li>
                <li>
                  <a href="#">3</a>
                </li>
                <li>
                  <a href="#">4</a>
                </li>
                <li>
                  <a href="#">
                    <i class="arrow_carrot-2right"></i>
                  </a>
                </li>
        -->
              </ul>
            </div>
            <!--/-->
          </div>
        </div>
      </div>
    </section>
    <!--/-->

    <!--newslettre-->
    <section class="newslettre">
      <div class="container-fluid">
        <div class="newslettre-width text-center">
          <div class="newslettre-info">
            <h5>Subscribe to our Newslatter</h5>
            <p>
              Sign up for free and be the first to get notified about new posts.
            </p>
          </div>
          <form action="#" class="newslettre-form">
            <div class="form-flex">
              <div class="form-group">
                <input
                  type="email"
                  class="form-control"
                  placeholder="Your email adress"
                  required="required"
                />
              </div>
              <button class="submit-btn" type="submit">Subscribe</button>
            </div>
          </form>
          <div class="social-icones">
            <ul class="list-inline">
              
              <li>
                <a href="http://twitter.com/sundaycnfssns"> <i class="fab fa-twitter"></i>Twitter </a>
              </li>
              <li>
                <a href="http://instagram.com/sundaycnfssns"> <i class="fab fa-instagram"></i>Instagram </a>
              </li>
              <li>
                <a href="https://youtube.com/channel/UC1BG18z9hBrktfq3qpBdQfQ"> <i class="fab fa-youtube"></i>Youtube</a>
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
              <p>
              <span>Copyright © 2021 <b class="text-dark">weware</b>. All Right Reserved</span>
              </p>
            </div>
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
        <div class="search-width text-center">
          <button type="button" class="close">
            <i class="icon_close"></i>
          </button>
          <form class="search-form" action="#">
            <input
              type="search"
              value=""
              placeholder="What are you looking for?"
            />
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
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/switch.js"></script>

    <!-- JS main  -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
