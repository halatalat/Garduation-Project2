<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Profile | Registration and Login System</title>
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
$userid=$_GET['uid'];
$query=mysqli_query($con,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4" style="text-align:center ;"><?php echo $result['fullName'];?></h1>
                        <div class="card mb-4">
                     
                            <div class="card-body">
                                <a href="edit-profile.php?uid=<?php echo $result['id'];?>">تعديل</a>
                                <table class="table table-bordered" dir="rtl">
                                   <tr>
                                    <th>الاسم</th>
                                       <td><?php echo $result['fullName'];?></td>
                                   </tr>
                                   <tr>
                                       <th>العنوان</th>
                                       <td><?php echo $result['address'];?></td>
                                   </tr>
                                 
                                     <tr>
                                       <th>المدينة</th>
                                       <td colspan="3"><?php echo $result['city'];?></td>
                                   </tr>
                                   <tr>
                                       <th>البريد الالكتروني</th>
                                       <td colspan="3"><?php echo $result['email'];?></td>
                                   </tr>
                                   <tr>
                                       <th> النوع</th>
                                       <td colspan="3"><?php echo $result['gender'];?></td>
                                   </tr>
                                        <tr>
                                       <th>تاريخ التسجيل</th>
                                       <td colspan="3"><?php echo $result['regDate'];?></td>
                                   </tr>
                                    </tbody>
                                </table>
                            </div>
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
