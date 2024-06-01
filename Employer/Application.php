<?php
session_start();
if(isset($_SESSION['EmployerName'])){

} 
else{
		header('location:../EmployerLogin.php');
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Page</title>
</head>
<body>
    <div class="d-flex">
        <div class="">
            <?php include('DashBord.php') ?>
        </div>
        <div class="flex-fill" style="background-color: #f1f2f3;">
            <h4>Application Page</h4>
            <div class="container mt-2">
                <?php include('../Connection.php') ?>
            <?php
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
  {
    $theValue = $theValue;

    //  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

    switch ($theType) {
      case "text":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "long":
      case "int":
        $theValue = ($theValue != "") ? intval($theValue) : "NULL";
        break;
      case "double":
        $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
        break;
      case "date":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "defined":
        $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
        break;
    }
    return $theValue;
  }
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['CompanyName'])) {
  $colname_Recordset1 = $_SESSION['CompanyName'];
}

$query_Recordset1 = sprintf("SELECT JobId, JobTitle FROM job_master WHERE CompanyName = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($conn, $query_Recordset1);
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);


$query_Recordset2 = "SELECT application_master.ApplicationId, application_master.Status, jobseeker_reg.JobSeekerName, jobseeker_reg.City, jobseeker_reg.Email, application_master.JobId FROM application_master, jobseeker_reg WHERE jobseeker_reg.JobSeekId=application_master.JobSeekId";
$Recordset2 = mysqli_query($conn, $query_Recordset2);
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
                ?>
                <div class="container">
                  <form id="form1" method="post" action="">
                    <div class="d-flex flex-row">
                        <select class="form-select" name="cmbTitle">
                        <?php
                        do {
                          ?>
                          <option value="<?php echo $row_Recordset1['JobId'] ?>"><?php echo $row_Recordset1['JobTitle'] ?>
                          </option>
                          <?php
                        } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
                        $rows = mysqli_num_rows($Recordset1);

                        if ($rows > 0) {
                          mysqli_data_seek($Recordset1, 0);
                          $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
                        }
                        ?>
                        </select>
                        <input type="submit" value="View "  class="btn btn-primary mx-2"/>
                    </div>
                  </form>
                </div>
                <div>
                    <?php
                        if (isset($_POST['cmbTitle'])){
                        $Title = $_POST['cmbTitle'];                        
                    ?>
                        <div class="container">
                            <table  class="table table-striped table-hover">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>View & Send</th>
                                </tr>
                                <?php
                                    include('../Connection.php');
                                    $sql = "SELECT application_master.ApplicationId, application_master.Status,jobseeker_reg.JobSeekerName, jobseeker_reg.City, jobseeker_reg.Email, jobseeker_reg.JobSeekId,application_master.JobId FROM application_master, jobseeker_reg WHERE jobseeker_reg.JobSeekId=application_master.JobSeekId and application_master.JobId='" . $Title . "'";                                   
                                    // $result1 = mysqli_query($conn, $sql);
                                    $stat = 1;
                                    $result = mysqli_query($conn, $sql);
                                    $records = mysqli_num_rows($result);
                                    $stat = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {                              
                                ?>
                                <tr>
                                    <td><?php echo $row['ApplicationId']; ?></td>
                                    <td><?php echo $row['JobSeekerName']; ?></td>
                                    <td><?php echo $row['City']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <th><?php echo $row['Status']; ?></th>
                                    <td><a href="ViewBiodata.php?JobSeekId=<?php echo $row['JobSeekId']; ?>&AppId=<?php echo $row['ApplicationId']; ?>&JobId=<?php echo $Title; ?>&Status=<?php echo $row['Status']; ?>">View</a></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success">Total <?php if(isset($records)){ echo $records; }else{ echo "0"; }?>  Records </button>
                </div>
            </div>
            <div class="container mt-2">
            </div>
        </div>
    </div>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);
?>