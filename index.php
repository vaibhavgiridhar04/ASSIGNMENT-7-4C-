<?php 
require_once 'controllers/authController.php';

if(!isset($_SESSION['id'])){
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Homepage</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">

            <?php if(isset($_SESSION['message'])): ?>
                <div class="alert <?php echo $_SESSION['alert-class'];?> ">
                    <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    unset($_SESSION['alert-class']);
                    ?>
                </div>
            <?php endif; ?>

                <h3>Welcome, <?php echo $_SESSION['username'];?> </h3>
                <a href="index.php?logout=1" class="logout">logout</a>
                
                <?php if(!$_SESSION['verified']): ?>
                <div class="alert alert-warning">
                    You need to verify your account.
                    Sign in to your email accounnt and click on the verification link we just emailed you at <strong><?php echo $_SESSION['email'];?> </strong> 
                <?php endif; ?>    
                
                <?php if($_SESSION['verified']): ?>
                </div>
                <button class="btn btn-block btn-lg btn-primary"> I am verified</button>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</body>
</html>