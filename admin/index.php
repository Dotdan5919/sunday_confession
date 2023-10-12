
<?php

session_start();
include('conn.php');

if(isset($_SESSION['admin']) )

{  


}

else{



header("location:login/index.php");

}



$sel2="SELECT * FROM  confess  ";
$run= mysqli_query($conn, $sel2);
$num_confession= mysqli_num_rows($run);



$sel2="SELECT * FROM  user  ";
$run= mysqli_query($conn, $sel2);
$num_user= mysqli_num_rows($run);


$sel2="SELECT * FROM  episodes  ";
$run= mysqli_query($conn, $sel2);
$num_episodes= mysqli_num_rows($run);

$week=date("W");
$sel2="SELECT * FROM  question  WHERE Week='$week'  ";
$run= mysqli_query($conn, $sel2);
if(empty($run))
{
$week="No question of the week";

}

else{




}










?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sunday Cofession - Admin  Dashboard </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  </head>

  <body>
    <div class="app header-default side-nav-dark">
      <div class="layout">
        <!-- Header START -->
        <div class="header navbar">
          <div class="header-container">
            <div class="nav-logo">
              <a href="index.php">
                <b><img src="assets/img/logo.png" alt=""></b>
                <span class="logo">
                  <img src="assets/img/logo-text.png" alt="">
                </span>
              </a>
            </div>
            <ul class="nav-left">
              
              <li>
                <a class="sidenav-fold-toggler" href="javascript:void(0);">
                  <i class="lni-menu"></i>
                </a>
                <a class="sidenav-expand-toggler" href="javascript:void(0);">
                  <i class="lni-menu"></i>
                </a>
              </li>




        
            </ul>
            <ul class="nav-right">
              <li class="search-box">
                <input class="form-control" type="text" placeholder="Type to search...">
                <i class="lni-search"></i>
              </li>
              <li class="massages dropdown dropdown-animated scale-left">
              	<span class="co"></span>
                
                <ul class="dropdown-menu dropdown-lg">
                  
                  <li>
                    <ul class="list-media">
                      <li class="list-item">
                        <a href="#" class="media-hover">
                         
                          <div class="info">
                            <span class="title">
                                Sunday Confession
                            </span>
                            <span class="sub-title">Lorem ipsum Dummy text of the printing and typesetting industry.</span>
                          </div>
                        </a>
                      </li>
                      <li class="list-item">
                        <a href="#" class="media-hover">
                          <div class="media-img">
                            <img src="assets/img/users/avatar-2.jpg" alt="">
                          </div>
                          <div class="info">
                            <span class="title">
                              
                            </span>
                            <span class="sub-title">It is a long established fact that a reader will</span>
                          </div>
                        </a>
                      </li>
                      <li class="list-item">
                        <a href="#" class="media-hover">
                          <div class="media-img">
                            <img src="assets/img/users/avatar-3.jpg" alt="">
                          </div>
                          <div class="info">
                            <span class="title">
                              Frank Handrics
                            </span>
                            <span class="sub-title">You have 87 unread messages</span>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="check-all text-center">
                    <span>
                      <a href="#" class="text-gray">View All</a>
                    </span>
                  </li>
                </ul>
              </li>
              <li class="notifications dropdown dropdown-animated scale-left">
                
                <ul class="dropdown-menu dropdown-lg">
                  <li>
                    <h5 class="n-title text-center">
                      <i class="lni-alarm"></i>
                      <span>Notifications</span>
                    </h5>
                  </li>
                  <li>
                    <ul class="list-media">
                      <li class="list-item">
                        <a href="#" class="media-hover">
                          <div class="media-img">
                            <div class="icon-avatar bg-primary">
                              <i class="lni-envelope"></i>
                            </div>
                          </div>
                          <div class="info">
                            <span class="title">
                              5 new messages
                            </span>
                            <span class="sub-title">4 min ago</span>
                          </div>
                        </a>
                      </li>
                      <li class="list-item">
                        <a href="#" class="media-hover">
                          <div class="media-img">
                            <div class="icon-avatar bg-success">
                              <i class="lni-comments-alt"></i>
                            </div>
                          </div>
                          <div class="info">
                            <span class="title">
                                4 new comments
                            </span>
                            <span class="sub-title">12 min ago</span>
                          </div>
                        </a>
                      </li>
                      <li class="list-item">
                        <a href="#" class="media-hover">
                          <div class="media-img">
                            <div class="icon-avatar bg-info">
                              <i class="lni-users"></i>
                            </div>
                          </div>
                          <div class="info">
                            <span class="title">
                              3 user Requests
                            </span>
                            <span class="sub-title">a day ago</span>
                          </div>
                        </a>
                      </li>
                      <li class="list-item">
                        <a href="#" class="media-hover">
                          <div class="media-img">
                            <div class="icon-avatar bg-purple">
                              <i class="lni-comments-alt"></i>
                            </div>
                          </div>
                          <div class="info">
                            <span class="title">
                              2 new messages
                            </span>
                            <span class="sub-title">12 min ago</span>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="check-all text-center">
                    <span>
                      <a href="#" class="text-gray">Check all notifications</a>
                    </span>
                  </li>
                </ul>
              </li>
              <li class="user-profile dropdown dropdown-animated scale-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img class="profile-img img-fluid" src="assets/img/avatar/avatar.jpg" alt=""> 
                </a>
                <ul class="dropdown-menu dropdown-md">
                  <li>
                    <ul class="list-media">
                      <li class="list-item avatar-info">
                        <div class="media-img">
                          <img src="assets/img/avatar/avatar.jpg" alt="">
                        </div>
                        <div class="info">
                          <span class="title text-semibold">Sunday Confession</span>
                          <span class="sub-title"></span>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="index.php">
                      <i class="lni-cog"></i>
                      <span>Dashboard</span>
                    </a>
                  </li>
                
                  <li>
                    <a href="logout.php">
                      <i class="lni-lock"></i>
                      <span>Logout</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- Header END -->



        <!-- Side Nav START -->
        <div class="side-nav expand-lg">
          <div class="side-nav-inner">
            <ul class="side-nav-menu">
              <li class="side-nav-header">
                <span>Navigation</span>
              </li>
              <li class="nav-item dropdown open">
                <a href="#" class="dropdown-toggle">
                  <span class="icon-holder">
                    <i class="lni-dashboard"></i>
                  </span>
                  <span class="title">Dashboard</span>
                  <span class="arrow">
                    <i class="lni-chevron-right"></i>
                  </span>
                </a>
                <ul class="dropdown-menu sub-down">
                  <li class="active">
                    <a href="index.php">Dashboard </a>
                  </li>
                 
                </ul>
              </li>
              <!--
              <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-holder">
                      <i class="lni-cloud"></i>
                    </span>
                    <span class="title">Verify</span>
                    <span class="arrow">
                      <i class="lni-chevron-right"></i>
                    </span>
                  </a>
                <ul class="dropdown-menu sub-down">
                  <li>
                    <a href="email.html">User</a>
                  </li>
                  <li>
                    <a href="email.html">Admin</a>
                  </li>
                 
                
                  
                </ul>
              </li>
