<?php
session_start();
if (isset($_SESSION['EmployerName'])) {
} else {
    header('location:../EmployerLogin.php');
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
            <h2>Welcome To Control Panel</h2>
            <div class="container">
                <?php
                $ID = $_GET['JobSeekId'];
                include('../Connection.php');
                $sql = "select * from JobSeeker_Reg where JobSeekId='" . $ID . "'  ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result)
                ?>
                <table class="table table-striped table-hover">
                    <tr>
                        <td>Name</td>
                        <td><?php echo $row['JobSeekerName']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Address:</strong></td>
                        <td><?php echo $row['Address']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>City:</strong></td>
                        <td><?php echo $row['City']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><?php echo $row['Email']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Mobile:</strong></td>
                        <td><?php echo $row['Mobile']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Highest Qualification:</strong></td>
                        <td><?php echo $row['Qualification']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Gender:</strong></td>
                        <td><?php echo $row['Gender']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Birth Date:</strong></td>
                        <td><?php echo $row['BirthDate']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Profile:</strong></td>
                        <td><img src="../admin/upload/<?php echo $row['Resume']; ?>" class="d-block" height="100px" width="100px" alt="..."></td>
                    </tr>
                </table>
                <div>
                    <h2>Educational Qualification</h2>
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>
                            Degree
                        </th>
                        <th>
                            University
                        </th>
                        <th>
                            Passing Year
                        </th>
                        <th>
                            Percentage
                        </th>
                    </tr>
                    <?php
                    $ID = $_GET['JobSeekId'];
                    include('../Connection.php');
                    $sql = "select * from JobSeeker_Education where JobSeekId='" . $ID . "'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $Degree = $row['Degree'];
                        $Univ = $row['University'];
                        $Passing = $row['PassingYear'];
                        $Per = $row['Percentage'];
                    ?>
                        <tr>
                            <td>
                                <?php echo $Degree; ?>
                            </td>
                            <td>
                                <?php echo $Univ; ?>
                            </td>
                            <td>
                                <?php echo $Passing; ?>
                            </td>
                            <td>
                                <?php echo $Per; ?>
                            </td>
                        </tr>
                    <?php
                    }
                    $records = mysqli_num_rows($result);
                    ?>
                    <?php
                    mysqli_close($conn);
                    ?>
                </table>
                </td>
                </tr>
                </table>
            </div>
            <?php
            $Status = $_GET['Status'];
            if ($Status == "Apply") {
            ?>
                <form id="form1" method="post" action="CallLatter.php?JobId=<?php echo $_GET['JobId']; ?>&JobSeekId=<?php echo $_GET['JobSeekId']; ?>&AppId=<?php echo $_GET['AppId']; ?>">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td><strong>Call Latter Description:</strong></td>
                            <td><span id="sprytextarea1">
                                    <label>
                                        <textarea name="txtDesc" id="txtDesc" cols="35" rows="3"></textarea>
                                    </label>
                                    <span class="textareaRequiredMsg">A value is required.</span></span></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><label>
                                    <input type="submit" name="button" id="button" value="Submit" />
                                </label></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </form>
            <?php
            }
            ?>
            <p align="center"><a href="Application.php"><strong>Back</strong></a></p>
        </div>
    </div>
</body>

</html>