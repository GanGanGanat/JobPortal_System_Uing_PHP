<?php
    session_start()
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$txtTitle=$_POST['txtTitle'];
	$txtTotal=$_POST['txtTotal'];
	$cmbQual=$_POST['cmbQual'];
	$txtDesc=$_POST['txtDesc'];
	$Name=$_SESSION['CompanyName'];
	if($cmbQual=="Other")
	{
	$cmbQual=$_POST['txtOther'];
	}
    include('../Connection.php');
	$sql = "insert into job_master (CompanyName,JobTitle,Vacancy,MinQualification,Description) values('".$Name."','".$txtTitle."','".$txtTotal."','".$cmbQual."','".$txtDesc."')";
	mysqli_query ($conn,$sql);
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("Walkin Inserted Succesfully");window.location=\'ManageJob.php\';</script>';
?>
</body>
</html>
