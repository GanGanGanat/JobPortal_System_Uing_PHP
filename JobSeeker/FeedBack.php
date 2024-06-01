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
            <h4 class="mx-3 mt-2">FeedBack Page</h4>
            <hr>
            <div class="container mt-2">
                <form method="post" action="InsertFeedback.php">
                    <div>
                    <h1>Give Your Feedback</h1>                    
                    <div class="mb-3">
                        <label class="form-label">Example textarea</label>
                        <textarea class="form-control" name="txtFeedback" rows="3"></textarea>
                    </div>
                    <button type="submit" value="submit" class="btn btn-danger">Submit</button>
                </div>
                </form>
            </div>
            <div class="container mt-2">
            </div>
        </div>
    </div>
</body>
</html>