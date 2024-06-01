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
            <h4 class="mx-3 mt-2">Profile</h4>
            <hr>
            <div class="container mt-2">
            <?php
                $ID = $_SESSION['ID1'];
                include('../Connection.php');
                $sql = "select * from jobseeker_reg where JobSeekId='".$ID."'  ";
                $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
                $row = mysqli_fetch_array($result)
                ?> 
                 <div class="container">
                        <form method="POST" name="frmupdate" action="UpdateJobSeeker.php" enctype="multipart/form-data">
                                <div class="form-group mt-3">     
                                    <input type="hidden" name="txtId" value="<?php echo $row['JobSeekId'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Name:</label>
                                    <input type="text" name="txtName" value="<?php echo $row['JobSeekerName']; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Address </label>
                                    <input type="text" name="txtAddress" value="<?php echo $row['Address']; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>City </label>
                                    <input type="text" name="txtCity" value="<?php echo $row['City']; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Email</label>
                                    <input type="text" name="txtEmail" value="<?php echo $row['Email']; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Mobile</label>
                                    <input type="text" name="txtMobile" value="<?php echo $row['Mobile']; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Qualification:</label>
                                    <input type="text" name="txtQualification" value="<?php echo $row['Qualification']; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Birth Date:</label>
                                    <input type="text" name="txtDate" value="<?php echo $row['BirthDate'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>User Name:</label>
                                    <input type="text" name="txtUser" value="<?php echo $row['UserName'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Password:</label>
                                    <input type="text" name="txtPass" value="<?php echo $row['Password'];?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-outline mb-2">
                                    <label class="form-label" for="typeEmailX-2">Product Image</label>
                                    <input type="hidden" name="old_image" value="<?= $row['Resume']; ?>" class="form-control form-control-sm border border-secondary" height="100px" width="100px" id=""/>  
                                    <input type="file" name="pimage"  class="form-control form-control-sm border border-secondary" style="width:475px" id=""/>   
                                    <img name="cur_image" src="../admin/upload/<?= $row['Resume']; ?>" class="form-control form-control-sm  border border-secondary" style="height:100px; width:100px"/>  
                            </div>
                            <button type="submit" name="login" class="btn btn-success mt-3" style="width:475px">Update</button>
                        </form>
                    </div>
                
            </div>
            <div class="container mt-2">
            </div>
        </div>
    </div>
</body>
</html>