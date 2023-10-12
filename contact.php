<?php  
include('admin/conn.php');

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
    <title>  </title>
    
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
                <a class="nav-link " href="index.php"> Home </a>
              </li>
  
              <li class="nav-item dropdown">
                <a class="nav-link" href="about.php">About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="contact.php"> Confess </a>
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
                  <a href="#">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#">
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
    <!--/-->

    <!--contact us-->
    <section class="section pt-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h5>Confess now</h5>
                    </div>
                </div>
            </div>
  
            <div class="row mb-20">
                <div class="col-lg-8 mt-30">
                    <div class="contact">
                        <div class="google-map">
                            
                        </div><!-- contact_form-->

<?php

$week=date("W");
$sel="SELECT * FROM question WHERE Week='$week'";
 $run= mysqli_query($conn,$sel);
$fetch=mysqli_fetch_array($run);

if(empty($fetch)){
    $question="No question for the week";
    $question_id=$fetch['Question_id'];
    

}
else{
    $question=$fetch['Question'] . "?";
    $question_id=$fetch['Question_id'];
    

}
echo"
 <div class='post-single-body'>
 <p>  Week  $week  </p>                 
<h5>  $question  </h5><small> (Question of the week)</small>


";


?>


                        <form action="processor.php" class="widget-form   " method="POST" id="main_contact_form">
                            <h6></h6>
                            <p>     </p>
                            <?php 

if(isset($_GET['confess']))
{
$confess=$_GET['confess'];
if($confess==true)
{

echo"   <div class='alert alert-success contact_msg' style='display:' role='alert'>
Your confession was sent successfully.
</div> ";

}
else if($confess==false)
{
    echo"   <div class='alert alert-danger contact_msg' style='display:' role='alert'>
    Your confession was unsuccessfully.
    </div> ";


}

}


?>

                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control" 
                                placeholder="Your Name*" required="required">
                            </div>
                        
                            <div class="form-group ">
                                <label class="h2"> Sex </label>
                            <select class="form-select  col-md-12  form-control " name="sex" placeholder="Sex"
                             aria-label="Default select example">
  <option  class="form-control " value="M">Male</option>
  <option  class="form-control " value="F">Female</option>
  
</select>
                   
                   
                    </div>
                     <!-- Multiselect dropdown -->
        

           

             <!--    <input type="checkbox" name="sex" value="M" id="sex-male" 
                                class="form-check-input form-control"   >
                                <label class="form-check-label" for="sex-female" > Male </label>
                                <br>
                                <input type="checkbox" name="sex" value="F" id="sex-female" 
                                class="form-check-input form-control"  >
                                <label class="form-check-label" for="sex-female" > Female </label>

-->
                           
                        
                            <div class="form-group">
                                <input type="text" name="question" id="subject" class="form-control" 
                                placeholder="Your Subject*"  value= '<?php echo $question; ?>' 
                                style='display:none' required="required">
                            </div>
                            <div class="form-group">
                                <input type="text" name="question_id" id="subject" class="form-control" 
                                placeholder="Your Subject*"  value= '<?php echo $question_id; ?>' style='display:none' required="required">
                            </div>
                        
                            <div class="form-group">
                                <textarea name="confession" id="message" cols="30" rows="5"
                                 class="form-control" placeholder="Confession*"
                                  required="required"></textarea>
                            </div>
                        
                            <button type="submit" name="confess" class="btn-custom">Send Message </button>
                        </form>
                    </div> 
                </div>
                </div>
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
$episode_id=$fetch['Episode_id'];
$sel="SELECT * FROM comments WHERE Episode_id='$episode_id'";
$run_comments=mysqli_query($conn,$sel);
$num_comments1=mysqli_num_rows($run_comments);

$date1=$fetch['_Date'];
}
else{

  $sel=" SELECT * FROM episodes ORDER BY Episode DESC LIMIT 1;";
  $run_new=mysqli_query($conn,$sel);
  $fetch=mysqli_fetch_array($run_new);
  $episode1=$fetch['Episode'];
  $content1=$fetch['Title'];
  $picture1=$fetch['Picture'];

  $episode_id=$fetch['Episode_id'];
$sel="SELECT * FROM comments WHERE Episode_id='$episode_id'";
$run_comments=mysqli_query($conn,$sel);
$num_comments1=mysqli_num_rows($run_comments);
  
  $date1=$fetch['_Date'];

}
$sel=" SELECT * FROM episodes ORDER BY Episode_id DESC LIMIT 1  ;";
$run_new2=mysqli_query($conn,$sel);
$fetch=mysqli_fetch_array($run_new2);
$episode2=$fetch['Episode'];
$content2=$fetch['Title'];
$picture2=$fetch['Picture'];
$episode_id=$fetch['Episode_id'];
$sel="SELECT * FROM comments WHERE Episode_id='$episode_id'";
$run_comments=mysqli_query($conn,$sel);
$num_comments2=mysqli_num_rows($run_comments);
$date2=$fetch['_Date'];


