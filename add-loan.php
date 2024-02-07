<?php
session_set_cookie_params(0);
session_start();
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
header('location: login.php');
} else
include('db.php'); {
if (isset($_POST['submit'])) {
//$mid=$_POST['mid'];
//$refno = $_POST['refno'];
$amount = $_POST['amount'];
$loan_plan=$_POST['loan_plan'];    
$username=$_POST['username'];
$date=$_POST['created_date'];
$email3 = $_SESSION['login'];

$sql3 = "SELECT `id` FROM `users` WHERE `email`=:email3";
$query3 = $dbh->prepare($sql3);
$query3->bindParam(':email3', $email3, PDO::PARAM_STR);
$query3->execute();
$results3 = $query3->fetchAll(PDO::FETCH_OBJ);
if ($query3->rowCount() > 0) {
foreach ($results3 as $result3) {
$uid = $result3->id;
}
}

$status=1;
$query=mysqli_query($con, "INSERT INTO loans (userid,loan_plan,amount,created_date,status) VALUES('$uid','$loan_plan','$amount', now(),'$status')");

if ($query) {
echo "<script>alert('Loan Application successfull.');</script>";
echo "<script type='text/javascript'> document.location ='manage-loans.php'; </script>";
} else{
echo "<script>alert('Something Went Wrong. Please try again');</script>";
}
}}

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

<?php
$email = $_SESSION['login'];
$sql2 = "SELECT fname,lname,id FROM users WHERE email=:email ";
$query = $dbh->prepare($sql2);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
foreach ($results as $result2) {
$username = $result2->fname . " " . $result2->lname;
?>




<main>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-7">
<div class="card shadow-lg border-0 rounded-lg mt-5">
<div class="card-header"><h3 class="text-center font-weight-light my-4">Create New Loan Application</h3></div>
<div class="card-body">
<form method="post">
<div class="row mb-3">
<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input class="form-control"  required type="hidden"  name="username" value="<?php echo htmlentities($username); ?>" />
<input type="number" name="loan_plan" min="1" max="6"  class="form-control" required />
<label for="inputFirstName">Loan Plan <span class="required">months</span></label>
</div>
</div>
<div class="col-md-6">
<div class="form-floating">
<input type="number" name="amount" min="100" max="6000"  class="form-control" required />

<label for="inputLastName">Loan Amount</label>
</div>
</div>
</div>

<div class="row mb-3">
<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input type="date" name="created_date" required  class="form-control" />
<label for="inputPassword">APPlication Date </label>
</div>
</div>

</div>
<div class="mt-4 mb-0">
<div class="d-grid"><input class="btn btn-primary btn-block" type="submit" name="submit" value="Submit" /></div>
</div>
</form>
</div>

</div>
</div>
</div>
</div>
</main>
<?php }} ?>
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