-->


              
              
              
           <!--   <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                  <span class="icon-holder">
                    <i class="lni-files"></i>
                  </span>
                  <span class="title">Forms</span>
                  <span class="arrow">
                    <i class="lni-chevron-right"></i>
                  </span>
                </a>
                <ul class="dropdown-menu sub-down">
                  <li>
                    <a href="form-elements.html">Form Elements</a>
                  </li>
                 
                </ul>
              </li>
-->

              <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="#">
                  <span class="icon-holder">
                    <i class="lni-control-panel"></i>
                  </span>
                  <span class="title">Logout</span>
                  <span class="arrow">
                    <i class="lni-chevron-right"></i>
                  </span>
                </a>
                <ul class="dropdown-menu sub-down">
                  <li>
                    <a href="logout.php">Logout</a>
                  </li>
                  
                </ul>
              </li>
             
            </ul>
          </div>
        </div>
        <!-- Side Nav END -->

        <!-- Page Container START -->
        <div class="page-container">
          <!-- Content Wrapper START -->
          <div class="main-content">
            <div class="container-fluid">
              <!-- Breadcrumb Start -->
              <div class="breadcrumb-wrapper row">
                <div class="col-12 col-lg-3 col-md-6">
                  <h4 class="page-title">Dashboard</h4>
                </div>
                <div class="col-12 col-lg-9 col-md-6">
                  <ol class="breadcrumb float-right">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">/ Dashboard</li>
                  </ol>
                </div>
              </div>
              <!-- Breadcrumb End -->
            </div>

            <div class="container-fluid">
              <!-- Title Count Start -->
              <div class="card-group">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                          <div>
                            <div class="icon"><i class="lni-display"></i></div>
                             <p class="text-muted">Number of episodes</p>
                          </div>
                          <div class="ml-auto">
                             <h2 class="counter text-primary"><?php  echo $num_episodes; ?></h2>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                          <div>
                             <div class="icon"><i class="lni-pencil-alt"></i></div>
                             <p class="text-muted">Number of users</p>
                          </div>
                          <div class="ml-auto">
                             <h2 class="counter text-success"><?php  echo $num_user; ?></h2>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                     
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                          <div>
                             <div class="icon"><i class="lni-empty-file"></i></div>
                             <p class="text-muted">Confessions</p>
                          </div>
                          <div class="ml-auto">
                             <h2 class="counter text-info"><?php  echo $num_confession; ?></h2>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                       
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="d-flex no-block align-items-center">
                          <div>
                             <div class="icon"><i class="lni-cart"></i></div>
                             <p class="text-muted">Week</p>
                          </div>
                          <div class="ml-auto">
                             <h2 class="counter text-purple"><?php  echo $week; ?></h2>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Title Count End -->
             

              
              <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Question of the week </h4>
                      <div class="card-toolbar">
                        <ul>
                          <li>
                            <a class="text-gray" href="#">
                              <i class="lni-more-alt"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    
                    <?php



