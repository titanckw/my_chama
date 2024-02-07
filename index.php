
<?php
session_set_cookie_params(0);
session_start();
include('includes/config.php');
include('db.php');
if (strlen($_SESSION['login']) == 0) {
header('location: login.php');
} else {?>

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
<div class="container-fluid px-4">

<h1 class="mt-4">Dashboard</h1>


<?php
$sql = "SELECT SUM(amount) as total from savings where status=0";
$result = $con->query($sql);
while($row = mysqli_fetch_array($result)){
echo '  
<div class="row">
<div class="col-xl-3 col-md-6">
<div class="card bg-primary text-white mb-4">
<div class="card-body">Active Savings</div>
<div class="card-footer d-flex align-items-center justify-content-between">
<a class="small text-white stretched-link" href="active-savings.php">KSH.'.$row['total'].'  </a>
<div class="small text-white"><i class="fas fa-angle-right"></i></div>
</div>
</div>
</div>
'; 

}
//$con->close();
?>

<?php
$email1 = $_SESSION['login'];
$sql1 = "SELECT `id` FROM `users` WHERE `email`=:email1";
$query1 = $dbh->prepare($sql1);
$query1->bindParam(':email1', $email1, PDO::PARAM_STR);
$query1->execute();
$results1 = $query1->fetchAll(PDO::FETCH_OBJ);
if ($query1->rowCount() > 0) {
foreach ($results1 as $result1) {
$uid = $result1->id;
}
}

$status = 0;
$sql = "SELECT * FROM loans WHERE  loans.status=:status and loans.userid=:uid  ";
$query = $dbh->prepare($sql);
$query->bindParam(':uid', $uid, PDO::PARAM_STR);
$query->bindParam(':status', $status, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$activeloans = $query->rowCount();
?>





<div class="col-xl-3 col-md-6">
<div class="card bg-primary text-white mb-4">
<div class="card-body">My Active Loans</div>
<div class="card-footer d-flex align-items-center justify-content-between">
<a class="small text-white stretched-link" href="active-loans.php"><?php echo htmlentities($activeloans); ?></a>
<div class="small text-white"><i class="fas fa-angle-right"></i></div>
</div>
</div>
</div>

<?php
$email1 = $_SESSION['login'];
$sql1 = "SELECT `id` FROM `users` WHERE `email`=:email1";
$query1 = $dbh->prepare($sql1);
$query1->bindParam(':email1', $email1, PDO::PARAM_STR);
$query1->execute();
$results1 = $query1->fetchAll(PDO::FETCH_OBJ);
if ($query1->rowCount() > 0) {
foreach ($results1 as $result1) {
$uid = $result1->id;
}
}

$status = 2;
$sql = "SELECT * FROM loans WHERE  loans.status=:status and loans.userid=:uid order by loans.id desc ";
$query = $dbh->prepare($sql);
$query->bindParam(':uid', $uid, PDO::PARAM_STR);
$query->bindParam(':status', $status, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$paidloans = $query->rowCount();
?>

<div class="col-xl-3 col-md-6">
<div class="card bg-warning text-white mb-4">
<div class="card-body">Paid Loans History</div>
<div class="card-footer d-flex align-items-center justify-content-between">
<a class="small text-white stretched-link" href="cleared-loans.php"><?php echo htmlentities($paidloans); ?></a>
<div class="small text-white"><i class="fas fa-angle-right"></i></div>
</div>
</div>
</div>


<?php
$email1 = $_SESSION['login'];
$sql1 = "SELECT `id` FROM `users` WHERE `email`=:email1";
$query1 = $dbh->prepare($sql1);
$query1->bindParam(':email1', $email1, PDO::PARAM_STR);
$query1->execute();
$results1 = $query1->fetchAll(PDO::FETCH_OBJ);
if ($query1->rowCount() > 0) {
foreach ($results1 as $result1) {
$uid = $result1->id;
}
}

$status = 3;
$sql = "SELECT * FROM loans WHERE  loans.status=:status and loans.userid=:uid order by loans.id desc ";
$query = $dbh->prepare($sql);
$query->bindParam(':uid', $uid, PDO::PARAM_STR);
$query->bindParam(':status', $status, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$paidloans = $query->rowCount();
?>

<div class="col-xl-3 col-md-6">
<div class="card bg-danger text-white mb-4">
<div class="card-body">Pending Loans</div>
<div class="card-footer d-flex align-items-center justify-content-between">
<a class="small text-white stretched-link" href="appended-loans.php"><?php echo htmlentities($paidloans); ?></a>
<div class="small text-white"><i class="fas fa-angle-right"></i></div>
</div>
</div>
</div>


</div>

</main>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>
<?php }?>