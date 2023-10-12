<?php include('admin/conn.php');

session_start();

if(isset($_GET['episode']))
{
$episode=$_GET['episode'];

  $sel="SELECT * FROM episodes WHERE Episode ='$episode'";
  $run_episode=mysqli_query($conn,$sel);
    $fetch=mysqli_fetch_assoc($run_episode);
    $episode=$fetch['Episode'];
    $title=$fetch['Title'];
    $content=$fetch['Content'];
    $episode_id=$fetch['Episode_id'];
    $date=$fetch['_Date'];
    $picture=$fetch['Picture'];



}
else if(isset($_GET['episode_id']))
{
$episode_id=$_GET['episode_id'];

  $sel="SELECT * FROM episodes WHERE Episode_id ='$episode_id'";
  $run_episode=mysqli_query($conn,$sel);
    $fetch=mysqli_fetch_assoc($run_episode);
    $episode=$fetch['Episode'];
    $title=$fetch['Title'];
    $content=$fetch['Content'];
    $episode_id=$fetch['Episode_id'];
    $date=$fetch['_Date'];
    $picture=$fetch['Picture'];



}

else{


header(
"Location:index.php"
);


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
    <title> NoonPost. - Personal Blog HTML Template </title>
    
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
                <a href="index.html">
                    <img src="assets/img/logo-dark.png" alt="" class="logo-dark">
                    <img src="assets/img/logo-white.png" alt="" class="logo-white">
                </a>
            </div>
            <!--/-->
    
            <!--navbar-collapse-->
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ml-auto mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link  " href="index.php" > Home </a>
                      
                    </li>
    
                    
                   
    
                    <li class="nav-item dropdown">
                        <a class="nav-link  " href="about.php" >About </a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php"> Confess </a>
                    </li>
                </ul>
            </div>
            <!--/-->
    
            <!--navbar-right-->
            <div class="navbar-right ml-auto">
                <div class="theme-switch-wrapper">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox">
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

  
    <!--post-default-->
    <section class="section pt-55 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mb-20">
                    <!--Post-single-->
                    <div class="post-single">
                        <div class="post-card">
                            <div class="post-card-image">
                              <a href="post-default.html">
                                <img class="img-fluid" src="<?php echo "admin/uploads/$picture " ?>" alt="" />
                              </a>
                            </div>
                            <div class="post-card-content">
                              <a href="#" class="categorie">Episode <?php echo "$episode " ?></a>
                              <h5>
                                <a href="post-default.html"
                                  > <?php echo "$title " ?></a
                                >
                              </h5>
                              <p>
                              <?php echo "$content " ?>
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
                          <?php


$week=date("W");
$sel="SELECT * FROM question WHERE Week='$week'";
$run=mysqli_query($conn,$sel);
$fetch=mysqli_fetch_array($run);

if(empty($fetch))
{
    $question=" ";
    $week=" ";

}
else{
    $question=$fetch['Question']."?";
    $week=$fetch['Week'];
    

}


$sel2="SELECT * FROM confess WHERE Week='$week' AND Live='1'";
$run2=mysqli_query($conn,$sel2);
echo"
<br>

<div class='post-single-body'>
      <h6>  Week  $week  </h6><small>(Question of the week)</small>                 
<h5>  $question  </h5> 
";  

while($fetch_comment=mysqli_fetch_assoc($run2) )
{


    $confess=$fetch_comment['Confession'];
    $sex=$fetch_comment['Sex'];
    if(empty($confess)){
    
   
    
    }
    else{
      echo"
      <br>
    
      
    
      <div class='quote'>
          <div><i class='icon_quotations_alt'></i></div>
          <p>
          $confess
          </p>
          <small>$sex</small>
      </div>
      ";

}

}







?>
                                   <!--             <div class="post-single-body">
                         
                            <h5> 1 - whats the wierdest thing you have done to some one? </h5>

                            <div class="quote">
                                <div><i class="icon_quotations_alt"></i></div>
                                <p>
                                    The man who goes alone can start today; but he who 
                                    travels with another must wait till that other is ready.
                                </p>
                                <small>F</small>
                            </div>
                            
                           
                            <h5>2 -  whats the wierdest thing you have done to some one?</h5>
                        
                            <div class="quote">
                                <div><i class="icon_quotations_alt"></i></div>
                                <p>
                                    The man who goes alone can start today; but he who 
                                    travels with another must wait till that other is ready.
                                    
                                    The man who goes alone can start today; but he who 
                                    travels with another must wait till that other is ready.
                                    The man who goes alone can start today; but he who 
                                    travels with another must wait till that other is ready.
                                    
                                    The man who goes alone can start today; but he who 
                                    travels with another must wait till that other is ready.
                                </p>
                                <small>M</small>
                            </div>
                    
                          
                            <h5>3 - whats the wierdest thing you have done to some one?</h5>
                            
                           
                            <div class="quote">
                                <div><i class="icon_quotations_alt"></i></div>
                                <p>
                                    The man who goes alone can start today; but he who 
                                    travels with another must wait till that other is ready.
                                </p>
                                <small>F</small>
                            </div>
                          
                         
                            <h5>4 - whats the wierdest thing you have done to some one?  </h5>
                            <div class="quote">
                                <div><i class="icon_quotations_alt"></i></div>
                                <p>
                                    The man who goes alone can start today; but he who 
                                    travels with another must wait till that other is ready.
                                </p>
                                <small>M</small>
                                -->  
                            </div>
                         


                        </div>

                        <div class="post-single-footer">
                            <div class="tags">
                                <ul class="list-inline">
                                    <li>
                                        <a href="blog-grid.html">Travel</a>
                                    </li>
                                    <li>
                                        <a href="blog-grid.html">Nature</a>
                                    </li>
                                    <li>
                                        <a href="blog-grid.html">tips</a>
                                    </li>
                                    <li>
                                        <a href="blog-grid.html">forest</a>
                                    </li>
                                    <li>
                                        <a href="blog-grid.html">beach</a>
                                    </li>
                                
                                </ul>
                            </div>
                            <div class="social-media">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="color-pinterest">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>                           
                        </div>
                   

                  
<?php 

    $sel = "SELECT * FROM comments WHERE Episode_id='$episode_id' AND Live='1'";
    $run=mysqli_query($conn,$sel);
    $num_rows=mysqli_num_rows($run);

    echo " <div class='widget mb-50'>
    <div class='title'>
        <h5> $num_rows Comments</h5>
    </div>
";

While($fetch=mysqli_fetch_assoc($run))
{

$name= $fetch['Name'];
$email=$fetch['Email'];
$sex=$fetch['Sex'];
$comment=$fetch['Comment'];
$date=$fetch['_Date'];
$live=$fetch['Live'];
if($live==1){
    
    if($sex=="M"){
        echo "
        <ul class='widget-comments'>
        <li class='comment-item'>
        
        <img src='https://img.icons8.com/office/100/000000/user-group-man-man.png'
         class='align-self-start mr-3 ' >
            <div class='content'>
                <ul class='info list-inline'>
                    <li>$name</li>
                    <li class='dot'></li>
                    <li> $date </li>
                </ul>
                <p>$comment
                </p>
                <div><a href='#' class='link'> <i class='arrow_back'></i> Reply</a></div>
            </div>
        </li>
    </ul>";




    }
    elseif($sex=="F"){

        echo "
        <ul class='widget-comments'>
        <li class='comment-item'>
        
        <img src='https://img.icons8.com/office/100/000000/user-group-woman-woman.png'
         class='align-self-start mr-3 ' >
            <div class='content'>
                <ul class='info list-inline'>
                    <li>$name</li>
                    <li class='dot'></li>
                    <li> $date </li>
                </ul>
                <p>$comment
                </p>
                <div><a href='#' class='link'> <i class='arrow_back'></i> Reply</a></div>
            </div>
        </li>
    </ul>
    ";






    }
    


}




}


?>
 </div>  
                    <!--widget-comments -->
                    <div class="widget mb-50">
                       <!-- <div class="title">
                            <h5>3 Comments</h5>
                        </div>
                        <ul class="widget-comments">
                            <li class="comment-item">
                                <img src="assets/img/user/1.jpg" alt="">
                                <div class="content">
                                    <ul class="info list-inline">
                                        <li>Mohammed Ali</li>
                                        <li class="dot"></li>
                                        <li> January 15, 2021</li>
                                    </ul>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                        quod non fugiat aliquid sit similique!
                                    </p>
                                    <div><a href="#" class="link"> <i class="arrow_back"></i> Reply</a></div>
                                </div>
                            </li>
                            <li class="comment-item">
                                <img src="assets/img/author/1.jpg" alt="">
                                <div class="content">
                                    <ul class="info list-inline">
                                        <li>Simon Albert</li>
                                        <li class="dot"></li>
                                        <li> January 15, 2021</li>
                                    </ul>
                                                      
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat quod non
                                        fugiat aliquid sit similique!
                                    </p>
                                    <div>
                                        <a href="#" class="link">
                                            <i class="arrow_back"></i> Reply</a>
                                    </div>
                                </div>
                            </li>
                            <li class="comment-item">
                                <img src="assets/img/user/2.jpg" alt="">
                                <div class="content">
                               
                                    <ul class="info list-inline">
                                        <li>Adam bobly</li>
                                        <li class="dot"></li>
                                        <li> January 15, 2021</li>
                                    </ul>
                    
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                        quod non fugiat aliquid sit similique!
                                    </p>

                                    <div>
                                        <a href="#" class="link">
                                            <i class="arrow_back"></i> Reply</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
-->
                       <!--Leave-comments-->
<?php  if((isset ($_SESSION['user'])) or (isset ($_SESSION['admin'])))
        {
            
            if(isset ($_SESSION['user']))

            {
                $email=$_SESSION['user'];
                $display='block';
            
                $name=$_SESSION['name'];
                $sex= $_SESSION['sex'];

            }
            else if(isset ($_SESSION['admin']))
            {
                $email=$_SESSION['admin'];
                $display='block';
            
                $name="admin";
                $sex= "admin";

            }
          






        }
        else{


            $display='none';


            $Register=" <div class='title'     >
            <h5>Sign up to  Reply</h5>
        </div>
        <form action='processor.php' method='POST' onsubmit='return validateForm()'  > 
        <div class='row'>
        <input type='text' name='episode_id' value='$episode_id' id='name'
        class='form-control' placeholder='Name*'  style ='display:none' required='required'>
        
        <div class='col-md-6'>
            <div class='form-group'>
                <input type='text' name='name' id='name'
                 class='form-control' placeholder='Name*' required='required'>
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <input type='email' name='email' id='email'
                 class='form-control' placeholder='Email*' required='required'>
            </div>
        </div>
        <div class='col-md-6'>
        <div class='form-group'>
            <input type='password' name='password' maxlength='12' minlength='5' id='password_1'
             class='form-control' placeholder='Password*' required='required'>
        </div>
        </div>
        <div class='col-md-6'>
        <div class='form-group'>
        <input type='password' name='password' maxlength='12' minlength='5'  id='password_2'
         class='form-control' placeholder='Re_enter Password*' required='required'>
    </div>
    </div>
      
        <div class='col-12 mb-20'>
            <div class='form-group'>
            <label class='h6'> Sex </label>
    <select class='form-select  col-md-12  form-control ' name='sex' placeholder='Sex'
     aria-label='Default select example'>
<option  class='form-control ' value='M'>Male</option>
<option  class='form-control ' value='F'>Female</option>

</select>
            </div> 
          <!--  <label>
                <input name='name' type='checkbox' value='1' required='required'> 
               <span>save my name , email and website in this browser for the next time I comment.</span>                                   
            </label> -->
        </div>
        <div class='col-12'>
            <button type='submit' name='signup' class='btn-custom'>
                Sign up
            </button>
        </div> 
        
        </form> 
        </div> 
        <script>  function validateForm(){

            var pwd1=document.getElementById('password_1').value;
            var pwd2=document.getElementById('password_2').value;
            if(pwd1==pwd2){
            
            
               return true;
            }
            else
            {
            
                alert('inconsistent password');
                   return false;
            
            
            }
            
            }   
            
            
            </script> 
       ";


        echo $Register;

        }

?>

                        <div class="title"   style='display: <?php echo $display;?>'   >
                            <h5>Leave a Reply</h5>
                        </div>
                        <form class="widget-form" action="processor.php" method="POST" style='display: <?php echo $display;?>'  >
                            
                            <div class="alert alert-success contact_msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*" required="required"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"  style='display:none'>
                                        <input type="text" name="name" id="name"
                                        value="<?php echo $name ;?>
                                        " class="form-control" placeholder="Name*" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="name" name="email" id="email"
                                         class="form-control" style='display:none' value="<?php echo $email ;?> " placeholder="Email*" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6" style='display:none'>
                                    <div class="form-group">
                                        <input type="text"
                                         name="episode_id" value="<?php echo $episode_id ; ?>" id="email"
                                         class="form-control" placeholder="Email*" required="required">
                                    </div>
                                </div>
                                <div class="col-12 mb-20"  style='display:none'>
                                    <div class="form-group">
                                    <label class="h2"> Sex </label>
                            <select class="form-select  col-md-12  form-control "value="<?php echo $sex ;?> " name="sex" placeholder="Sex"
                             aria-label="Default select example">
  <option  class="form-control " value="M">Male</option>
  <option  class="form-control " value="F">Female</option>
  
</select>
                                    </div> 
                                  <!--  <label>
                                        <input name="name" type="checkbox" value="1" required="required"> 
                                       <span>save my name , email and website in this browser for the next time I comment.</span>                                   
                                    </label> -->
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="reply" class="btn-custom">
                                        Post Comment
                                    </button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 max-width">
                    <!--widget-author-->
                    <div class="widget">
                        <div class="widget-author">
                            <a href="" class="image">
                                <img src="assets/img/author/1.jpg" alt="">
                            </a>
                            <h6>
                                <span>Hi, I'm sunday confessions</span>
                            </h6>
                            <p>

                                REAL CONFESSIONS FROM EVERYDAY PEOPLE
                        </p>
                    
                    
                            <div class="social-media">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="instagram.com/sundaycnfssns" class="color-instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="twitter.com/sundaycnfssns" class="color-twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://youtube.com/channel/UC1BG18z9hBrktfq3qpBdQfQ" class="color-youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
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
                   
                    <!--widget-categories-->
                    <div class="widget">
                        <div class="section-title">
                            <h5>Categories</h5>
                        </div>
                        <ul class="widget-categories">
                            <li>
                                <a href="#" class="categorie">episode one</a>
                                <span class="ml-auto">22 Posts</span>
                            </li>
                            <li>
                                <a href="#" class="categorie">episode two</a>
                                <span class="ml-auto">18 Posts</span>
                            </li>
                            <li>
                                <a href="#" class="categorie">episode three</a>
                                <span class="ml-auto">14 Posts</span>
                            </li>
                            <li>
                                <a href="#" class="categorie">episode four</a>
                                <span class="ml-auto">10 Posts</span>
                            </li>
                        </ul>
                    </div><!--/-->
                    
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
                            
                    </div><!--/-->

                    <!--widget-tags-->
                    <div class="widget">
                        <div class="section-title">
                            <h5>Tags</h5>
                        </div>
                        <div class="widget-tags">
                            <ul class="list-inline">
                                <li>
                                    <a href="blog-grid.html">Travel</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">Nature</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">tips</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">forest</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">beach</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">fashion</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">livestyle</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">healty</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">food</a>
                                </li>
                                <li>
                                    <a href="blog-grid.html">breakfast</a>
                                </li>
                        
                            </ul>
                        </div>
                    </div>
                    <!--/-->
                </div> 
            </div>
        </div>
    </section><!--/-->

    
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
                            <a href="">
                                <i class="fab fa-twitter"></i>Twitter </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fab fa-instagram"></i>Instagram </a>
                        </li>
                        <li>
                            <a href="">
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
                        <p>© Copyright 2021  <a href="instagram.com/sundaycnfssns">sunday confessions</a>, All rights reserved.</p>
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