$sel="SELECT * FROM question ";
$run1=mysqli_query($conn,$sel);
while($fetch=mysqli_fetch_array($run1))
{

$question=$fetch['Question'];
$week=$fetch['Week'];
$question_id=$fetch['Question_id'];

$sel2="SELECT * FROM  confess WHERE Week='$week' ";
$run= mysqli_query($conn, $sel2);
$num_confess= mysqli_num_rows($run);

  echo" <div class=' alert alert-info contact_msg' >  
    <p>Week $week</p> <h3>
   $question    <form action='delete.php' method='POST'  class='ml-auto' >
  
   <input value='$question_id' name='question_id' type='name' style='display:none' />
   
   <button type='submit' onclick='return myDelete()' name='delete' 
     class='btn btn-danger btn-xs'
    aria-label='Left Align'>
   <span class='glyphicon glyphicon-trash' 
   onclick='document.getElementById('id01').style.display='block'' aria-hidden='true'></span>
   
   </button>
   
   
   
   </form> </h3>
 
   
   
   <script>
   function myDelete() {
   var txt;
   if (confirm('Are you sure you want to delete this confession')) {
   
   return true;
   
   } else {
   return false;
   }
   
   }
   </script>
   

  
  
  <a  href='basic-table.php?question_id=$question_id' >$num_confess Confessions </a> 
  <br>
</div>
  ";



}





?>
                    
                    
                    <?php /* $date=date("W");
 echo $date." Week Number";  */ 
 
  if(isset($_GET['question']))
  {
    $reader=$_GET['question'];

    if($reader=='yes')
    {
  echo"   <div class='alert alert-success contact_msg' style='display:' role='alert'>
    Posted successfully.
    </div> ";
  }
else {
  echo"   <div class='alert alert-danger contact_msg' style='display:' role='alert'>
  $reader
  </div> ";


}



  }
  
 
 
 
 ?>

<form action="processor.php" method="POST" style="padding: 20px;" class="mb-20" >
                    <div class="form-group">
