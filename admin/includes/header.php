
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#"><span class='mlm'>Online Now</span> <i class="fa fa-circle" aria-hidden="true" style="color:#0eaf02"></i> </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">

                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php
                    $email = $_SESSION['alogin'];
                    $sql2 = "SELECT `username` FROM `admin` WHERE `email`=:email;";
                    $query = $dbh->prepare($sql2);
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                          
                        
                    
                    ?></span>
                    <input class="form-control" type="text"   readonly value="<?php echo $result->username; }}?> " />
                   
                </div>
                
           
            </form>
        </nav>
