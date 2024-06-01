<?php
session_start();
if(isset($_SESSION['EmployerName'])){

} 
else{
		header('location:../EmployerLogin.php');
}
?>
<!DOCTYPE html>
<!-- http://www.gstatic.com/generate_204  2022067174-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Job Page</title>
</head>

<body>
    <div class="d-flex">
        <div class="">
            <?php include('DashBord.php') ?>
        </div>
        <div class="flex-fill" style="background-color: #f1f2f3;">
            <div class="container mt-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Add New Job
                </button>

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter New Job Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="frmlogin" action="InsertJob.php">
                            <div class="form-group mt-3">
                                <label>
                                    <label>Job Title</label>
                                    <input type="text" name="txtTitle" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Total Vacancy</label>
                                    <input type="text" name="txtTotal" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Qualification</label>
                                    <input type="text" name="cmbQual" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Salary</label>
                                    <input type="text" name="txtOther" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Description</label>
                                    <input type="password" name="txtDesc" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <button type="submit" name="login" class="btn btn-success mt-3" style="width:475px">Submit</button>
                        </form>     
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="container mt-2">
            <div class="mt-3">
            <table class="table table-striped table-hover">
                <tr>
                    <th>ID</th>
                    <th>Job Title</th>
                    <th>Vacancy</th>
                    <th>Qualification</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>

                </tr>
                <?php
                    include('../Connection.php');
                    $sql = "select * from job_master where CompanyName='" . $_SESSION['CompanyName'] . "'";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful...");
                    $records = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['JobId']; ?></td>
                            <td><?php echo $row['JobTitle']; ?></td>
                            <td><?php echo $row['Vacancy']; ?></td>
                            <td><?php echo $row['MinQualification']; ?></td>
                            <td><?php echo $row['Description']; ?></td>                        
                            <td><a href="DeleteJob.php?JobId=<?php echo $row['JobId']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>                       
                    <?php } ?>                                
            </table>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-success">Total <?php echo $records ?> Records </button>
        </div>
            </div>
        </div>
    </div>
</body>
</html>