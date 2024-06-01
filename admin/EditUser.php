<!DOCTYPE html>
<html lang="en">
<?php session_start()?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css//bootstrap.min.css">
    <script src="./js//bootstrap.bundle.js"></script>
</head>

<body>

</body>

</html>

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
            <h4 class="text-center">Edit Admin Page</h4>
            <div class="d-flex flex-row">
                <div class="container rounded-3 mt-2" style="margin-left: 380px;">
                    <?php
                    include('../Connection.php');
                    $Id = $_GET['UserId'];
                    $sql = "select * from User_Master where UserId=" . $Id . "";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        $Id = $row['UserId'];
                        $Name = $row['UserName'];
                        $Password = $row['Password'];
                    }
                    ?>
                    <div class="container">
                        <form method="POST" name="frmlogin" action="UpdateUser.php">
                            <div class="form-group mt-3">
                                <label>
                                    <label>Admin ID</label>
                                    <input type="text" name="txtUserId" value="<?php echo $Id; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Admin Name</label>
                                    <input type="text" name="txtUserName" value="<?php echo $Name; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>Admin Password</label>
                                    <input type="password" name="txtPass" value="<?php echo $Password; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <button type="submit" name="login" class="btn btn-success mt-3" style="width:475px">Update</button>
                        </form>
                    </div>
                    <?php
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>