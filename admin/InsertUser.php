<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
    include('../Connection.php');
	$UserName=$_POST['txtUserName'];
	$Password=$_POST['txtPassword'];

	$sql = "insert into User_Master	(UserName,Password) values('".$UserName."','".$Password."')";
	// execute query
	mysqli_query ($conn,$sql);
	// Close The Connection
	mysqli_close ($conn);
	echo '<script type="text/javascript">alert("User Inserted Succesfully");window.location=\'User.php\';</script>';

?>
</body>
</html>