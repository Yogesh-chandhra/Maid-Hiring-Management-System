<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['mhmsaid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $maidid = mt_rand(100000000, 999999999);
        $catid = $_POST['category'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];

        $sql = "INSERT INTO tblmaid (MaidId, CatID, Name, Email, ContactNumber, Gender, DOB, Address)
                VALUES (:maidid, :catid, :name, :email, :contact, :gender, :dob, :address)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':maidid', $maidid, PDO::PARAM_STR);
        $query->bindParam(':catid', $catid, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':contact', $contact, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Maid Registered Successfully');</script>";
        echo "<script>window.location.href ='manage-maid.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Maid - MHMS</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/colors.css" />
    <link rel="stylesheet" href="css/custom.css" />
</head>
<body class="inner_page form_page">
    <div class="full_container">
        <div class="inner_container">
            <?php include_once('includes/sidebar.php'); ?>
            <div id="content">
                <?php include_once('includes/header.php'); ?>
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title"><h2>Add Maid</h2></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head"><h2>Maid Registration Form</h2></div>
                                    <div class="full price_table padding_infor_info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form method="post">
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <select class="form-control" name="category" required>
                                                            <option value="">Select Category</option>
                                                            <?php
                                                            $sql = "SELECT * FROM tblcategory";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            foreach ($results as $row) {
                                                            ?>
                                                                <option value="<?php echo htmlentities($row->ID); ?>">
                                                                    <?php echo htmlentities($row->CategoryName); ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group"><label>Name</label><input type="text" class="form-control" name="name" required></div>
                                                    <div class="form-group"><label>Email</label><input type="email" class="form-control" name="email" required></div>
                                                    <div class="form-group"><label>Contact Number</label><input type="text" class="form-control" name="contact" required></div>
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="gender" required>
                                                            <option value="">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group"><label>Date of Birth</label><input type="date" class="form-control" name="dob" required></div>
                                                    <div class="form-group"><label>Address</label><textarea class="form-control" name="address" required></textarea></div>
                                                    <button type="submit" class="btn btn-primary" name="submit">Register Maid</button>
                                                </form>
                                            </div>
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
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>

<?php } ?>
