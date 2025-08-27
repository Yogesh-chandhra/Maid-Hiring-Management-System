<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['mhmsaid'] == 0)) {
    header('location:logout.php');
    exit();
}

$maidid = intval($_GET['maidid']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Maid</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php include_once('includes/sidebar.php'); ?>
    <div class="content">
        <?php include_once('includes/header.php'); ?>

        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <h4 class="mb-4">Maid Details</h4>
                <div class="card">
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM tblmaid WHERE ID = :maidid";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':maidid', $maidid, PDO::PARAM_INT);
                        $query->execute();
                        $result = $query->fetch(PDO::FETCH_OBJ);
                        if ($result) {
                        ?>
                        <table class="table table-bordered">
                            <tr><th>Name</th><td><?php echo htmlentities($result->Name); ?></td></tr>
                            <tr><th>Category</th><td><?php echo htmlentities($result->Category); ?></td></tr>
                            <tr><th>Email</th><td><?php echo htmlentities($result->Email); ?></td></tr>
                            <tr><th>Mobile Number</th><td><?php echo htmlentities($result->MobileNumber); ?></td></tr>
                            <tr><th>Gender</th><td><?php echo htmlentities($result->Gender); ?></td></tr>
                            <tr><th>DOB</th><td><?php echo htmlentities($result->DOB); ?></td></tr>
                            <tr><th>Address</th><td><?php echo htmlentities($result->Address); ?></td></tr>
                            <tr><th>Status</th><td><span class="badge bg-primary"><?php echo htmlentities($result->Status); ?></span></td></tr>
                        </table>
                        <?php } else {
                            echo "<p>No Maid Found.</p>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once('includes/footer.php'); ?>
    </div>
</body>
</html>
