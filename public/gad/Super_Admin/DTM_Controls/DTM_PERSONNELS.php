<?php 

include '../connect.php';

session_start();



if(isset($_POST["user_del_id"]))
{
    $output = '';
    $sql = "SELECT * FROM `main_i_personal_info` WHERE `date_created` = '".$_POST["user_del_id"]."'";
    $result = mysqli_query($con, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
         $date_created=$row['date_created'];

         $output .= '
              <input type="text" name="del_id" class="form-control" value="'.$date_created.'" hidden>
              <div class="text-center">
                </div>
              ';
    }
    $output .= "</form>";
    echo $output;
}


if(isset($_POST["sub_delete"]))
 {
   $id = $_POST['del_id'];

   $sql = "DELETE FROM `main_i_personal_info` WHERE `date_created` = '$id'";
   $result = mysqli_query($con, $sql);
   if($result){

        $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $user_name=$row1['username']; 
        $phdate = date("Y-m-d H:i:s");  

        $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Deleting of Personnels','$phdate')";
        $result2 = mysqli_query($con, $sql2);         

        $_SESSION['status_delete'] = "Action Performed Successfully";
        header("location:../DTM_Personnels_APPROVAL.php");
    }
  else{
        die(mysqli_error($con));
    }
}




?>