<?php include('header.php'); 
    include('Connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceWala.com</title>
    <link rel="stylesheet" href="./css//bootstrap.min.css">
    <script src="./js/bootstrap.bundle.js"></script>
</head>
<body>
    <div class="container mt-3">
    <div class="d-flex justify-content-end">
                <a class="btn btn-primary" href="./RegisterEmployer.php"> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-circle-fill m-2" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>New Employer Register</a>
        </div>
        <div class="mt-3">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Company Name</th>
                    <th>Contact Person</th>
                    <th>Email</th>
                </tr>
                <?php
                    $sql = "select * from employer_reg where Status='Confirm'";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful...");
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['CompanyName']; ?></td>
                            <td><?php echo $row['ContactPerson']; ?></td>
                            <td><?php echo $row['Email']; ?></td>                            
                        </tr>                       
                    <?php } ?>                                
            </table>
        </div>
    </div>
</body>
</html>