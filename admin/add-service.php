<?php session_start();
require_once('../includes/config.php');

//Code for Registration 
if(isset($_POST['submit']))
{   

  
    $servname=$_POST['servname'];
    $type=$_POST['type'];
    $detail=$_POST['detail'];
    $price=$_POST['price'];
    $requirement=$_POST['document'];

$sql=mysqli_query($con,"select id from servicelist where servname='$servname'  ");
$row=mysqli_num_rows($sql);
if($row>0)
{
    echo "<script>alert('service is exist');</script>";
} else{

    $msg=mysqli_query($con,"insert into servicelist(servname,detail,typeid,document,price) values('$servname','$detail','$type','$requirement','$price')");

if($msg)
{
    echo "<script>alert('addition successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'manage-service.php'; </script>";
}
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
        <title>Between Dates report date selection | Registration and Login System</title>
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
                        

                        <h1 class="mt-4" style="text-align:center ;">اضافة خدمه</h1>
                        <div class="card mb-4">
                     <form method="post" name="addition"  >
                            <div class="card-body">
                                <table class="table table-bordered " dir="rtl">
                        
                                   <th> اسم الخدمة</th>
                                       <td><input class="form-control" id="servname" name="servname" type="text" value="" required /></td>
                                   </tr>
                                   <tr>
                                       <th>سعر الخدمة </th>
                                       <td><input class="form-control" id="price" name="price" type="text" value=""  required /></td>
                                   </tr>
                                   <tr>
                                       <th>نوع الخدمة </th>
                                       <td>
                                       <select class="form-control"  name="type">
                                                    <option selected>إختر نوع الخدمة </option>
                                                    <?php
																			$query="select * from typeofservice";
																			$run=mysqli_query($con,$query);
																			while($row=mysqli_fetch_array($run)) {
																			echo	"<option value=".$row['id'].">".$row['type']."</option>";
																			}
																		?>
                                                          </select>
                                    </td>
                                   </tr>
                                   <tr>
                                       <th>  متطلبات الخدمة </th>
                                       <td><input class="form-control" id="document" name="document" type="text" value=""  required /></td>

                                   </tr>
                                   <tr>
                                       <th> تفاصيل الخدمة </th>
                                       <td><input class="form-control" id="detail" name="detail" type="text" value=""  required /></td>

                                   </tr>
                               

                                       <tr>
                                    
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-warning btn-block" name="submit">حفظ</button></td>

                                   </tr> 
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>


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

<?php  ?>
