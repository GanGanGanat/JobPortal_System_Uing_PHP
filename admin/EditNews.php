<!DOCTYPE html>
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
            <h4 class="text-center">Edit News Page</h4>
            <div class="d-flex flex-row">
                <div class="container rounded-3 mt-2" style="margin-left: 300px;">
                    <?php
                    include('../Connection.php');
                    $Id = $_GET['UserId'];
                    $sql = "select * from news_master where NewsId=" . $Id . "";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        $Id = $row['NewsId'];
                        $News = $row['News'];
                        $date = $row['NewsDate'];
                    }
                    ?>
                    <div class="container">
                        <form method="POST" name="frmlogin" action="UpdateNews.php">
                            <div class="form-group mt-3">
                                <label>
                                    <label>News ID</label>
                                    <input type="text" name="NewsId" value="<?php echo $Id; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>News</label>
                                    <input type="text" name="News" value="<?php echo $News; ?>" class="form-control" style="width:475px">
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>
                                    <label>News Date</label>
                                    <input type="date" name="Date" value="<?php echo $date; ?>" class="form-control" style="width:475px">
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