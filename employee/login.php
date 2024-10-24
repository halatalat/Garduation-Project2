<?php session_start(); 
require_once('../includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['email'];
$ret= mysqli_query($con,"SELECT id,empEmail FROM employees WHERE empEmail='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{

//$_SESSION['id']=$num['id'];
$_SESSION['empid']=$num['id'];
header("location:dashboard.php");

//echo "<script>alert('login successfully');</script>";


}
else
{
echo "<script>alert('Invalid username or password');</script>";
}
}
?>

<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Login </title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">

<div class="card-header">


    <h3 class="text-center text-warning font-weight-light my-4">تسجيل الدخول </h3></div>
                                    <div class="card-body">
                                        
                                        <form method="post">
                                            
<div class="form-floating mb-3">
<input style="text-align:right" class="form-control" name="email" type="email" placeholder="البريد الالكتروني" required/>
<label for="inputEmail">البريد الالكتروني </label>
</div>
                                            

<div class="form-floating mb-3">
<input style="text-align:right" class="form-control" name="password" type="password" placeholder="كلمة السر" required />
<label for="inputPassword">كلمة السر</label>
</div>


<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<button class="btn btn-warning" name="login" type="submit">تسجيل الدخول</button>
<a class="small" href="password-recovery.php"> نسيت كلمة السر</a>
</div>
</form>
</div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="signup.php">انشاء حساب</a></div>
                                          <div class="small"><a href="index.php">الصفحة الرئيسية</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
