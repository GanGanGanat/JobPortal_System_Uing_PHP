<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$Id = $_POST['NewsId'];
$News=$_POST['News'];
$date=$_POST['Date'];
include('../Connection.php');

$sql = "Update news_master set News='".$News."',NewsDate='".$date."' where NewsId=".$Id."";

mysqli_query($conn,$sql);
// Close The Connection
mysqli_close($conn);
echo '<script type="text/javascript">alert("News Updated Succesfully");window.location=\'News.php\';</script>';
?>
</body>
</html>
