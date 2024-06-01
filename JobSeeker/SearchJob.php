<?php
session_start();
if(isset($_SESSION['JobSeekerName'])){

} 
else{
		header('location:../JobSeekerLogin.php');
}
?>
<!DOCTYPE html>
<!-- http://www.gstatic.com/generate_204  2022067174-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
</head>

<body>
    <div class="d-flex">
        <div class="">
            <?php include('DashBord.php') ?>
        </div>
        <div class="flex-fill" style="background-color: #f1f2f3;">
            <h4 class="mx-3 mt-2">Search Job Page</h4>
            <hr>
            <div class="container mt-2">
                    <?php include('../Connection.php'); ?>
                    <?php
                    if (!function_exists("GetSQLValueString")) {
                    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
                    {
                    $theValue =  $theValue;

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

                    $currentPage = $_SERVER["PHP_SELF"];

                    $query_Recordset1 = "SELECT MinQualification FROM job_master";
                    $Recordset1 = mysqli_query( $conn,$query_Recordset1);
                    $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
                    $totalRows_Recordset1 = mysqli_num_rows($Recordset1);

                    $query_Recordset3 = "SELECT job_master.JobId, job_master.CompanyName, job_master.JobTitle, application_master.Status, application_master.JobSeekId, application_master.Description FROM application_master, job_master WHERE application_master.JobId=job_master.JobId";
                    $Recordset3 = mysqli_query($conn,$query_Recordset3);
                    $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
                    $totalRows_Recordset3 = mysqli_num_rows($Recordset3);


                    $query_Recordset4 = "SELECT distinct CompanyName FROM job_master";
                    $Recordset4 = mysqli_query($conn,$query_Recordset4);
                    $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
                    $totalRows_Recordset4 = mysqli_num_rows($Recordset4);

                    $query_Recordset5 = "SELECT distinct JobTitle FROM job_master";
                    $Recordset5 = mysqli_query($conn,$query_Recordset5);
                    $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
                    $totalRows_Recordset5 = mysqli_num_rows($Recordset5);

                    $colname_Recordset2 = "-1";
                    if (isset($_POST['cmbQual'])) {
                    $colname_Recordset2 = $_POST['cmbQual'];
                    }
                    $colname2_Recordset2 = "-1";
                    if (isset($_POST['cmbCompany'])) {
                    $colname2_Recordset2 = $_POST['cmbCompany'];
                    }
                    $colname3_Recordset2 = "-1";
                    if (isset($_POST['cmbArea'])) {
                    $colname3_Recordset2 = $_POST['cmbArea'];
                    }

                    $query_Recordset2 = sprintf("SELECT * FROM job_master WHERE MinQualification = %s and CompanyName=%s and JobTitle=%s", GetSQLValueString($colname_Recordset2, "text"),GetSQLValueString($colname2_Recordset2, "text"),GetSQLValueString($colname3_Recordset2, "text"));
                    $Recordset2 = mysqli_query($conn,$query_Recordset2);
                    $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
                    $totalRows_Recordset2 = mysqli_num_rows($Recordset2);

                    $queryString_Recordset2 = "";
                    if (!empty($_SERVER['QUERY_STRING'])) {
                    $params = explode("&", $_SERVER['QUERY_STRING']);
                    $newParams = array();
                    foreach ($params as $param) {
                        if (stristr($param, "pageNum_Recordset2") == false && 
                            stristr($param, "totalRows_Recordset2") == false) {
                        array_push($newParams, $param);
                        }
                    }
                    if (count($newParams) != 0) {
                        $queryString_Recordset2 = "&" . htmlentities(implode("&", $newParams));
                    }
                    }
                    $queryString_Recordset2 = sprintf("&totalRows_Recordset2=%d%s", $totalRows_Recordset2, $queryString_Recordset2);
                    ?>
                    <div>
                    <form method="POST" name="frmlogin" action="SearchJob.php">
                            <div class="form-group mt-3">
                                <label>
                                    <label>Select Qualification:</label>
                                    <select name="cmbQual" class="form-control" style="width:475px">
                                        <?php
                                            do {  
                                            ?>
                                                <option value="<?php echo $row_Recordset1['MinQualification']?>"><?php echo $row_Recordset1['MinQualification']?></option>
                                                <?php
                                            } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
                                            $rows = mysqli_num_rows($Recordset1);
                                            if($rows > 0) {
                                                mysqli_data_seek($Recordset1, 0);
                                                $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
                                            }
                                        ?>
                                </select>
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Select Compnay Name:</label>
                                    <select name="cmbCompany" class="form-control" style="width:475px">
                                            <?php
                                        do {  
                                        ?>
                                                <option value="<?php echo $row_Recordset4['CompanyName']?>"><?php echo $row_Recordset4['CompanyName']?></option>
                                        <?php
                                        } while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
                                        $rows = mysqli_num_rows($Recordset4);
                                        if($rows > 0) {
                                            mysqli_data_seek($Recordset4, 0);
                                            $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
                                        }
                                        ?>
                        </select>
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Select Area of Work:</label>
                                    <select name="cmbArea" class="form-control" style="width:475px">
                                        <?php
                                        do {  
                                        ?>
                                            <option value="<?php echo $row_Recordset5['JobTitle']?>"><?php echo $row_Recordset5['JobTitle']?></option>
                                            <?php
                                        } while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
                                        $rows = mysqli_num_rows($Recordset5);
                                        if($rows > 0) {
                                            mysqli_data_seek($Recordset5, 0);
                                            $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
                                        }
                                        ?>
                                    </select>
                                </label>
                            </div>
                            <button type="submit" name="login" class="btn btn-success mt-3" style="width:475px">Search</button>
                        </form>
                        <table class="table table-striped table-hover">
                  <tr>
                    <td width="100%">&nbsp;
                     
                        <?php
						if ($totalRows_Recordset2!=0) 
						{
						do { ?>
                          <table class="table table-striped table-hover">
                          <tr>
                          <td><strong>JobId</strong></td>
                          <td><strong><?php echo $row_Recordset2['JobId']; ?></strong></td>
                          </tr>
                          <tr>
                          <td><strong>CompanyName</strong></td>
                          <td><strong><?php echo $row_Recordset2['CompanyName']; ?></strong></td>
                          </tr>
                          <tr>
                          <td><strong>JobTitle</strong></td>
                          <td><strong><?php echo $row_Recordset2['JobTitle']; ?></strong></td>
                          </tr>
                          <tr>
                          <td><strong>Vacancy</strong></td>
                          <td><strong><?php echo $row_Recordset2['Vacancy']; ?></strong></td>
                          </tr>
                          <tr>
                          <td><strong>MinQualification</strong></td>
                           <td><strong><?php echo $row_Recordset2['MinQualification']; ?></strong></td>
                           </tr>
                           <tr>
                          <td><strong>Description</strong></td>
                          <td><strong><?php echo $row_Recordset2['Description']; ?></strong></td>
                        </tr>
                           <tr>
                             <td>&nbsp;</td>
                             <td><a href="Apply.php?JobId=<?php echo $row_Recordset2['JobId'];?>"><strong>Apply For Job</strong></a></td>
                           </tr>
                        </table>
                        <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
						  
						  ?>
                      </table>
                      <?php
					  }
                      ?></td>
                  </tr>
                </table>
                <table class="table table-striped table-hover">
                  <tr>
                    <td><strong>Status of Job</strong></td>
                  </tr>
                  <tr>
                    <td><table class="table table-striped table-hover">
                      <tr>
                        <th ><strong>Company Name</strong></div></th>
                        <th ><strong>Job Title</strong></div></th>
                        <th ><strong>Status</strong></div></th>
                         <th ><strong>Description</strong></div></th>
                      </tr>
                      <?php
                            include('../Connection.php');
                            $sql = "SELECT job_master.JobId, job_master.CompanyName, job_master.JobTitle, application_master.Status, application_master.JobSeekId, application_master.Description
                            FROM application_master, job_master
                            WHERE application_master.JobId=job_master.JobId and application_master.JobSeekId='".$_SESSION['ID1']."'";

                            $result = mysqli_query($conn,$sql);

                            while($row = mysqli_fetch_array($result))
                            {
                            $CompanyName=$row['CompanyName'];
                            $JobTitle=$row['JobTitle'];
                            $Status=$row['Status'];
                            $Description=$row['Description'];
                            ?>
                      <tr>
                        <td><?php echo $CompanyName;?></td>
                        <td><?php echo $JobTitle;?></td>
                         <td><?php echo $Status;?></td>
                         <td><?php echo $Description;?></td>
                      </tr>
                      <?php
}

$records = mysqli_num_rows($result);
?>
                      <?php
mysqli_close($conn);
?>
                    </table></td>
                  </tr>
                </table>
                    </div>
            </div>
            <div class="container mt-2">
            </div>
        </div>
    </div>
</body>
</html>