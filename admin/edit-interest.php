<?php
session_set_cookie_params(0);
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location: login.php');
} else {   
    if (isset($_POST['submit'])) {
        $months = $_POST['months'];        
        $rate = $_POST['rate']; 
               
        $penalty_rate = $_POST['penalty_rate']; 
        $id = intval($_GET['id']);

        $sql = "UPDATE `plans` SET months=:months,rate=:rate,penalty_rate=:penalty_rate WHERE id=:id ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':months', $months, PDO::PARAM_STR);        
        $query->bindParam(':rate', $rate, PDO::PARAM_STR);              
        $query->bindParam(':penalty_rate', $penalty_rate, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Details changed successfully');document.location = 'manage-interest.php';</script>";
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
               
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Interest Plans</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                        <?php
                                                $id = intval($_GET['id']);
                                                $sql="SELECT * from plans where plans.id=:id";
                                                 $query = $dbh->prepare($sql);
                                                $query->bindParam(':id', $id, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                foreach ($results as $result) { ?>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" type="number" name="months" value="<?php echo htmlentities($result->months); ?>" required />
                                                        <label>Plan<span class="required">-months</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" type="number" name="rate" step="any" min="1" max="4"  value="<?php echo htmlentities($result->rate); ?>" required />
                                                       
<label>Rate<span class="required">-%</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" type="number" name="penalty_rate" value="<?php echo htmlentities($result->penalty_rate); ?>" step="any" min="1" max="4" required  />
                                                        
<label>Overdue Penalty<span class="required">-%</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block"/>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        
<?php } }?>

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