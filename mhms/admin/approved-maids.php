<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['mhmsaid'] == 0)) {
    header('location:logout.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Approved Maids</title>
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
                <h4 class="mb-4">Approved Maids</h4>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Maid Name</th>
                                    <th>Category</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM tblmaid WHERE Status = 'Approved'";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                foreach ($results as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($row->Name); ?></td>
                                        <td><?php echo htmlentities($row->Category); ?></td>
                                        <td><?php echo htmlentities($row->Email); ?></td>
                                        <td><?php echo htmlentities($row->MobileNumber); ?></td>
                                        <td><?php echo htmlentities($row->Gender); ?></td>
                                        <td><span class="badge bg-success"><?php echo htmlentities($row->Status); ?></span></td>
                                        <td><a href="manage-maid.php?maidid=<?php echo htmlentities($row->ID); ?>" class="btn btn-info btn-sm">View</a></td>
                                    </tr>
                                    <?php
                                    $cnt++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once('includes/footer.php'); ?>
    </div>
</body>
</html>
