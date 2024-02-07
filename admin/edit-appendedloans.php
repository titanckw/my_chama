<?php
session_set_cookie_params(0);
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location: login.php');
} else {   
    if (isset($_POST['submit'])) {

        $refno = $_POST['refno'];
        $amount= $_POST['amount'];        
        $loan_plan=$_POST['loan_plan'];        
        $id = intval($_GET['id']);

        $sql = "UPDATE `loans` SET refno=:refno,amount=:amount,loan_plan=:loan_plan WHERE id=:id ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':refno', $refno, PDO::PARAM_STR);
        $query->bindParam(':amount', $amount, PDO::PARAM_STR);
        $query->bindParam(':loan_plan', $loan_plan, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Loan updated successfully');document.location = 'appended-loans.php';</script>";
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
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Loan Details</h3></div>
                                    <div class="card-body">
                                        <form action="#" method="post">
                                        <?php
                    $id = intval($_GET['id']);
                    $sql = "SELECT loans.* from loans WHERE loans.id=:id";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                    foreach ($results

                    as $result) { ?>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                   
                                                        <input class="form-control" name="refno" id="inputPassword" required type="text" value="<?php echo htmlentities($result->refno);?>" />
                                                        <label for="inputPassword">REFNO</label>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                   
                                                        <input class="form-control" name="amount" required  min="100" max="4000" value="<?php echo htmlentities($result->amount); ?>" />
                                                        <label for="inputPassword">Amount</label>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" min="1" max="8" required type="number" value="<?php echo htmlentities($result->loan_plan);}}?>" name="loan_plan" />
                                                        <label for="inputPassword">Loan Plan <span class="required">months</span></label>
                                                    </div>
                                                </div></div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-sm" name="submit" type="submit"></div>
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