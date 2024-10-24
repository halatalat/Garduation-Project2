<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['empid']==0)) {
  header('location:logout.php');
  } else{
// for deleting user

if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from servicelist where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
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
        <title>Manage service | Registration and Login System</title>
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
              

                    <div class="container-fluid px-4" >
                        <h1 class="mt-4" style="text-align:center ;">إدارة الطلبات</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active "> إدارة الطلبات</li>
                        </ol>
                        <div class="row">
                            <div class="col-4">

                            </div>
                            <div class="col-4">
                                 <!-- <a href="add-service.php" class="btn btn-primary btn-round py-2  m-4" style="align:center"> إضافة خدمة  </a> -->

                            </div>
                            <div class="col-4">

                            </div>
                        </div>

            
                        <div class="card mb-4">
                            <div class="card-header" style="text-align:center ;">
                                    تفاصيل الخدمات        
                                    <i class="fas fa-table me-1"></i>

                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th> رفض </th>
                                  <th>قبول</th>
                                  <th>صورة البطاقه</th>
                                  <th>المستند</th>
                                  <th>حالة الطلب </th>
                                  <th> تاريخ التسليم</th>
                                  <th>السعر</th>
                                  <th>العميل</th>
                                  <th>نوع الخدمة</th>
                                  <th>اسم الخدمة</th>
                                  <th>الرقم</th>
                                        </tr>
                                    </thead>
                           
                                    <tbody>
                              <?php $ret=mysqli_query($con,"select * from orders");
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                              <td>
                                     <a name="refuse"  class="btn btn-warning" href="report-orders.php?orid=<?php echo $row['id'];?>&customer=<?php echo $row['customer'];?>">رفض</a>
                                  </td>
                              <td>
                                     
                                     <a name="accept" href="report-orders.php?id=<?php echo $row['id'];?>&customer=<?php echo $row['customer'];?>" class="btn btn-warning" > موافقه</a>   </td>
                                   
                                  <td><?php echo $row['nid'];?></td>
                                  <td><?php echo $row['document'];?></td> 
                                  <td><?php echo $row['stateoforder'];?></td>
                                  <td><?php echo $row['delDate'];?></td>
                                  <td><?php echo $row['price'];?></td> 
                                  <td><?php echo $row['customer'];?></td>
                                  <td><?php
                                    $typeid=$row['typeofserv'];
                                  $row1=mysqli_query($con,"select * from typeofservice where id='$typeid'");
                                  $row2=mysqli_fetch_array($row1);
                                     echo $row2['type'];
                                  ?></td>
                                  <td><?php echo $row['servname'];?></td> 
                                  <td><?php echo $cnt;?></td>

                              </tr>
                              <?php $cnt=$cnt+1; }?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>