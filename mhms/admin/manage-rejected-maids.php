<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['mhmsaid'] == 0)) {
    header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MHMS | Manage Rejected Maids</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/colors.css" />
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <link rel="stylesheet" href="css/custom.css" />
</head>
<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <?php include_once('includes/sidebar.php'); ?>
            <div id="content">
                <?php include_once('includes/header.php'); ?>
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Manage Rejected Maids</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Rejected Maids List</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Maid Name</th>
                                                        <th>Mobile Number</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Registration Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM tblmaid WHERE Status='Rejected'";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo htmlentities($cnt); ?></td>
                                                        <td><?php echo htmlentities($row->Name); ?></td>
                                                        <td><?php echo htmlentities($row->MobileNumber); ?></td>
                                                        <td><?php echo htmlentities($row->Email); ?></td>
                                                        <td><span class="badge badge-danger"><?php echo htmlentities($row->Status); ?></span></td>
                                                        <td><?php echo htmlentities($row->RegDate); ?></td>
                                                        <td>
                                                            <a href="view-maid-detail.php?viewid=<?php echo htmlentities($row->ID); ?>" class="btn btn-info btn-sm">View</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $cnt++;
                                                        }
                                                    } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="7" style="color:red; text-align:center;">No rejected maids found</td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php include_once('includes/footer.php'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/analyser.js"></script>
    <script src="js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <script src="js/custom.js"></script>
</body>
</html>
<?php } ?>
