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
            $ID=$_SESSION['EmployerID'];
                include('../Connection.php');
                $sql = "select * from employer_reg where EmployerId ='".$ID."'  ";
                $result = mysqli_query($conn,$sql) or die( mysqli_error($con));
                $row = mysqli_fetch_array($result)
                ?>
                               <table class="table table-striped table-hover">
                        <tr >
                            <th colspan="2" class="text-center">User Information</th>
                        </tr>
                        <tr>
                            <td>Company ID:</td>
                            <td><?php echo $row['EmployerId'];?></td>
                        </tr>
                        <tr>
                            <td>Company Name:</td>
                            <td><?php echo $row['CompanyName'];?></td>
                        </tr>
                        <tr>
                            <td>Contact Person:</td>
                            <td><?php echo $row['ContactPerson'];?></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><?php echo $row['Address'];?></td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td><?php echo $row['City'];?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $row['Email'];?></td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td><?php echo $row['Mobile'];?></td>
                        </tr>
                        <tr>
                            <td>Area Of Work</td>
                            <td><?php echo $row['Area_Work'];?></td>
                        </tr>
                        <tr>
                            <td>User Name</td>
                            <td><?php echo $row['UserName'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><strong><a href="EditProfile.php?EmployerId=<?php echo $row['EmployerId']; ?>">Edit Profile</a></strong></td>
                            <td></td>
                        </tr>
                    </table>
            </div>
            <div class="container mt-2">
            </div>
        </div>
    </div>
</body>
</html>