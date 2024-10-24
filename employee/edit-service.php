<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation 
if(isset($_POST['update']))
{
   
    $servname=$_POST['servname'];
    $type=$_POST['type'];
    $detail=$_POST['detail'];
    $price=$_POST['price'];
    $requirement=$_POST['requirement'];
    $servid=$_GET['servid'];
    $msg=mysqli_query($con,"update servicelist set servname='$servname',detail='$detail',type='$type',price='$price',requirement='$requirement' where id='$servid'");

if($msg)
{
    echo "<script>alert('service updated successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'manage-service.php'; </script>";
}
}


    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Profile | Registration and Login System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                            <?php 
                            $servid=$_GET['servid'];
                            $query=mysqli_query($con,"select * from servicelist where id='$servid'");
                            while($result=mysqli_fetch_array($query))
                            {?>
                        <h1 class="mt-4"><?php echo $result['servname'];?>تعديل الخدمة</h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered" dir="rtl">
                                   <tr>
                                    <th>اسم الخدمة</th>
                                       <td><input class="form-control" id="servname" name="servname" type="text" value="<?php echo $result['servname'];?>" required /></td>
                                   </tr>
                                   <tr>
                                       <th>التفاصيل </th>
                                       <td><input class="form-control" id="type" name="type" type="text" value="<?php echo $result['type'];?>"  required /></td>
                                   </tr>
                                         <tr>
                                       <th>النوع</th>
                                       <td colspan="3"><input class="form-control" id="detail" name="detail" type="text" value="<?php echo $result['detail'];?>"  required /></td>
                                   </tr>
                                   <tr>
                                       <th>المتطلبات</th>
                                       <td colspan="3"><input class="form-control" id="requirement" name="requirement" type="text" value="<?php echo $result['requirement'];?>"  required /></td>
                                   </tr>
                               
                                     
                                   <tr>
                                       <th>السعر</th>
                                       <td colspan="3"><input class="form-control" id="price" name="price" type="text" value="<?php echo $result['price'];?>"  required /></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">تحديث</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
<?php } ?>

                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
