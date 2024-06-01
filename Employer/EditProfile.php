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
    <title>Application Page</title>
</head>

<body>
    <div class="d-flex">
        <div class="">
            <?php include('DashBord.php') ?>
        </div>
        <div class="flex-fill" style="background-color: #f1f2f3;">
            <h4>Edit Employer</h4>
            <div class="container mt-2">
            <?php
                $ID=$_SESSION['EmployerID'];
                include('../Connection.php');
                $sql = "select * from employer_reg where EmployerId ='".$ID."'  ";
                $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
                $row = mysqli_fetch_array($result)
                ?>
                <div class="container mx-3">
                        <form method="POST" name="frmlogin" action="UpdateProfile.php">
                            <div class="form-group mt-3">
                                <label>
                                    <label>Company ID:</label>
                                    <input type="text" name="txtId" value="<?php echo $row['EmployerId'];?>" class="form-control" style="width:475px" disabled>
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Company Name:</label>
                                    <input type="text" name="txtName" value="<?php echo $row['CompanyName'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Contact Person:</label>
                                    <input type="text" name="txtContact" value="<?php echo $row['ContactPerson'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Address:</label>
                                    <input type="text" name="txtAddress" value="<?php echo $row['Address'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>City:</label>
                                    <input type="text" name="txtCity" value="<?php echo $row['City'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Email:</label>
                                    <input type="text" name="txtEmail" value="<?php echo $row['Email'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Mobile</label>
                                    <input type="text" name="txtMobile" value="<?php echo $row['Mobile'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Area Of Work</label>
                                    <input type="text" name="txtArea" value="<?php echo $row['Area_Work'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>User Name</label>
                                    <input type="text" name="txtUser" value="<?php echo $row['UserName'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Password</label>
                                    <input type="text" name="txtPassword" value="<?php echo $row['Password'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <button type="submit" name="login" class="btn btn-success mt-3" style="width:475px">Update</button>
                        </form>
                </div>
                    <?php
                    mysqli_close($conn);
                    ?>
            </div>
            <div class="container mt-2">
            </div>
        </div>
    </div>
</body>
</html>