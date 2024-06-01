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
            <div class="container mt-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Create New Admin
                </button>

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Enter New Admin Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="frmlogin" action="InsertUser.php">
                            <div class="form-group mt-3">
                                <label>
                                    <label>Admin UserName</label>
                                    <input type="text" name="txtUserName" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Password</label>
                                    <input type="password" name="txtPassword" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <button type="submit" name="login" class="btn btn-success mt-3" style="width:475px">Submit</button>
                        </form>     
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="container mt-2">
            <div class="mt-3">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Admin ID</th>
                    <th>Admin Name</th>
                    <th colspan="2">Action</th>

                </tr>
                <?php
                    include('../Connection.php');
                    $sql = "select * from User_Master";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful...");
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['UserId']; ?></td>
                            <td><?php echo $row['UserName']; ?></td>
                            <td><a href="EditUser.php?UserId=<?php echo $row['UserId'];?>" class="btn btn-success" >Edit</a></td>
                            <td><a href="DeleteUser.php?UserId=<?php echo $row['UserId'];?>" class="btn btn-danger">Delete</a></td>
                        </tr>                       
                    <?php } ?>                                
            </table>
        </div>

            </div>
        </div>
    </div>  
</body>
</html>