<input type="text" name="weekly_question" required class="form-control" id="" 
placeholder="question">
</div>


<input type="submit" class="btn btn-common btn-rounded " value="Submit" name="new_question">
</form>
                    <!--
                    <ul class="list-task list-group">
                      <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                          <div class="custom-control custom-checkbox material-checkbox">
                            <input type="checkbox" class="custom-control-input" id="followUp" checked="">
                            <label class="custom-control-label" for="followUp">Follow up clients</label>
                          </div><span class="badge badge-danger">Missed</span>
                        </div>
                      </li>
                      <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                          <div class="custom-control custom-checkbox material-checkbox">
                            <input type="checkbox" class="custom-control-input" id="JoinMeeting" checked="">
                            <label class="custom-control-label" for="JoinMeeting">Join business meeting</label>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                          <div class="custom-control custom-checkbox material-checkbox">
                            <input type="checkbox" class="custom-control-input" id="brainstorm" checked="">
                            <label class="custom-control-label" for="brainstorm">Discuss about new project</label>
                          </div>
                          <span class="badge badge-warning">Today</span>
                        </div>
                      </li>
                      <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                          <div class="custom-control custom-checkbox material-checkbox">
                            <input type="checkbox" class="custom-control-input" id="newFunnel">
                            <label class="custom-control-label" for="newFunnel">Design a new funnel</label>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                          <div class="custom-control custom-checkbox material-checkbox">
                            <input type="checkbox" class="custom-control-input" id="makeAnewOrder">
                            <label class="custom-control-label" for="makeAnewOrder">Make a new app</label>
                          </div>
                          <span class="badge badge-success">3 weeks</span>
                        </div>
                      </li>
                      <li class="list-group-item border-0" data-role="task">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                          <div class="custom-control custom-checkbox material-checkbox">
                            <input type="checkbox" class="custom-control-input" id="generalThings">
                            <label class="custom-control-label" for="generalThings">Send materials</label>
                          </div>
                        </div>
                      </li>
                    </ul>

-->







                  </div>
                </div>
<!--                <div class="col-lg-4 col-md-6 col-xs-12">
                  <div class="follow">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">New Clients</h4>
                        <div class="card-toolbar">
                          <ul>
                            <li>
                              <a class="text-gray" href="#">
                                <i class="lni-more-alt"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <ul class="list-media">
                        <li class="list-item">
                          <div class="client-item">
                            <div class="media-img">
                              <img src="assets/img/avatar/user1.png" alt="">
                            </div>
                            <div class="info">
                              <span class="title text-semibold">Johny Vinno</span>
                              <div class="float-item">
                                <button class="btn btn-common btn-rounded">Follow</button>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="client-item">
                            <div class="media-img">
                              <img src="assets/img/avatar/user2.png" alt="">
                            </div>
                            <div class="info">
                              <span class="title text-semibold">Robinson</span>
                              <div class="float-item">
                                <button class="btn btn-common btn-rounded">Follow</button>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="client-item">
                            <div class="media-img">
                              <img src="assets/img/avatar/user3.png" alt="">
                            </div>
                            <div class="info">
                              <span class="title text-semibold">Chris Anderson</span>
                              <div class="float-item">
                                <button class="btn btn-common btn-rounded">Follow</button>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="client-item">
                            <div class="media-img">
                              <img src="assets/img/avatar/user4.png" alt="">
                            </div>
                            <div class="info">
                              <span class="title text-semibold">Kornelia Sturb</span>
                              <div class="float-item">
                                <button class="btn btn-common btn-rounded">Follow</button>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
-->
    
    
    
                <div class="col-lg-8 col-md-6 col-xs-12">
                  <div class="coming-event">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Episode</h4>
                        <div class="card-toolbar">
                          
                          <ul>
                            <li>
                              
                              <a class="text-gray" href="#">
                                <i class="lni-more-alt"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
    
    <?php



if(isset($_GET['upload']))
{
  $content=$_GET['upload'];

  echo "<div class='card'>
  <div class='card-body text-danger'>
    $content
  </div>
</div>";



}


?>

                <ul class="event-item" style=''>
                        
                
                <?php

