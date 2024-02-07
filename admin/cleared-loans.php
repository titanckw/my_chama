
<?php
session_set_cookie_params(0);
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location: login.php');
} else {
    
    
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

</head>
<body class="sb-nav-fixed">
    <div id="layoutSidenav">

    <?php include('includes/header.php');?>

<?php include('includes/sidebar.php');?>



            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                   

                                               <div class="card mb-4">
                            <div class="card-header">
                               
                            <a href="" id="create_new" align="right" class="btn btn-sm btn-primary">Paid Loans</a>
                            
                            </div>
                              <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                            <th>Member</th>
                                            <th>Cleared Date</th>
                                            <th>Details</th>   
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                        <th>Member</th>
                                        <th>App Date</th>
                                            <th>Details</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    
                                    $sql = "SELECT loans.*, users.fname, users.lname from loans INNER JOIN users on users.id=loans.userid and loans.`status`=2";
                                       
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {
                                             ?>
										
                                        <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                    
                                    <td><?php echo htmlentities($result->fname); ?> <?php echo htmlentities($result->lname); ?></td>                                 
                                                                   
                                    <td><?php echo htmlentities($result->created_date); ?></td>
                                    <td>
                                        <p><span style="color:green; font-size:15px;"><?php echo htmlentities($result->amount); ?> Shillings</span>
                                   <small><?php echo htmlentities($result->loan_plan); ?>
                                </small><span style="color:red; font-size:15px;">months</span> </p> </td>
	
  
    
    
                                        </tr>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>


            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>