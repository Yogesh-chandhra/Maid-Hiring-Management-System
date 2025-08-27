<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $catid = $_POST['catid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contno = $_POST['contno'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $maidid = mt_rand(100000000, 999999999);

    try {
        $sql = "INSERT INTO tblpendingmaids (CategoryID, MaidID, Name, Email, MobileNumber, Gender, DOB, Address) 
                VALUES (:catid, :maidid, :name, :email, :contno, :gender, :dob, :address)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':catid', $catid, PDO::PARAM_STR);
        $query->bindParam(':maidid', $maidid, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':contno', $contno, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->execute();

        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo '<script>alert("Maid registration submitted for admin approval!")</script>';
            echo "<script>window.location.href ='thank-you.php?maidid=$maidid'</script>";
        } else {
            echo '<script>alert("Something went wrong. Please try again.")</script>';
        }
    } catch (Exception $e) {
        echo '<script>alert("Error: '.$e->getMessage().'")</script>';
    }
}
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <title>Maid Hiring Management System || Be a Maid</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include_once('includes/header.php'); ?>

    <!-- Hero Area Start -->
    <div class="slider-area">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background="assets/img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Be a Maid</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Section Start -->
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="contact-title text-primary">Register as a Maid</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="" method="post">
                        <div class="form-group">
                            <label class="text-danger font-weight-bold">Category:</label>
                            <select name="catid" class="form-control" required>
                                <option value="">Select Category</option>
                                <?php
                                $sql = "SELECT * FROM tblcategory";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                foreach ($results as $row) {
                                    echo '<option value="'.htmlentities($row->ID).'">'.htmlentities($row->CategoryName).'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-danger font-weight-bold">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label class="text-danger font-weight-bold">Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label class="text-danger font-weight-bold">Contact Number:</label>
                            <input type="text" name="contno" class="form-control" placeholder="Enter Contact Number" required maxlength="10" pattern="[0-9]+">
                        </div>
                        <div class="form-group">
                            <label class="text-danger font-weight-bold">Gender:</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-danger font-weight-bold">Date of Birth:</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="text-danger font-weight-bold">Address:</label>
                            <textarea name="address" class="form-control" placeholder="Enter Address" required></textarea>
                        </div>
                        <div class="form-group text-center mt-4">
                            <button type="submit" name="submit" class="btn btn-primary px-5 py-2">Register Maid</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>

    <!-- JS -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
