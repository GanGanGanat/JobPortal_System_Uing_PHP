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
</head>
<body>
    <div class="d-flex">
        <div class="">
            <?php include('DashBord.php') ?>
        </div>
        <div class="flex-fill" style="background-color: #f1f2f3;">
            <h2>Manage Job Seeker</h2>
            <div class="container mt-2">
                <div class="mt-3">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Job Seeker Name</th>
                            <th>City</th>
                            <th>Gender</th>
                            <th>Detail</th>
                        </tr>
                        <?php
                            include('../Connection.php');
                            $sql = "select * from jobseeker_reg where Status='Pending'";
                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful...");
                            $records = mysqli_num_rows($result);
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['JobSeekId']; ?></td>
                                    <td><?php echo $row['JobSeekerName']; ?></td>
                                    <td><?php echo $row['City']; ?></td>
                                    <td><?php echo $row['Gender']; ?></td>
                                    <td><a href="DetailJob.php?JobId=<?php echo $row['JobSeekId'];?>" class="btn btn-primary">Detail</a></td>
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