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
                               <table class="table table-striped table-hover">
                        <tr >
                            <th colspan="2" class="text-center">User Information</th>
                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td><?php echo $row['JobSeekerName'];?></td>
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
                            <td>Mobile:</td>
                            <td><?php echo $row['Mobile'];?></td>
                        </tr>
                        <tr>
                            <td>Highest Qualification:</td>
                            <td><?php echo $row['Qualification'];?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><?php echo $row['Gender'];?></td>
                        </tr>
                        <tr>
                            <td>Birth Date:</td>
                            <td><?php echo $row['BirthDate'];?></td>
                        </tr>
                        <tr>
                            <td>Profile:</td> 
                            <td>               
                            <img src="../admin/upload/<?php echo $row['Resume']; ?>" class="d-block" height="100px" width="100px" alt="...">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><strong><a href="EditProfile.php?EmployerId=<?php echo $row['JobSeekId']; ?>">Edit Profile</a></strong></td>
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