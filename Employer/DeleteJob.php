<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
    include('../Connection.php');
	$Id=$_GET['JobId'];

	$sql = "delete from Job_Master where JobId='".$Id."'";
	mysqli_query ($conn,$sql);
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("Job Deleted Succesfully");window.location=\'ManageJob.php\';</script>';

?>
</body>
</html>
