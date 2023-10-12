
<?php 

include('conn.php');



if(isset($_POST['delete']))
{




    if(isset($_POST['delete']))

    {
    

if (isset($_POST['episode_id']))


{

    $picture=$_POST['picture'];
    $episode_id=$_POST['episode_id'];
  
    
    $del=" DELETE FROM episodes WHERE Episode_id='$episode_id'";
    $run=mysqli_query($conn,$del);
    $file_to_delete = "uploads/$picture";
    unlink($file_to_delete);
    
    $del="DELETE FROM comments WHERE Episode_id='$episode_id'";
    $run=mysqli_query($conn,$del);
    

     header("location:index.php");



}
else if(isset($_POST['question_id']))

{


 
    $question_id=$_POST['question_id'];
  
    $del=" DELETE FROM question WHERE Question_id='$question_id'";
    $run=mysqli_query($conn,$del);
    
    
    $del="DELETE FROM confess WHERE Question_id='$question_id'";
    $run=mysqli_query($conn,$del);
    

     header("location:index.php");

}
    
    }



}
else{

    header("location:index.php");



}

/*
// Declare two dates
$start_date = strtotime("2018-06-08");
$end_date = strtotime("2018-09-19");

// Get the difference and divide into
// total no. seconds 60/60/24 to get
// number of days
echo "Difference between two dates: "
	. ($end_date - $start_date)/60/60/24;

*/

?>