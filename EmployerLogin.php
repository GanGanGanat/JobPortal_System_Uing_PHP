<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceWala.com</title>
    <link rel="stylesheet" href="./css//bootstrap.min.css">
    <script src="./js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #f1f2f3;">
    <div class="container ">
        <div class="card mycard">            
                <form method="POST" name="frmlogin" action="EmployerLogin_Valid.php">
                    <h3 class="text-center">Employer Login Page</h3>
                    <div class="form-group mt-3">
                        <label>
                            <label>Name</label>
                            <input type="text" name="username" class="form-control" style="width:475px">
                        </label>
                    </div>
                    <div class="form-group mt-3">
                        <label>
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" style="width:475px">
                        </label>
                    </div>
                    <button type="submit" name="login" class="btn btn-success mt-3" style="width:475px">Login</button>
                </form>        
        </div>
    </div>
</body>
</html>
<html>
