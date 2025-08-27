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
    <title>Maid Hiring Management System | Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/colors.css" />
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <style>
        .counter_section {
            height: 150px !important; /* Uniform height for all boxes */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .col-md-6.col-lg-3 {
            flex: 0 0 25% !important;
            max-width: 25% !important;
        }
    </style>
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
                                    <h2>Dashboard</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Dashboard Stat Boxes -->
                        <div class="row column1">
                            <!-- Total Category -->
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon"><i class="fa fa-file purple_color"></i></div>
                                    <div class="counter_no">
                                        <?php
                                        $sql1 = "SELECT * FROM tblcategory";
                                        $query1 = $dbh->prepare($sql1);
                                        $query1->execute();
                                        $totcat = $query1->rowCount();
                                        ?>
                                        <p class="total_no"><?php echo htmlentities($totcat); ?></p>
                                        <p class="head_couter">Total Category<br /><br />
                                            <a href="manage-category.php" class="btn btn-primary btn-sm">View Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Listed Maids -->
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon"><i class="fa fa-users yellow_color"></i></div>
                                    <div class="counter_no">
                                        <?php
                                        $sql2 = "SELECT * FROM tblmaid";
                                        $query2 = $dbh->prepare($sql2);
                                        $query2->execute();
                                        $totmaid = $query2->rowCount();
                                        ?>
                                        <p class="total_no"><?php echo htmlentities($totmaid); ?></p>
                                        <p class="head_couter">Listed Maids<br /><br />
                                            <a href="manage-maid.php" class="btn btn-primary btn-sm">View Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- New Requests -->
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon"><i class="fa fa-files-o yellow_color"></i></div>
                                    <div class="counter_no">
                                        <?php
                                        $sql3 = "SELECT * FROM tblmaidbooking WHERE Status='' OR Status IS NULL";
                                        $query3 = $dbh->prepare($sql3);
                                        $query3->execute();
                                        $newreq = $query3->rowCount();
                                        ?>
                                        <p class="total_no"><?php echo htmlentities($newreq); ?></p>
                                        <p class="head_couter">New Request<br /><br />
                                            <a href="new-request.php" class="btn btn-primary btn-sm">View Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Assign Request -->
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon"><i class="fa fa-files-o green_color"></i></div>
                                    <div class="counter_no">
                                        <?php
                                        $sql4 = "SELECT * FROM tblmaidbooking WHERE Status='Approved'";
                                        $query4 = $dbh->prepare($sql4);
                                        $query4->execute();
                                        $assreq = $query4->rowCount();
                                        ?>
                                        <p class="total_no"><?php echo htmlentities($assreq); ?></p>
                                        <p class="head_couter">Assign Request<br /><br />
                                            <a href="assign-request.php" class="btn btn-primary btn-sm">View Detail</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- More Stats -->
                        <div class="row column1">
                            <!-- Cancelled Requests -->
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon"><i class="fa fa-files-o red_color"></i></div>
                                    <div class="counter_no">
                                        <?php
                                        $sql5 = "SELECT * FROM tblmaidbooking WHERE Status='Cancelled'";
                                        $query5 = $dbh->prepare($sql5);
                                        $query5->execute();
                                        $canreq = $query5->rowCount();
                                        ?>
                                        <p class="total_no"><?php echo htmlentities($canreq); ?></p>
                                        <p class="head_couter">Canceled / Rejected Requests<br /><br />
                                            <a href="cancel-request.php" class="btn btn-primary btn-sm">View Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Requests -->
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon"><i class="fa fa-files-o purple_color"></i></div>
                                    <div class="counter_no">
                                        <?php
                                        $sql6 = "SELECT * FROM tblmaidbooking";
                                        $query6 = $dbh->prepare($sql6);
                                        $query6->execute();
                                        $totreq = $query6->rowCount();
                                        ?>
                                        <p class="total_no"><?php echo htmlentities($totreq); ?></p>
                                        <p class="head_couter">Total Request<br /><br /><br />
                                            <a href="all-request.php" class="btn btn-primary btn-sm">View Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Maid Status (Merged Approved and Rejected) -->
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon"><i class="fa fa-user yellow_color"></i></div>
                                    <div class="counter_no">
                                        <?php
                                        $sql7 = "SELECT * FROM tblmaid WHERE Status='Approved'";
                                        $query7 = $dbh->prepare($sql7);
                                        $query7->execute();
                                        $approvedMaids = $query7->rowCount();

                                        $sql9 = "SELECT * FROM tblmaid WHERE Status='Rejected'";
                                        $query9 = $dbh->prepare($sql9);
                                        $query9->execute();
                                        $rejectedMaids = $query9->rowCount();

                                        $totalStatus = $approvedMaids + $rejectedMaids;
                                        ?>
                                        <p class="total_no"><?php echo htmlentities($totalStatus); ?></p>
                                        <p class="head_couter">Maid Status<br /><br />
                                            <a href="manage-maid-status.php" class="btn btn-primary btn-sm">View Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- New Maid Requests (Renamed from Pending Maids) -->
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon"><i class="fa fa-hourglass-half yellow_color"></i></div>
                                    <div class="counter_no">
                                        <?php
                                        $sql8 = "SELECT * FROM tblmaid WHERE Status='Pending'";
                                        $query8 = $dbh->prepare($sql8);
                                        $query8->execute();
                                        $pendingMaids = $query8->rowCount();
                                        ?>
                                        <p class="total_no"><?php echo htmlentities($pendingMaids); ?></p>
                                        <p class="head_couter">New Maid Requests<br /><br />
                                            <a href="manage-pending-maids.php" class="btn btn-primary btn-sm">View</a>
                                        </p>
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

    <!-- Scripts -->
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
    <script src="js/chart_custom_style1.js"></script>
</body>
</html>
<?php } ?>