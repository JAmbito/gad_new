<?php 

include '../connect.php';

session_start();


if(isset($_POST['sub-insert'])){

    $name=$_POST['name'];
    $campus_name=$_POST['campus_name'];
    $user_type=$_POST['user_type'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $hashed_password = md5($password);

    $phdate = date("Y-m-d H:i:s");

    $chkquery = "SELECT * FROM `dtm_users` WHERE `name` = '$name' AND `campus_name` = '$campus_name' AND `user_type` = '$user_type' AND `username` = '$username' ";
    $chkresult = mysqli_query($con, $chkquery);

    
    if(!$row = $chkresult->fetch_assoc()) {

        $sql = "INSERT INTO `dtm_users`(`name`, `campus_name`, `user_type`, `username`, `password`) VALUES ('$name', '$campus_name', '$user_type', '$username', '$hashed_password')";
        $_SESSION['status_insert'] = "Action Performed Successfully";
        $result = mysqli_query($con, $sql);     

        $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $user_name=$row1['username']; 
        $phdate = date("Y-m-d H:i:s");  

        $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Adding of Users','$phdate')";
        $result2 = mysqli_query($con, $sql2);         

        if($result){
            $_SESSION['status'] = "Action Performed Successfully";
            header("location:../MAIN_View_Users.php");
        } 
    }

    else{
        $_SESSION['status_duplicate'] = "Action Performed Successfully";
        header("location:../MAIN_View_Users.php");
    }
}




if(isset($_POST["user_update_id"]))
{
    $output = '';
    $sql = "SELECT * FROM `dtm_users` WHERE `ID` = '".$_POST["user_update_id"]."'";

    $result = mysqli_query($con, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $user_id=$row['ID'];
          $name=$row['name'];
          $campus_name=$row['campus_name'];
          $user_type=$row['user_type'];
          $username=$row['username'];

         $output .= ''
         ?>         

                <!-- GENERATE USER/PASS -->

                <script>

                    $(document).ready(function() {

                      $(".generate_user_class").on("click", function() {

                        var randomstring = Math.random().toString(36).slice(-8);

                        $('.inp_user_class').val('wh_' + randomstring);
                        
                      });

                    });
                    
                </script>

                <script type="text/javascript">

                    $(document).ready( function () {
                        $(function () {
                          $("select").select2();
                        });
                    });

                 </script>

                 <input type="text" name="up_id" class="form-control" value="<?php echo $user_id ?>" hidden="">

                 <div>
                    <label>name</label><span class="additional-span">( REQUIRED )</span>
                 </div>
                 <div>
                    <input type="text" value="<?php echo $name ?>" name="name" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                 </div>

                 <div>
                    <div style="margin-bottom: 13px">
                        <label>Campus</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <div>
                        <select name="campus_name" style="margin-bottom: 23px;" required>

                            <option style="display: none;" value="<?php echo $campus_name ?>"><?php echo $campus_name ?></option>  

                            <?php 

                            $sql="SELECT * FROM `dtm_campus`";
                            $result=mysqli_query($con,$sql);

                            while($row=mysqli_fetch_array($result)){
                                echo '<option value="'.$row["campus_name"].'">'.$row["campus_name"].'</option>';  
                            }

                            ?>   

                        </select>
                    </div>
                 </div>

                 <div>
                    <div style="margin-bottom: 13px">
                        <label>User Type</label><span class="additional-span">( REQUIRED )</span>
                    </div>
                    <div>
                        <select name="user_type" style="margin-bottom: 23px;" required>

                            <option style="display: none;" value="<?php echo $user_type ?>"><?php echo $user_type ?></option>  
                            <option style="display: none;" value="ENCODER">ENCODER</option>          
                            <option style="display: none;" value="APPROVER">APPROVER</option>
                            <option style="display: none;" value="GAD-ADMINISTRATOR">GAD-ADMINISTRATOR</option>
                            <option style="display: none;" value="OFFICE OF ADMINISTRATIVE SERVICES">OFFICE OF ADMINISTRATIVE SERVICES</option>
                            <option style="display: none;" value="SUPER ADMIN">SUPER ADMIN</option>                                                      
                        </select>
                    </div>
                 </div>

                 <div>
                    <label>Username</label><span class="additional-span">( REQUIRED )</span>
                 </div>
                 <div style="display: flex; align-items: center;">
                    <input type="text" name="username" value="<?php echo $username ?>" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;" class="inp_user_class">
                    <span style="background-color: #B0BCCB; color: #fff; border-radius: 4px; padding: 12px 13.5px; font-size: 13px; margin-bottom: 10px; margin-left: 12px; cursor: pointer;" class="generate_user_class">GENERATE</span>
                 </div>
                     
                        
             <?php ;
    }
    $output .= "</form>";

}


if(isset($_POST["sub-update"]))
 {
     $id = $_POST['up_id'];
     $name=$_POST['name'];
     $campus_name=$_POST['campus_name'];
     $user_type=$_POST['user_type'];
     $username=$_POST['username'];

       $sql = "UPDATE `dtm_users`

               SET `name`='$name',`campus_name`='$campus_name',`user_type`='$user_type',`username`='$username'

               WHERE `ID` = '$id'";

       $result = mysqli_query($con, $sql);
       if($result){

            $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
            $result1=mysqli_query($con,$sql1);
            $row1=mysqli_fetch_assoc($result1);
            $user_name=$row1['username']; 
            $phdate = date("Y-m-d H:i:s");  

        $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Editing of Users','$phdate')";
        $result2 = mysqli_query($con, $sql2);         

            $_SESSION['status_update'] = "Action Performed Successfully";
            header("location:../MAIN_View_Users.php");
        }
      else{
            die(mysqli_error($con));
        }
}


if(isset($_POST["user_del_id"]))
{
    $output = '';
    $sql = "SELECT * FROM `dtm_users` WHERE `ID` = '".$_POST["user_del_id"]."'";
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

   $sql = "DELETE FROM `dtm_users` WHERE `ID` = '$id'";
   $result = mysqli_query($con, $sql);
   if($result){

        $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $user_name=$row1['username']; 
        $phdate = date("Y-m-d H:i:s");  

        $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Deleting of Users','$phdate')";
        $result2 = mysqli_query($con, $sql2);         

        $_SESSION['status_delete'] = "Action Performed Successfully";
        header("location:../MAIN_View_Users.php");
    }
  else{
        die(mysqli_error($con));
    }
}




?>