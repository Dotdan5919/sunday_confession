<?php



include('conn.php');







if (isset($_POST['new_episode'])){
  


    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "<h1>not an image </h1><script> alert(' not an Image')  </script>";
        $uploadOk = 0;
        header("location:index.php?upload=FIle not and image");
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo " <h1>already exist</h1> <script> alert('already exist')  </script>";
      $uploadOk = 0;
      header("location:index.php?upload=Picture Already exist");
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 900000) {
      echo "<h1>too Large</h1><script> alert('too Large')  </script>";
      $uploadOk = 0;
      header("location:index.php?upload=File too Large");
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "<h1>wrong format</h1> <script> alert('wrong format')  </script>";
      $uploadOk = 0;
      header("location:index.php?upload=Wrong format");
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "<h1> Sorry,File was not uploaded</h1> <script>
       alert('Sorry, your file was not uploaded.')  </script>";
     //  header("location:index.php?upload=file was not uploaded.");
    // if everything is ok, try to upload file
    } else {


      $query="SELECT * FROM episodes  " ;
      $run=mysqli_query($conn,$query);
      $fetch=mysqli_fetch_assoc($run);
     $num=mysqli_num_rows($run);
      $episode=$fetch['Episode'];

      if (empty($fetch))
      {
        $episode=1;


      }
      else{

        $episode=$num+1;
      }

      

      
     // $date=  date("m.d.y");
      $content=$_POST['content'];
            $episode_id=uniqid();
            $title= $_POST['title'];
      $filename= basename($_FILES["fileToUpload"]["name"]);
      $date=Date("d-M-Y");
      $insert="INSERT INTO episodes(Episode,Title,Content,_Date,Picture,Episode_id) 
      VALUES ('$episode','$title','$content','$date','$filename','$episode_id')";
      
      if($run=mysqli_query($conn,$insert)){

        header("location:index.php?upload=Episode uploaded");


        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        

        } else {
          echo "<h1> error</h1> <script> alert(Error )  </script>";
      
          header("location:index.php?upload=Error");
        }
  


      }

  else{


    header("location:index.php?upload=Error with content");


  }        
      
    

  }
    
    
    
  
  
  }


else if(isset($_POST['new_question'])){





$week= date("W");

$sel="SELECT * FROM question WHERE Week='$week'";
$run=mysqli_query($conn,$sel);
$num_rows=mysqli_num_rows($run);

if($num_rows>0){
  echo "Already posted";
 header("location:index.php?question=Already posted this week");

}
else{

$date=Date("d-M-Y");
$weekly_question= $_POST['weekly_question'];

$ins= "INSERT INTO question (Question_id,Week,Question, _Date) VALUES
 (NULL,'$week','$weekly_question','$date')";
$run= mysqli_query($conn,$ins);
echo "yes";
header("location:index.php?question=yes");


}










}

else if(isset($_POST['share_comment'])){

  $comment_id=$_POST['share_comment'];
  $sel="UPDATE comments SET Live='1' WHERE Comment_id='$comment_id' ";
  $run=mysqli_query($conn,$sel);
  $sel2="SELECT * FROM comments WHERE Comment_id='$comment_id' ";
  $run2=mysqli_query($conn,$sel2);
  $fetch=mysqli_fetch_assoc($run2);
  $episode_id=$fetch['Episode_id'];
  
  
  //echo"hi 1";
  header("location:basic-table.php?episode_id=$episode_id");


}
else if(isset($_POST['remove_comment'])){

  $comment_id=$_POST['remove_comment'];
  $sel="UPDATE comments SET Live='0' WHERE Comment_id='$comment_id' ";
  $run=mysqli_query($conn,$sel);
  $sel2="SELECT * FROM comments WHERE Comment_id='$comment_id' ";
  $run2=mysqli_query($conn,$sel2);
  $fetch=mysqli_fetch_assoc($run2);
  $episode_id=$fetch['Episode_id'];
  
  
  //echo"hi 1";
  header("location:basic-table.php?episode_id=$episode_id");





}
else if(isset($_POST['share_confession'])){

$confess_id=$_POST['share_confession'];

$sel="UPDATE confess SET Live='1' WHERE Confess_id='$confess_id' ";
$run=mysqli_query($conn,$sel);
$sel2="SELECT * FROM confess WHERE Confess_id='$confess_id' ";
$run2=mysqli_query($conn,$sel2);
$fetch=mysqli_fetch_assoc($run2);
$question_id=$fetch['Question_id'];


//echo"hi 1";
header("location:basic-table.php?question_id=$question_id");

  
}
else if(isset($_POST['remove_confession'])){

  $confess_id=$_POST['remove_confession']; 
  
  $sel="UPDATE confess SET Live='0' WHERE Confess_id='$confess_id' ";
  $run=mysqli_query($conn,$sel);
  
  $sel2="SELECT * FROM confess WHERE Confess_id='$confess_id' ";
  $run2=mysqli_query($conn,$sel2);
  $fetch=mysqli_fetch_assoc($run2);
  $question_id=$fetch['Question_id'];
  
  
  //echo"hi 1";
  header("location:basic-table.php?question_id=$question_id");
    
  }

  else{

//header("location:index.php");



}


  















































?>