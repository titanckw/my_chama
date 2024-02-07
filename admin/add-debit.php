<?php
session_set_cookie_params(0);
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
header('location: login.php');
} else
include('db.php'); {
if (isset($_POST['submit'])) {

    
    $mid = $_POST['mid'];    
    $amount = $_POST['amount'];
    $status=1; 
    $date = $_POST['debit_date'];
    $refno=$_POST['refno'];
    $source=$_POST['source'];
    //$balance=$_POST['balance'];
    $status=1;
    $query=mysqli_query($con, "INSERT INTO debit (mid,amount,refno,source,debit_date,status) VALUES('$mid','$amount','$refno','$source',now(),'$status')");
    
    if ($query) {
    echo "<script>alert('Debit record  Added');</script>";
    echo "<script type='text/javascript'> document.location ='manage-debit.php'; </script>";
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Debit Record</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6"><label for="inputFirstName">Recipient</label>
                                                    <div class="form-floating mb-3 mb-md-0">                                                       
                                                        <select  name="mid" required>
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
                                                <div class="col-md-6"><label for="inputLastName">Debit Source</label>
                                                    <div class="form-floating">
                                                    <select name="source" id="cars">
  <option value="shares">Shares</option>
  <option value="total savings">Total Savings</option>
  <option value="payments">Payments</option>
</select>


                                                        
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-6"><label for="inputPassword">REFNO</label>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input type="text" name="refno" required class="form-control" placeholder="Enter REFNO" />
                                                        
                                                    </div>
                                                </div>


                                                <div class="col-md-6">    <label for="inputEmail">Amount</label>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input type="number" name="amount" class="form-control"  step="0.01" >
                                            


                                                    </div>
                                                </div>

                                                <div class="col-md-6"> <label for="creditdate">Record Date</label>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input type="date" name="credit_date" required class="form-control"  />
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" name="submit" class="btn btn-primary btn-block"></div>
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