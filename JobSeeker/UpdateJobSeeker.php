<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(!isset($_SESSION))
{
session_start();
}

	include('../Connection.php');

    $Sekeer_id = $_POST['txtId'];
    $Sekeer_Name = $_POST['txtName'];
    $Sekeer_Add = $_POST['txtAddress'];
    $Sekeer_City = $_POST['txtCity'];
    $Sekeer_Em = $_POST['txtEmail'];
    $Sekeer_Mo = $_POST['txtMobile'];
    $Sekeer_Q = $_POST['txtQualification'];    
    $Sekeer_Dt = $_POST['txtDate'];
    $Sekeer_User = $_POST['txtUser'];
    $Sekeer_Pass = $_POST['txtPass'];

       
    $old_img = $_POST["old_image"];
    $filename = $_FILES['pimage']['name'];
    $basename = substr($filename,0,strripos($filename,'.'));
    $ext =  substr($filename,strripos($filename,'.'));
    $tempname = $_FILES['pimage']['tmp_name'];
    $allow_type = array('.png','.jpg','jpeg');
    $size = $_FILES['pimage']['size'];
    if(in_array($ext,$allow_type) && $size < 300000){
        $newfileName = md5($basename).rand(10,1000).time().$ext;
        if(file_exists('../admin/upload/'.$newfileName)){
            echo 'file exit';
        }else{
            move_uploaded_file($tempname,'../admin/upload/'.$newfileName);
            $photo = $newfileName;

        }
    }
    if($filename == ""){
        $productQry = "update jobseeker_reg set JobSeekerName='$Sekeer_Name',Address='$Sekeer_Add',City='$Sekeer_City',Email='$Sekeer_Em',Mobile='$Sekeer_Mo',Qualification='$Sekeer_Q',BirthDate='$Sekeer_Dt',Resume='$old_img',UserName='$Sekeer_User',Password='$Sekeer_Pass' where JobSeekId = $Sekeer_id ";
        $pro_qry_res = mysqli_query($conn, $productQry);        
    }else{
        $productQry = "update jobseeker_reg set JobSeekerName='$Sekeer_Name',Address='$Sekeer_Add',City='$Sekeer_City',Email='$Sekeer_Em',Mobile='$Sekeer_Mo',Qualification='$Sekeer_Q',BirthDate='$Sekeer_Dt',Resume='$photo',UserName='$Sekeer_User',Password='$Sekeer_Pass' where JobSeekId = $Sekeer_id ";
        $pro_qry_res = mysqli_query($conn, $productQry);
    } 

    if ($pro_qry_res) {  
        echo '<script type="text/javascript">alert("Profile Update Succesfully");window.location=\'Education.php\';</script>';
    } else {
        echo '<script type="text/javascript">alert("Profile Updation Faild");window.location=\'Education.php\';</script>';
    }

?>
</body>
</html>
