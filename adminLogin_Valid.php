<?php

include('./Connection.php');

session_start();

    if (isset($_POST['login'])){ 

        $Email = $_POST['username']; 
        $Password = $_POST['password'];

        if((empty($Email)) && (empty($Password))){

            ?>
                <script> alert('Woops! Email ID OR password Fields Are Blacks...')</script>

            <?php
        }else{
            
            $logsql  = "SELECT * FROM user_master WHERE UserName='$Email' AND Password='$Password'";
            $result = mysqli_query($conn,$logsql);
            if($result->num_rows > 0){

                ?>
                <script> alert('Login Successful...!')</script>
                <?php
                $row = mysqli_fetch_assoc($result);
                $_SESSION['UserName'] = $row['UserName'];
                header("Location: ./admin/index.php");                
                ?>               
                <?php
            }else{
                ?>
                <?php
                 echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'adminLogin.php\';</script>';
            }

        }


    }
?>