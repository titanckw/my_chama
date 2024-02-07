<?php
session_set_cookie_params(0);
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
header('location: login.php');
} else
include('db.php'); {
if (isset($_POST['submit'])) {
$months= $_POST['months'];
$rate = $_POST['rate']; 
$penalty_rate = $_POST['penalty_rate'];   
$date = $_POST['creationdate'];
$status=1;
$query=mysqli_query($con, "INSERT INTO plans (months,rate,penalty_rate,creationdate,status) VALUES('$months','$rate','$penalty_rate',now(),'$status')");

if ($query) {
echo "<script>alert('Interest Plan  added');</script>";
echo "<script type='text/javascript'> document.location ='manage-interest.php'; </script>";
} else{
echo "<script>alert('Something Went Wrong. Please try again');</script>";
}}}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>SMS</title>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="css/styles.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">
<div id="layoutSidenav">

<?php include('includes/header.php');?>

<?php include('includes/sidebar.php');?>



<div id="layoutSidenav_content">
<main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Interest Plan</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" required name="months" type="number" />
                                                        <label>Plan<span class="required">-months</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                    <input type="number" name="rate" step="any" min="1" max="4" required 
                                                     class="form-control"  />
                                                        <label>Rate<span class="required">-%</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control"  
                                                         type="number" name="penalty_rate" step="any" min="1" max="4" required>
<label>Overdue Penalty<span class="required">-%</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" class="btn btn-primary" valu="Submit" name="submit"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


</div>
</div>


<script>
function multiplyBy()
{
num1 = document.getElementById("firstNumber").value;
num2 = document.getElementById("secondNumber").value;
num3 = document.getElementById("thirdNumber").value;
document.getElementById("result").innerHTML = num1 * num2 * num3;
}

function divideBy() 
{ 
num1 = document.getElementById("firstNumber").value;
num2 = document.getElementById("secondNumber").value;
document.getElementById("result").innerHTML = num1 / num2;
}



function sumBy() 
{ 
num1 = document.getElementById("firstNumber").value;
document.getElementById("result1").innerHTML = num1 + num1 * num2 * num3;
}

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>