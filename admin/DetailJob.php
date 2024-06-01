<?php
session_start();
if(isset($_SESSION['UserName'])){

} 
else{
		header('location:../adminLogin.php');
}
?>
<!DOCTYPE html>
<!-- http://www.gstatic.com/generate_204  2022067174-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css//bootstrap.min.css">
    <script src="./js//bootstrap.bundle.js"></script>
</head>

<body>
    <div class="d-flex">
        <div class="">
            <?php include('DashBord.php') ?>
        </div>
        <div class="flex-fill" style="background-color: #f1f2f3;">
            <h3>Approv page</h3>
            <div class="d-flex flex-row">
                <div class="container rounded-2 mt-2 mx-1">
                    <?php
                    include('../Connection.php');
                    $ID = $_GET['JobId'];
                    $sql = "select * from JobSeeker_Reg where JobSeekId='" . $ID . "'  ";
                    // Execute query
                    $result = mysqli_query($conn, $sql);
                    // Loop through each records
                    $row = mysqli_fetch_array($result)
                    ?>
                    <table class="table table-striped table-hover">
                        <tr >
                            <th colspan="2" class="text-center">User Information</th>
                        </tr>
                        <tr>
                            <td>Id:</td>
                            <td><?php echo $row['JobSeekId']; ?></td>
                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td><?php echo $row['JobSeekerName']; ?></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><?php echo $row['Address']; ?></td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td><?php echo $row['City']; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $row['Email']; ?></td>
                        </tr>
                        <tr>
                            <td>Mobile:</td>
                            <td><?php echo $row['Mobile']; ?></td>
                        </tr>
                        <tr>
                            <td>Highest Qualification:</td>
                            <td><?php echo $row['Qualification']; ?></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td><?php echo $row['Gender']; ?></td>
                        </tr>
                        <tr>
                            <td>Birth Date:</td>
                            <td><?php echo $row['BirthDate']; ?></td>
                        </tr>
                        <tr>
                            <td>Profile:</td> 
                            <td>               
                            <img src="./upload/<?php echo $row['Resume']; ?>" class="d-block" height="100px" width="100px" alt="...">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><strong><a href="ApprovJob.php?JobId=<?php echo $row['JobSeekId']; ?>">ApprovJob Seeker</a></strong></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>