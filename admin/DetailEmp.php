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
      <h4>Aprove Employer Page</h4>
      <div class="d-flex flex-row">
        <div class="container rounded-2 mt-2 mx-1">
          <?php
          include('../Connection.php');
          $ID = $_GET['EmpId'];
          $sql = "select * from Employer_Reg where EmployerId ='" . $ID . "'  ";

          $result = mysqli_query($conn, $sql);
          // Loop through each records 
          $row = mysqli_fetch_array($result)
          ?>
          <table class="table table-striped table-hover">
            <tr>
              <th colspan="2" class="text-center">Employer Info</th>
            </tr>
            <tr>
              <td>ID:</td>
              <td><?php echo $row['EmployerId']; ?></td>
            </tr>
            <tr>
              <td>Company Name:</td>
              <td><?php echo $row['CompanyName']; ?></td>
            </tr>
            <tr>
              <td>Contact Person:</td>
              <td><?php echo $row['ContactPerson']; ?></td>
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
              <td>Area of Work:</td>
              <td><?php echo $row['Area_Work']; ?></td>
            </tr>
            <tr>
              <td colspan="2" class="text-center"><strong><a href="ApprovEmp.php?EmpId=<?php echo $row['EmployerId']; ?>">Approv Employer</a></strong></td>
              <td>&nbsp;</td>
            </tr>
          </table>
          <?php
          mysqli_close($conn);
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>