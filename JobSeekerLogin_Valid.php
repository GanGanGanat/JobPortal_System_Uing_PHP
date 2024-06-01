<?php

include('./Connection.php');

session_start();

    if (isset($_POST['login'])){ 

        $UserName = $_POST['username']; 
        $Password = $_POST['password'];

        if((empty($Email)) && (empty($Password))){

            ?>
                <script> alert('Woops! Email ID OR password Fields Are Blacks...')</script>

            <?php
        }else{
            
            $sql = "select * from jobseeker_reg where UserName='".$UserName."' and Password='".$Password."' and Status='Confirm'";
            $result = mysqli_query($conn,$sql);
            if($result->num_rows > 0){

                ?>
                <script> alert('Login Successful...!')</script>
                <?php
                $row = mysqli_fetch_assoc($result);
                $_SESSION['JobSeekerName'] = $row['UserName'];
                $_SESSION['ID1']=$row['JobSeekId'];
                $_SESSION['Name']=$row['JobSeekerName'];
                header("Location: ./JobSeeker/index.php");                
                ?>               
                <?php
            }else{
                ?>
                <?php
                 echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'JobSeekerLogin.php\';</script>';
            }

        }


    }
?>