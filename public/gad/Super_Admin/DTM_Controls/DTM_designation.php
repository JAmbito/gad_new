<?php 

include '../connect.php';

session_start();


if(isset($_POST['sub-insert'])){

    $designation=$_POST['designation'];
    $management_type=$_POST['management_type'];
    $phdate = date("Y-m-d H:i:s");

    $chkquery = "SELECT * FROM `dtm_designation` WHERE `designation` = '$designation' AND `management_type` = '$management_type'";
    $chkresult = mysqli_query($con, $chkquery);

    
    if(!$row = $chkresult->fetch_assoc()) {

        $sql = "INSERT INTO `dtm_designation`(`designation`, `management_type`) VALUES ('$designation', '$management_type')";
        $_SESSION['status_insert'] = "Action Performed Successfully";
        $result = mysqli_query($con, $sql);  

        $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $user_name=$row1['username']; 
        $phdate = date("Y-m-d H:i:s");  

        $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Adding of Position','$phdate')";
        $result2 = mysqli_query($con, $sql2);            

        if($result){
            $_SESSION['status'] = "Action Performed Successfully";
            header("location:../DTM_Designation.php");
        } 
    }

    else{
        $_SESSION['status_duplicate'] = "Action Performed Successfully";
        header("location:../DTM_Designation.php");
    }
}




if(isset($_POST["user_update_id"]))
{
    $output = '';
    $sql = "SELECT * FROM `dtm_designation` WHERE `ID` = '".$_POST["user_update_id"]."'";

    $result = mysqli_query($con, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $user_id=$row['ID'];
          $designation=$row['designation'];
          $management_type=$row['management_type'];

         $output .= ''
         ?>        


                 <script type="text/javascript">

                    $(document).ready( function () {
                        $(function () {
                          $("select").select2();
                        });
                    });

                 </script>

                 <input type="text" name="up_id" class="form-control" value="<?php echo $user_id ?>" hidden="">

                 <div>
                    <label>Designation / Position</label><span class="additional-span">( REQUIRED )</span>
                 </div>
                 <div>
                    <input type="text" value="<?php echo $designation ?>" name="designation" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                 </div>

                 <div>
                    <div style="margin-bottom: 13px">
                        <label>Management Type</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <div>
                        <select name="management_type" style="margin-bottom: 23px;" required>

                            <option style="display: none;" value="<?php echo $management_type ?>"><?php echo $management_type ?></option>  

                            <?php 

                            $sql="SELECT * FROM `dtm_management_type`";
                            $result=mysqli_query($con,$sql);

                            while($row=mysqli_fetch_array($result)){
                                echo '<option value="'.$row["management_type"].'">'.$row["management_type"].'</option>';  
                            }

                            ?>   

                        </select>
                    </div>
                </div>
                     
                        
             <?php ;
    }
    $output .= "</form>";

}


if(isset($_POST["sub-update"]))
 {
     $id = $_POST['up_id'];
     $designation=$_POST['designation'];
     $management_type=$_POST['management_type'];

       $sql = "UPDATE `dtm_designation`

               SET `designation`='$designation', `management_type`='$management_type'

               WHERE `ID` = '$id'";

       $result = mysqli_query($con, $sql);
       if($result){

            $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
            $result1=mysqli_query($con,$sql1);
            $row1=mysqli_fetch_assoc($result1);
            $user_name=$row1['username']; 
            $phdate = date("Y-m-d H:i:s");  

            $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Editing of Position','$phdate')";
        $result2 = mysqli_query($con, $sql2);  

            $_SESSION['status_update'] = "Action Performed Successfully";
            header("location:../DTM_Designation.php");
        }
      else{
            die(mysqli_error($con));
        }
}


if(isset($_POST["user_del_id"]))
{
    $output = '';
    $sql = "SELECT * FROM `dtm_designation` WHERE `ID` = '".$_POST["user_del_id"]."'";
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

   $sql = "DELETE FROM `dtm_designation` WHERE `ID` = '$id'";
   $result = mysqli_query($con, $sql);
   if($result){

        $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $user_name=$row1['username']; 
        $phdate = date("Y-m-d H:i:s");  

        $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Deleting of Position','$phdate')";
        $result2 = mysqli_query($con, $sql2);  

        $_SESSION['status_delete'] = "Action Performed Successfully";
        header("location:../DTM_Designation.php");
    }
  else{
        die(mysqli_error($con));
    }
}




?>