<?php
session_start();
if(isset($_SESSION['JobSeekerName'])){

} 
else{
		header('location:../JobSeekerLogin.php');
}
?>
<!DOCTYPE html>
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
            <h4 class="mx-3 mt-2">Walkin Page</h4>
            <hr>
            <div class="container mt-2">

                <?php
                    include('../Connection.php');
                    $sql = "select * from walkin_master";
                    $result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
                    while($row = mysqli_fetch_array($result))
                    {
                        $Id=$row['WalkInId'];
                        $CompanyName=$row['CompanyName'];
                        $JobTitle=$row['JobTitle'];
                        $Vacancy=$row['Vacancy'];
                        $MinQualification=$row['MinQualification'];
                        $Description=$row['Description'];
                        $InterviewDate=$row['InterviewDate'];
                        $InterviewTime=$row['InterviewTime'];
                ?>
                <table class="table table-striped table-hover">
                  
                  <tr>
                    <th></th><strong>Company Name</strong>:</div></th>
                    <th></th><strong><?php echo $CompanyName;?></strong></div></th>
                  </tr>
                 
                  <tr>                
                   <td><strong>Job Title:</strong></></td>
                    <td><strong><?php echo $JobTitle;?></strong></td>
                  </tr>
                  <tr>                   
                    <td><strong>Vacancy</strong>:</td>
                    <td><strong><?php echo $Vacancy;?></strong></td>
                  </tr>
                  <tr>                   
                    <td><strong>Qualification:</strong></td>
                    <td><strong><?php echo $MinQualification;?></strong></td>
                  </tr>
                  <tr>                    
                    <td><strong>Description:</strong></td>
                    <td><strong><?php echo $Description;?></strong></td>
                  </tr>
                  <tr>                    
                    <td><strong>Date:</strong></td>
                    <td><strong><?php echo $InterviewDate;?></strong></td>
                  </tr>
                  <tr>
                    <td></td><strong>Time:</strong></div></td>
                    <td></td><strong><?php echo $InterviewTime;?></strong></td>
                  </tr>
                  <?php
}

?>
  </table>
            </div>
            <div class="container mt-2">
            </div>
        </div>
    </div>
</body>
</html>