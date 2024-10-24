<?php session_start();
require_once('../includes/config.php');

//Code for Registration 
if(isset($_POST['submit']))
{
    $orphanagename=$_POST['orphanagename'];
    $Govern_name=$_POST['Governorates'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contact=$_POST['contactno'];

    //$Govern_name=mysqli_query($con,"select Govern_id from Governorates where name='$Governorates'");

$sql=mysqli_query($con,"select id from orphanage where email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
    echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
    $msg=mysqli_query($con,"insert into orphanage(orphanagename,email,password,Govern_name,contactno,address) values('$orphanagename','$email','$password','$Govern_name','$contact','$address')");

if($msg)
{
    echo "<script>alert('Registered successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
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
        <title>User Signup</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.confirmpassword.value)
{
alert(' Password and Confirm Password field does not match');
document.signup.confirmpassword.focus();
return false;
}
return true;
} 

</script>

    </head>
    <body class="bg-light">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                    <h2 class="text-center text-success font-weight-light my-4">انشاء حساب</h2>
<hr />
                                    <h3 class="text-center text-success font-weight-light my-4"> دار ايتام </h3></div>


                                    <div class="card-body">
<form method="post" name="signup" onsubmit="return checkpass();">


                                            
<div class="form-floating mb-3 ">
 <input class="form-control " id="orphanagename" name="orphanagename" type="text" placeholder="ادخل الاسم " required />
 <label   for="inputorphanagename">ادخل دار الايتام </label>

</div>


<div class="row mb-3">

<div class="col-md-6">
        <div class="form-floating mb-3">
             <input  class="form-control" id="contact" name="contactno" type="text" placeholder="1234567890" required pattern="[0-9]{10}" title="11 numeric characters only"  maxlength="11" required />
             <label for="inputcontact">ادخل رقم التليفون </label>
        </div>
    </div>

        <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input  class="form-control" id="email" name="email" type="email" placeholder="phpgurukulteam@gmail.com" required />
                    <label  for="inputEmail">ادخل البريد الالكتروني </label>
                </div>
        </div>
</div>




<div class="row mb-3">
<div class="col-md-6">
          
                <div class="u-form-group u-form-select u-label-none u-form-group-1">
                    <label for="inputGovernorates" class="u-label u-label-1">ادخل المحافظة</label>
                    <div class="u-form-select-wrapper">
                        <select style="text-align: center;" id="Governorates" name="Governorates"  class="u-border-3 u-border-palette-1-dark-2 u-grey-5 u-input u-input-rectangle u-radius-17 u-text-palette-1-dark-3 u-input-1">
                                                            

                                            <?php
                                                                                    $query="select distinct(name) from governorates";
                                                                                    $run=mysqli_query($con,$query);
                                                                                    while($row=mysqli_fetch_array($run)) {
                                                                                    echo	"<option value=".$row['name'].">".$row['name']."</option>";
                                                                                    }
                                                                                ?>
                        </select>
                    </div>
                </div>
        
            
        </div>

    <div class="col-md-6">
         <div class="form-floating mb-3 mb-md-0">
            <input  class="form-control" id="address" name="address" type="text" placeholder="ادخل العنوان"  title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required/>
            <label   for="inputaddress"> العنوان </label>
        </div>
    </div>
</div>       




            <div class="row mb-3">
    <div class="col-md-6">
        <div class="form-floating mb-3 mb-md-0">
            <input  class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="تأكيد كلمة السر "  title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required />
            <label  for="inputPasswordConfirm">تأكيد كلمة السر </label>
        </div>
    </div>
    <div class="col-md-6">
         <div class="form-floating mb-3 mb-md-0">
            <input  class="form-control" id="password" name="password" type="password" placeholder=" انشاء كلمة سر "  title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required/>
            <label   for="inputPassword">ادخل كلمة السر</label>
        </div>
    </div>
</div>

<div class="mt-4 mb-0">
<div class="d-grid"><button type="submit" class="btn btn-success btn-block" name="submit">انشاء الحساب </button></div>
</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
 <div class="small"><a href="login.php">تسجيل الدخول</a></div>
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
        <script src="js/scripts.js"></script>
    </body>
</html>