$query="SELECT * FROM episodes";
$run= mysqli_query($conn,$query);

while($fetch=mysqli_fetch_array($run))
{

  $episode=$fetch['Episode'];
  $date=$fetch['_Date'];
  $title=$fetch['Title'];
  $content=$fetch['Content'];
  $picture=$fetch['Picture'];
  $episode_id=$fetch['Episode_id'];

  $query2="SELECT * FROM comments WHERE Episode_id='$episode_id'";
$run2= mysqli_query($conn,$query2);
$num_comments=mysqli_num_rows($run2);

echo"







  <li>
  <div >
  
    <div class='media'>
   
      <div class='img-thumb' style=''>
        <img class='img-fluid' style='height:auto;width:100%'
         src='uploads/$picture' alt=''>
         <div class='text' style=''>
         <h5 class='text-link' > <a href='basic-table.php?episode_id=$episode_id'> Episode $episode </a></h6> 
         <h5 class='text-link'>$title</h5>
           
           <p>$content </p>
         </div>
         <small class='day'>$date</small>
       </div>

      </div>
      
      
  </div>
</li>
<li>





        
<form action='delete.php' method='POST' >
<input value='$picture' name='picture' style='display:none' type='name' />

<input value='$episode_id' name='episode_id' type='name' style='display:none' />

<button type='submit' onclick='return myFunction()' name='delete' 
  class='btn btn-default'
 aria-label='Left Align'>
<span class='glyphicon glyphicon-trash' 
onclick='document.getElementById('id01').style.display='block'' aria-hidden='true'></span>

</button>
<a type='button' class='btn btn-default btn-sm' href='basic-table.php?episode_id=$episode_id'>
<h6> </h6>
<span class='glyphicon glyphicon-comment'></span>  $num_comments Comments
</a>


</form>


<script>
function myFunction() {
var txt;
if (confirm('Are you sure you want to delete this')) {

return true;

} else {
return false;
}

}
</script>


";





}




?>
  

                          <div >
                            <hr>
                            <div class="media row">
              
<div class="col-md-12"> 
 

                            <form action="processor.php" method="POST" enctype="multipart/form-data">



<label     class="form-label" for="customFile"  >  New Episode </label>
<div class="form-input single-form" style="margin-bottom:6px;">
<input type="text" name="title" required class="form-control" id="" 
placeholder="Title">
</div>
<div class="form-input single-form" style="margin-bottom:6px;">
<textarea class="form-control" placeholder="Content" required name="content" maxlength="10000"
 id="Textarea1" rows="3">


</textarea>
</div>
<input type="file" name="fileToUpload" class="form-control" style="margin-bottom:6px;" 
id="fileToUpload customFile">
<input type="submit" class="btn btn-common btn-rounded " value="Upload Image" name="new_episode">
</form>
</div>
<!--                              <div class="img-thumb">
                                <img class="img-fluid" src="assets/img/event/img-2.jpg" alt="">
                              </div>
                              <div class="text">
                                <h5 class="text-link">Marketing Products</h5>
                                <p class="day">MAY 18, 2020</p>
                                <p>Efficiently unleash information </p>
                              </div>
-->
                            </div>
</div>
                        </li>
                      </ul>
                    </div>


                    
                  </div>
                </div>
              </div>
            </div>
          </div>
       
       
       
          <!-- Content Wrapper END -->

          <!-- Footer START -->
          <footer class="content-footer">
            <div class="footer">
              <div class="copyright">
                <span>Copyright © 2021 <b class="text-dark">weware</b>. All Right Reserved</span>
                <span class="go-right">
                  <a href="" class="text-gray">Term &amp; Conditions</a>
                  <a href="" class="text-gray">Privacy &amp; Policy</a>
                </span>
              </div>
            </div>
          </footer>
          <!-- Footer END -->

        </div>
        <!-- Page Container END -->
      </div>
    </div>

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.app.js"></script>
    <script src="assets/js/main.js"></script>

    <!--Morris Chart-->
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/js/dashborad1.js"></script>

  </body>
</html>