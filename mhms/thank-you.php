<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Successful</title>
    <meta http-equiv="refresh" content="8;url=index.php"> <!-- Redirect after 8 seconds -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .thank-you-box {
            margin-top: 100px;
            background: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }
        .thank-you-box h2 {
            color: green;
        }
        .maid-id {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php include('includes/header.php'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 thank-you-box text-center">
                <h2>✅ Registration Successful!</h2>
                <p>Thank you for registering as a maid.</p>
                
                <?php if (isset($_GET['maidid'])): ?>
                    <div class="maid-id">
                        Your Maid ID is: <span style="color:blue;"><?php echo htmlentities($_GET['maidid']); ?></span>
                    </div>
                <?php endif; ?>

                <p class="mt-3">We'll contact you soon. Redirecting to homepage...</p>
                <a href="index.php" class="btn btn-primary mt-3">Go to Home Now</a>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
