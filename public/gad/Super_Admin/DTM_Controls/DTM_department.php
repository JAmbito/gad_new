<?php 

include '../connect.php';

session_start();
date_default_timezone_set('Asia/Manila');


if(isset($_POST['sub-insert'])){

    $department=$_POST['department'];
    $phdate = date("Y-m-d H:i:s");

    $chkquery = "SELECT * FROM `dtm_department` WHERE `department` = '$department'";
    $chkresult = mysqli_query($con, $chkquery);

    
    if(!$row = $chkresult->fetch_assoc()) {

        $sql = "INSERT INTO `dtm_department`(`department`) VALUES ('$department')";
        $_SESSION['status_insert'] = "Action Performed Successfully";
        $result = mysqli_query($con, $sql);  

        $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $user_name=$row1['username']; 
        $phdate = date("Y-m-d H:i:s");  

        $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Adding of Department','$phdate')";
        $result2 = mysqli_query($con, $sql2);   

        if($result){
            $_SESSION['status'] = "Action Performed Successfully";
            header("location:../DTM_Department.php");
        } 
    }

    else{
        $_SESSION['status_duplicate'] = "Action Performed Successfully";
        header("location:../DTM_Department.php");
    }
}




if(isset($_POST["user_update_id"]))
{
    $output = '';
    $sql = "SELECT * FROM `dtm_department` WHERE `ID` = '".$_POST["user_update_id"]."'";

    $result = mysqli_query($con, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $user_id=$row['ID'];
          $department=$row['department'];

         $output .= ''
         ?>         

                 <input type="text" name="up_id" class="form-control" value="<?php echo $user_id ?>" hidden="">

                 <div>
                    <label>Department</label><span class="additional-span">( REQUIRED )</span>
                 </div>
                 <div>
                    <input type="text" value="<?php echo $department ?>" name="department" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                 </div>
                     
                        
             <?php ;
    }
    $output .= "</form>";

}


if(isset($_POST["sub-update"]))
 {
     $id = $_POST['up_id'];
     $department=$_POST['department'];

       $sql = "UPDATE `dtm_department`

               SET `department`='$department'

               WHERE `ID` = '$id'";

       $result = mysqli_query($con, $sql);
       if($result){

            $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
            $result1=mysqli_query($con,$sql1);
            $row1=mysqli_fetch_assoc($result1);
            $user_name=$row1['username']; 
            $phdate = date("Y-m-d H:i:s");  

            $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Editing of Department','$phdate')";
            $result2 = mysqli_query($con, $sql2);   

            $_SESSION['status_update'] = "Action Performed Successfully";
            header("location:../DTM_Department.php");
        }
      else{
            die(mysqli_error($con));
        }
}


if(isset($_POST["user_del_id"]))
{
    $output = '';
    $sql = "SELECT * FROM `dtm_department` WHERE `ID` = '".$_POST["user_del_id"]."'";
    $result = mysqli_query($con, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
         $user_id=$row['ID'];

         $output .= '
              <input type="text" name="del_id" class="form-control" value="'.$user_id.'" hidden>
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

   $sql = "DELETE FROM `dtm_department` WHERE `ID` = '$id'";
   $result = mysqli_query($con, $sql);
   if($result){

        $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $user_name=$row1['username']; 
        $phdate = date("Y-m-d H:i:s");  

        $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Deleting of Department','$phdate')";
        $result2 = mysqli_query($con, $sql2);   

        $_SESSION['status_delete'] = "Action Performed Successfully";
        header("location:../DTM_Department.php");
    }
  else{
        die(mysqli_error($con));
    }
}




?>