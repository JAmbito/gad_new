<?php 

include '../connect.php';

session_start();


if(isset($_POST['sub-insert'])){

    $campus_name=$_POST['campus_name'];
    $access=$_POST['access'];
    $detailed_address=$_POST['detailed_address'];
    $province=$_POST['province'];
    $city=$_POST['city'];
    $barangay=$_POST['barangay'];
    $zip_code=$_POST['zip_code'];
    $email=$_POST['email'];
    $tel_no=$_POST['tel_no'];
    $mobile_no=$_POST['mobile_no'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $phdate = date("Y-m-d H:i:s");

    $time = time();

    $chkquery = "SELECT * FROM `dtm_campus` WHERE `campus_name` = '$campus_name' AND `campus_access` = '$access' AND `detailed_address` = '$detailed_address' AND `province` = '$province' AND `city` = '$city' AND `barangay` = '$barangay' AND `zip_code` = '$zip_code' AND `email` = '$email' AND `tel_no` = '$tel_no' AND `mobile_no` = '$mobile_no'";
    $chkresult = mysqli_query($con, $chkquery);

    
    if(!$row = $chkresult->fetch_assoc()) {

        $sql = "INSERT INTO `dtm_campus`(`campus_image`, `campus_name`, `campus_access`, `detailed_address`, `province`, `city`, `barangay`, `zip_code`, `email`, `tel_no`, `mobile_no`) 
        VALUES
        ('$time$file_name', '$campus_name', '$access', '$detailed_address', '$province', '$city', '$barangay', '$zip_code', '$email', '$tel_no', '$mobile_no')";
     
        $_SESSION['status_insert'] = "Action Performed Successfully";
        $result = mysqli_query($con, $sql);

        $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $user_name=$row1['username']; 
        $phdate = date("Y-m-d H:i:s");  

        $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Adding of Campus','$phdate')";
        $result2 = mysqli_query($con, $sql2);        

        if($result){
            $location = "../uploads/";;
            move_uploaded_file($file_tmp, $location.$time.$file_name);
            $_SESSION['status'] = "Action Performed Successfully";
            header("location:../DTM_Campus.php");
        } 
    }

    else{
        $_SESSION['status_duplicate'] = "Action Performed Successfully";
        header("location:../DTM_Campus.php");
    }
}




if(isset($_POST["user_update_id"]))
{
    $output = '';
    $sql = "SELECT * FROM `dtm_campus` WHERE `ID` = '".$_POST["user_update_id"]."'";

    $result = mysqli_query($con, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $user_id=$row['ID'];
          $campus_image=$row['campus_image'];
          $campus_name=$row['campus_name'];
          $access=$row['campus_access'];
          $detailed_address=$row['detailed_address'];
          $province=$row['province'];
          $city=$row['city'];
          $barangay=$row['barangay'];
          $zip_code=$row['zip_code'];
          $email=$row['email'];
          $tel_no=$row['tel_no'];
          $mobile_no=$row['mobile_no'];

          $location_img = 'uploads/';


         $output .= ''
         ?>         


                    <!-- PROVINCE TO CITY -->
                    <script type="text/javascript">
                        $(document).ready(function(){

                          $('.province_class').change(function(){

                            var $this = $(this);
                            var region_id = $(this).find('option:selected').data('value1');
                            var province_id = $(this).find('option:selected').data('value2');

                            $.ajax({  
                                type: "POST",  
                                url: "PROJECT_LOCATIONS/PROJECT_province_to_city.php",  
                                data: {region_id:region_id,
                                       province_id:province_id},
                                dataType:"text",
                                success: function(data) 
                                {
                                    $('.city_class').html(data); 
                         
                                }
                            });  
                          });
                        });
                    </script>



                    <!-- CITY TO BARANGAY -->
                    <script type="text/javascript">
                        $(document).ready(function(){

                          $('.city_class').change(function(){

                            var $this = $(this);
                            var region_id = $(this).find('option:selected').data('value1');
                            var province_id = $(this).find('option:selected').data('value2');
                            var city_id = $(this).find('option:selected').data('value3');

                            $.ajax({  
                                type: "POST",  
                                url: "PROJECT_LOCATIONS/PROJECT_city_to_barangay.php",  
                                data: {region_id:region_id,
                                       province_id:province_id,
                                       city_id:city_id},
                                dataType:"text",
                                success: function(data) 
                                {
                                    $('.barangay_class').html(data); 
                         
                                }
                            });  
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

                    <script>
                      // Get the file input and file name input
                      const fileInput = $('#initial_file');
                      const fileName = $('#secondary_file');
                      
                      // Add an event listener to the file input
                      fileInput.on('change', () => {
                        // Get the selected file
                        const file = fileInput[0].files[0];
                        
                        // Set the value of the file name input to the selected file's name
                        fileName.val(file.name);
                      });
                    </script>



                    <input type="text" name="up_id" class="form-control" value="<?php echo $user_id ?>" hidden="">

                    <div style="margin-bottom: 20px">
                        <img src="<?php echo $location_img.$campus_image ?>" style="width: 350px; height: 250px; border-radius: 6px; border: 1px solid #A82C2C;">
                    </div>
                    <div>
                        <label>RE-Upload Image</label><span class="additional-span">( REQUIRED )</span>
                     </div>
                     <div>
                        <input type="file" name="file" id="initial_file" style="margin-bottom: 23px; padding-top: 13px; background-color: #fff!important">
                        <input type="text" name="file_in_text" id="secondary_file" value="<?php echo $campus_image ?>" style="margin-bottom: 23px; padding-top: 13px; background-color: #fff!important" hidden>
                     </div>
                     <div>
                        <label>Campus Name</label><span class="additional-span">( REQUIRED )</span>
                     </div>
                     <div>
                        <input type="text" value="<?php echo $campus_name ?>" name="campus_name" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                     </div>
                     <div style="margin-bottom: 13px;">
                        <label>Access</label><span class="additional-span">( REQUIRED )</span>
                     </div>
                     <div>
                        <select name="access" style="margin-bottom: 23px;" class="acess_class" required>
                            <option value="<?php echo $access ?>"><?php echo $access ?></option>
                            <option value="ALL CAMPUS">ALL CAMPUS</option>
                            <option value="CAMPUS ONLY">CAMPUS ONLY</option>
                        </select>
                     </div>
                     <div>
                        <label>DETAILED ADDRESS</label><span class="additional-span">( REQUIRED )</span>
                     </div>
                     <div>
                        <input type="text" value="<?php echo $detailed_address ?>" name="detailed_address" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                     </div>

                     <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                        <div>
                            <div style="margin-bottom: 13px">
                                <label>Province</label><span class="additional-span">( REQUIRED )</span>
                            </div>
                            <div>
                                <select name="province" class="province_class" style="margin-bottom: 23px;">

                                    <option style="display: none;" value="<?php echo $province ?>"><?php echo $province ?></option>  

                                    <?php 

                                    $sql="SELECT * FROM `z_provinces`";
                                    $result=mysqli_query($con,$sql);

                                    while($row=mysqli_fetch_array($result)){
                                        echo '<option value="'.$row["description"].'" data-value1="'.$row["region_code"].'" data-value2="'.$row["province_code"].'">'.$row["description"].'</option>';  
                                    }

                                    ?>   

                                </select>
                            </div>
                        </div>

                        <div>
                            <div style="margin-bottom: 13px">
                                <label>City</label><span class="additional-span">( REQUIRED )</span>
                            </div>
                            <div>
                                <select name="city" class="city_class" style="margin-bottom: 23px;">

                                    <option style="display: none;" value="<?php echo $city ?>"><?php echo $city ?></option>  

                                </select>
                            </div>
                        </div>
                     </div>

                     <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                        <div>
                            <div style="margin-bottom: 13px">
                                <label>Barangay</label><span class="additional-span">( NOT REQUIRED )</span>
                            </div>
                            <div>
                                <select name="barangay" class="barangay_class" style="margin-bottom: 23px;">

                                    <option style="display: none;" value="<?php echo $barangay ?>"><?php echo $barangay ?></option>  

                                </select>
                            </div>
                        </div>

                        <div>
                            <div>
                                <label>ZIP CODE</label><span class="additional-span">( REQUIRED )</span>
                            </div>
                            <div>
                                <input type="text" value="<?php echo $zip_code ?>" name="zip_code" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                            </div>
                        </div>
                     </div>

                     <div>
                        <div>
                            <label>Email</label><span class="additional-span">( REQUIRED )</span>
                        </div>
                        <div>
                            <input type="email" value="<?php echo $email ?>" name="email" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                        </div>
                     </div>

                     <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 15px;">
                        <div>
                            <div>
                                <label>Telephone No</label><span class="additional-span">( REQUIRED )</span>
                            </div>
                            <div>
                                <input type="number" value="<?php echo $tel_no ?>" name="tel_no" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label>Mobile No</label><span class="additional-span">( REQUIRED )</span>
                            </div>
                            <div>
                                <input type="number" value="<?php echo $mobile_no ?>" name="mobile_no" placeholder="----" required="" autocomplete="off" style="margin-bottom: 23px;">
                            </div>
                        </div>
                    </div>
                        
             <?php ;
    }
    $output .= "</form>";

}


if(isset($_POST["sub-update"]))
 {
     $id = $_POST['up_id'];
     $campus_name=$_POST['campus_name'];
     $access=$_POST['access'];
     $detailed_address=$_POST['detailed_address'];
     $province=$_POST['province'];
     $city=$_POST['city'];
     $barangay=$_POST['barangay'];
     $zip_code=$_POST['zip_code'];
     $email=$_POST['email'];
     $tel_no=$_POST['tel_no'];
     $mobile_no=$_POST['mobile_no'];

     $file_name = $_FILES['file']['name'];
     $file_tmp = $_FILES['file']['tmp_name'];
     $file_in_text=$_POST['file_in_text'];

       $sql = "UPDATE `dtm_campus`

               SET `campus_image`='$file_in_text',`campus_name`='$campus_name',`campus_access`='$access',`detailed_address`='$detailed_address',`province`='$province',`city`='$city',`barangay`='$barangay',`zip_code`='$zip_code',`email`='$email',`tel_no`='$tel_no',`mobile_no`='$mobile_no'

               WHERE `ID` = '$id'";

       $result = mysqli_query($con, $sql);
       if($result){

            $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
            $result1=mysqli_query($con,$sql1);
            $row1=mysqli_fetch_assoc($result1);
            $user_name=$row1['username']; 
            $phdate = date("Y-m-d H:i:s");  

            $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Editing of Campus','$phdate')";
        $result2 = mysqli_query($con, $sql2);    

            $location = "../uploads/";;
            move_uploaded_file($file_tmp, $location.$file_name);
            $_SESSION['status_update'] = "Action Performed Successfully";
            header("location:../DTM_Campus.php");
        }
      else{
            die(mysqli_error($con));
        }
}


if(isset($_POST["user_del_id"]))
{
    $output = '';
    $sql = "SELECT * FROM `dtm_campus` WHERE `ID` = '".$_POST["user_del_id"]."'";
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

   $sql = "DELETE FROM `dtm_campus` WHERE `ID` = '$id'";
   $result = mysqli_query($con, $sql);
   if($result){

        $sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $user_name=$row1['username']; 
        $phdate = date("Y-m-d H:i:s");  

        $sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Deleting of Campus','$phdate')";
        $result2 = mysqli_query($con, $sql2);    

        $_SESSION['status_delete'] = "Action Performed Successfully";
        header("location:../DTM_Campus.php");
    }
  else{
        die(mysqli_error($con));
    }
}




?>