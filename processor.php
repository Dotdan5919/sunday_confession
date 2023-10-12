<?php






include('admin/conn.php');

if(isset($_POST['register']))
{


    $name=$_POST['name'] ;
    $password=$_POST['password'] ;
    $email=$_POST['email'] ;
    $sex=$_POST['sex'] ;
    
    
    $sel="SELECT * FROM user WHERE Email ='$email'";
    $run=mysqli_query($conn,$sel);
    $num_rows=mysqli_num_rows($run);
    if($num_rows>0)
    {
      
        header("location:login.php?talker=Already registered");
    
    }
    else{
    $ins="INSERT INTO user(Name,Password,Email,Sex) VALUES 
    ('$name','$password','$email','$sex')";
    
    $run=mysqli_query($conn,$ins);
    
    session_start();
    $_SESSION['user']=$email;
    $_SESSION['name']=$name;
    $_SESSION['sex']=$sex;
    header("location:index.php");
    
    
    }


}
             ;
             
if (isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];


$sel="SELECT * FROM user WHERE  email='$email'  AND password='$password' ";
$run=mysqli_query($conn,$sel);

$fetch=mysqli_fetch_array($run);
$name=$fetch['Name'];
$sex=$fetch['Sex'];
$num_rows=mysqli_num_rows($run);
if($num_rows>0)
{
    $fetch=mysqli_fetch_array($run);
    $sex=$fetch['sex'];

    session_start();
    $_SESSION['user']=$email;

    $_SESSION['name']=$name;
    $_SESSION['sex']=$sex;
    header("location:index.php");
    

}
else{

    header("location:login.php?talker=incorrect details");


}



    

}


else if(isset($_POST['confess']))
{

$name=$_POST['name'];
$question=$_POST['question'];
$question_id=$_POST['question_id'];
$sex=$_POST['sex'];
$confession=$_POST['confession'];
 $date=Date("d-M-Y");
$week=date("W");
$confess_id= uniqid();
$insert="INSERT INTO confess (Confess_id,Question_id,_Name,Sex,Question,Confession,_Date,Week,Live) VALUES
             ('$confess_id','$question_id','$name','$sex','$question','$confession','$date','$week','0')"
             
         
             ;
             
$run=mysqli_query($conn,$insert);

if(!empty($run))
{
    echo "$name 
    $question 
    $question_id 
    $sex 
    $confession 
     $date 
    $week ";
header("location:contact.php?confess=true");
}
else{

    header("location:contact.php?confess=false");

    echo "$name 
    $question 
    $question_id 
    $sex 
    $confession 
     $date 
    $week    2 ";

}




}


else if(isset($_POST['reply']))
{


$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$sex=$_POST['sex'];
$comment_id=uniqid();
$date=Date("d-M-Y");
$episode_id=$_POST['episode_id'];
$ins="INSERT INTO comments (Comment_id,Episode_id, Email,Name, Sex,Comment,Live,_Date) 
                VALUES ('$comment_id','$episode_id','$email','$name','$sex','$message','1','$date')";
$run=mysqli_query($conn,$ins);


header("location:post-default.php?episode_id=$episode_id");

}


else if(isset($_POST['signup'])){



$name=$_POST['name'] ;
$password=$_POST['password'] ;
$email=$_POST['email'] ;
$sex=$_POST['sex'] ;
$episode_id=$_POST['episode_id'];


$sel="SELECT * FROM user WHERE Email ='$email'";
$run=mysqli_query($conn,$sel);
$num_rows=mysqli_num_rows($run);
if($num_rows>0)
{
  
    header("location:login.php?talker=Already registered");

}
else{
$ins="INSERT INTO user(Name,Password,Email,Sex) VALUES 
('$name','$password','$email','$sex')";

$run=mysqli_query($conn,$ins);

session_start();
$_SESSION['user']=$email;
$_SESSION['name']=$name;
$_SESSION['sex']=$sex;
header("location:post-default.php?episode_id=$episode_id");


}
}


else{

   //header("location:index.php");


}














?>