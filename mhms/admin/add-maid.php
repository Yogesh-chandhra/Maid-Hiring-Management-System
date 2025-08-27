<?php
session_start();
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $maidid = uniqid('maid_');
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
    $query->bindParam(':maidid', $maidid);
    $query->bindParam(':catid', $catid);
    $query->bindParam(':name', $name);
    $query->bindParam(':email', $email);
    $query->bindParam(':contact', $contact);
    $query->bindParam(':gender', $gender);
    $query->bindParam(':dob', $dob);
    $query->bindParam(':address', $address);

    if ($query->execute()) {
        echo "<script>alert('Maid Registered Successfully');</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Maid</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Register New Maid</h2>
    <form method="post">
        <div class="mb-3">
            <label>Category</label>
            <select name="category" class="form-control" required>
                <option value="">Select Category</option>
                <?php
                $sql = "SELECT * FROM tblcategory";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                foreach ($results as $row) {
                    echo "<option value='$row->ID'>$row->CategoryName</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contact Number</label>
            <input type="text" name="contact" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gender</label><br>
            <select name="gender" class="form-control" required>
                <option value="">Select</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="dob" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Register Maid</button>
    </form>
</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
