<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$JobId=$_GET['JobId'];
	$JobSeekId=$_SESSION['ID1'];
	$Status="Apply";
	$Desc="No Message";
	
	include('../Connection.php');


	$sql1 = "select * from application_master where JobSeekId='".$JobSeekId."' and JobId='".$JobId."'";

	$result1 = mysqli_query ($conn,$sql1);
	$records1 = mysqli_num_rows($result1);
	if($records1==0)
	{
        
	$sql = "insert into application_master (JobSeekId,JobId,Status,Description) values('".$JobSeekId."','".$JobId."','".$Status."','".$Desc."')";

	mysqli_query ($conn,$sql);

	mysqli_close ($conn);
	
	echo '<script type="text/javascript">alert("Succesfully Applied For Job");window.location=\'SearchJob.php\';</script>';
}
else
{
echo '<script type="text/javascript">alert("You have already Applied For Job");window.location=\'SearchJob.php\';</script>';
}
?>
</body>
</html>
