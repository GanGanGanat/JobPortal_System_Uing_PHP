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
            <h2>Feedback Page</h2>
            <div class="container mt-2">
                <div class="mt-3">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Job Seeker Name</th>
                            <th>Feedback</th>
                            <th>Date</th>
                        </tr>
                        <?php
                            include('../Connection.php');
                            $sql = "select FeedbackId,Feedback,FeedbakDate,JobSeekerName from Feedback,JobSeeker_Reg where Feedback.JobSeekId=JobSeeker_Reg.JobSeekId";
                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful...");
                            $records = mysqli_num_rows($result);
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['FeedbackId']; ?></td>
                                    <td><?php echo $row['JobSeekerName']; ?></td>
                                    <td><?php echo $row['Feedback']; ?></td>
                                    <td><?php echo $row['FeedbakDate']; ?></td>                                    
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