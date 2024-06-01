<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ServiceWala.com</title>
</head>

<body>
	<?php
	include('./Connection.php');

	$Name = $_POST['txtName'];
	$Address = $_POST['txtAddress'];
	$City = $_POST['txtCity'];
	$Email = $_POST['txtEmail'];
	$Mobile = $_POST['txtMobile'];
	$Qualification = $_POST['txtQualification'];
	$Gender = $_POST['cmbGender'];
	$BirthDate = $_POST['txtBirthDate'];
	$Status = "Pending";
	$UserName = $_POST['txtUserName'];
	$Password = $_POST['txtPassword'];
	$Question = $_POST['cmbQue'];
	$Answer = $_POST['txtAnswer'];
	$UserType = "JobSeeker";
	if ($Qualification == "Other") {
		$Qualification = $_POST['txtOther'];
	}
	$path1 = $_FILES["txtFile"]["name"];
	$basename = substr($path1, 0, strripos($path1,'.'));
	$ext = substr($path1, strripos($path1, '.'));
	$tempname = $_FILES['txtFile']['tmp_name'];
	$allow_type = array('.png', '.jpg','.jpeg','.pdf');
	$size = $_FILES['txtFile']['size'];
	if (in_array($ext, $allow_type) && $size < 300000) {
		$newfilename = md5($basename).rand(10, 1000).time().$ext;
		if (file_exists('./admin/upload/'. $newfilename)) {
			echo 'file exit';
		} else {
			move_uploaded_file($tempname,'./admin/upload/'. $newfilename);
			$photo = $newfilename;
		}
	}
	$sql = "insert into jobseeker_reg(JobSeekerName,Address,City,Email,Mobile,Qualification,Gender,BirthDate,Resume,Status,UserName,Password,Question,Answer) VALUES ('$Name','$Address','$City','$Email','$Mobile','$Qualification','$Gender','$BirthDate','$photo','$Status','$UserName','$Password','$Question','$Answer')";
	if (mysqli_query($conn, $sql)) {
		echo '<script type="text/javascript">alert("Registration Completed Succesfully");window.location=\'index.php\';</script>';
	}
	mysqli_close($con);

	?>
</body>

</html>