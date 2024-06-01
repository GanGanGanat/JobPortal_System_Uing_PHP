<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceWala.com</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="./style1.css">
</head>
<body style="background-color: #f1f2f3;">
    <div class="container mycon">
        <div class="card mycard">            
                <form method="POST" name="frmlogin" action="RegisterEmpValid.php">
                    <h3 class="text-center">Employer Registration Form</h3>
                    <div class="row">
                        <div class="form-group mt-3 col-6">
                            <label>
                                <label>Company Name</label>
                                <input type="text" name="txtName" class="form-control" style="width:370px">
                            </label>
                        </div>
                        <div class="form-group mt-3 col-6">
                            <label>
                                <label>Cantact Person</label>
                                <input type="text" name="txtPerson" class="form-control" style="width:370px">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mt-3 col-6">
                            <label>
                                <label>Address</label>
                                <textarea class="form-control" name="txtAddress" id="exampleFormControlTextarea1" rows="4" style="width:370px"></textarea>
                            </label>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-3">
                                <label>
                                    <label>City</label>
                                    <input type="text" name="txtCity" class="form-control" style="width:370px">
                                </label>
                            </div>
                            <div class="form-group mt-2">
                                <label>
                                    <label>Email</label>
                                    <input type="text" name="txtEmail" class="form-control" style="width:370px">
                                </label>
                            </div>
                        </div>                      
                    </div>
                    <div class="row">
                        <div class="form-group mt-3 col-6">
                            <label>
                                <label>Phone Number</label>
                                <input type="text" name="txtMobile" class="form-control" style="width:370px">
                            </label>
                        </div>
                        <div class="form-group mt-3 col-6">
                            <label>
                                <label>Work Area</label>
                                <input type="text" name="txtAreaWork" class="form-control" style="width:370px">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mt-3 col-6">
                            <label>
                                <label>User Name</label>
                                <input type="text" name="txtUserName" class="form-control" style="width:370px">
                            </label>
                        </div>
                        <div class="form-group mt-3 col-6">
                            <label>
                                <label>Password</label>
                                <input type="text" name="txtPassword" class="form-control" style="width:370px">
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mt-3 col-6">
                            <label>
                                <label>Security Question</label>
                                <select  name="cmbQue" id="cmbQue" class="form-control" style="width:370px">
                                    <option>Select Your Question</option>
                                    <option>What is Your Pet Name?</option>
                                    <option selected="selected">Who is Your Favourite Person?</option>
                                    <option>What is the Name of Your First School?</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group mt-3 col-6">
                            <label>
                                <label>Answer</label>
                                <input type="text" name="txtAnswer" class="form-control" style="width:370px">
                            </label>
                        </div>
                    </div>            
                    <button type="submit" name="login" class="btn btn-success mt-3" style="width:760px">Register</button>
                </form>        
        </div>
    </div>
</body>
</html>
<html>