$sel="SELECT * FROM episodes
ORDER BY RAND()
LIMIT 1; ";
$run_new3=mysqli_query($conn,$sel);
$fetch=mysqli_fetch_array($run_new3);
$episode3=$fetch['Episode'];
$content3=$fetch['Title'];
$picture3=$fetch['Picture'];
$episode_id=$fetch['Episode_id'];
$sel="SELECT * FROM comments WHERE Episode_id='$episode_id'";
$run_comments=mysqli_query($conn,$sel);
$num_comments3=mysqli_num_rows($run_comments);
$date3=$fetch['_Date'];





?>
                <div class="col-lg-4 max-width">
                <!--widget-latest-posts-->
                <div class="widget ">
                    <div class="section-title">
                        <h5>Latest Posts</h5>
                    </div>
                    <ul class="widget-latest-posts">
                        <li class="last-post">
                            <div class="image">
                                <a href="post-default.php?episode=<?php echo $episode1;?>">
                                    <img src="admin/uploads/<?php echo "$picture1";?>" alt="...">
                                </a>
                            </div>
                            <div class="nb"><?php echo $num_comments1; ?></div>
                            <div class="content">
                                <p>
                                    <a href="post-default.php <?php echo'?episode=$episode1';?>"> <?php echo $content1;
                                    ?> </a>
                                </p>
                                <small>
                                    <span class="icon_clock_alt"></span><?php echo $date1;
                                    ?></small>
                            </div>
                        </li>
                        <li class="last-post">
                            <div class="image">
                                <a href="post-default.php?episode=<?php echo $episode2;?>">
                                    <img src="admin/uploads/<?php echo "$picture2";?>" alt="...">
                                </a>
                            </div>
                            <div class="nb"><?php echo $num_comments2; ?></div>
                            <div class="content">
                                <p>
                                    <a href="post-default.php"><?php echo $content2; ?></p>
                                <small>
                                    <span class="icon_clock_alt"></span><?php echo $date2;?></small>
                            </div>
                        </li>
                        <li class="last-post">
                            <div class="image">
                                <a href="post-default.php?episode=<?php echo $episode3;?>">
                                    <img src="admin/uploads/<?php echo "$picture3";?>" alt="...">
                                </a>
                            </div>
                            <div class="nb"><?php echo $num_comments3; ?></div>
                            <div class="content">
                                <p>
                                    <a href="post-default.php"><?php echo $content3; ?></a>
                                </p>
                                <small>
                                    <span class="icon_clock_alt"></span> <?php echo $date3; ?></small>
                            </div>
                        </li>
                       
                    </ul>
                </div>
                <!--/-->
                    
                    <!--widget-instagram-->
                    <div class="widget">
                        <div class="section-title">
                            <h5>Instagram</h5>
                        </div>
                        <ul class="widget-instagram">
                            <li>
                                <a class="image" href="#">
                                    <img src="assets/img/instagram/1.jpg" alt="">
                                </a>
                            </li>
                            <li>
                                <a class="image" href="#">
                                    <img src="assets/img/instagram/2.jpg" alt="">
                                </a>
                            </li>
                            <li>
                                <a class="image" href="#">
                                    <img src="assets/img/instagram/3.jpg" alt="">
                                </a>
                            </li>
                            <li>
                                <a class="image" href="#">
                                    <img src="assets/img/instagram/4.jpg" alt="">
                                </a>
                            </li>
                            <li>
                                <a class="image" href="#">
                                    <img src="assets/img/instagram/5.jpg" alt="">
                                </a>
                            </li>
                            <li>
                                <a class="image" href="#">
                                    <img src="assets/img/instagram/6.jpg" alt="">
                                </a>
                            </li>
                        </ul>
                    
                    </div>
                    <!--/-->
                </div>
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
                            <a href="twitter.com/sundaycnfssns">
                                <i class="fab fa-twitter"></i>Twitter </a>
                        </li>
                        <li>
                            <a href="instagram.com/sundaycnfssns">
                                <i class="fab fa-instagram"></i>Instagram </a>
                        </li>
                        <li>
                            <a href="https://youtube.com/channel/UC1BG18z9hBrktfq3qpBdQfQ">
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
                        <p>© Copyright 2021 <a href="instagram.com/sundaycnfssns">sunday confessions</a>, All rights reserved.</p>
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