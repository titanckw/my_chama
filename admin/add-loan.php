<?php
session_set_cookie_params(0);
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
header('location: login.php');
} else
include('db.php'); {
if (isset($_POST['submit'])) {
$userid=$_POST['userid'];
//$fname = $_POST['fname'];
$amount = $_POST['amount'];
$loan_plan=$_POST['loan_plan'];    
//$contact = $_POST['contact'];
$date=$_POST['created_date'];
$status=0;
$query=mysqli_query($con, "INSERT INTO loans (userid,loan_plan,amount,created_date,status) VALUES('$userid','$loan_plan','$amount',now(),'$status')");

if ($query) {
echo "<script>alert('Loan Application successfull.');</script>";
echo "<script type='text/javascript'> document.location ='manage-loans.php'; </script>";
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
<div class="card-header"><h3 class="text-center font-weight-light my-4">Create New Loan Application</h3></div>
<div class="card-body">
<form method="post">
<div class="row mb-3">
<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<select  name="userid" required>
<option value="">Select Member </option>
<?php $ret="select id, fname,lname from users";
$query= $dbh -> prepare($ret);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->fname);?><?php echo htmlentities($result->lname);?></option>
<?php }} ?>

</select>            
</div>
</div>
<div class="col-md-6">
<div class="form-floating">
<input type="number" name="amount" min="100" max="6000" required 
class="form-control" id="inputLastName" />
<label><span class="required">Amount</span</label>
</div>
</div>
</div>
<div class="row mb-3">
<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">

<select  name="loan_plan" required>
<option value="">Select Loan  Plan </option>
<?php $ret="select * from plans";
$query= $dbh -> prepare($ret);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->months);?></option>
<?php }} ?>

</select>

</div>
</div>
<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input type="date" name="created_date" required   class="form-control"   />

<label for="inputPasswordConfirm">APP Date</label>
</div>
</div>
</div>
<div class="mt-4 mb-0">
<div class="d-grid"><input type="submit" name="submit" class="btn btn-primary btn-block"></a></div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>