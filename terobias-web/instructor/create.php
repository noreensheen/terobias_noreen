<?php
include('.././conn.php');
if (isset($_POST['submit'])) {
    $fname = $_POST['firstN'];
    $lname = $_POST['lastName']; 
    $email = $_POST['email'];

    $sql = "INSERT INTO `instructor`(`firstN`, `lastName`, `email`) VALUES ('$fname', '$lname', '$email')";
    $result = mysqli_query($con, $sql);

    if($result) {
        header("Location: instructor.php?msg= New record added successfully!");
    }
    else {
        echo "Failed: " . mysqli_error($con);
    }
}

?>
<style>
        .navbar-custom .nav-item:hover, 
        #instructorNav {
            background-color: white;
           
        }
        .navbar-custom .nav-item:hover a,
        #instructorNav a {
            color: #2c6545 !important;
        }
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('.././head.php'); ?>
</head>
<body>
    <div class="d-flex">
        <?php include('.././sidebar.php'); ?>
        <main>
            <div class="container">
                <h1 class="text-center my-3">ADD NEW INSTRUCTOR</h1>
            </div> 
            <div class="row">
                <form method="POST">
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="firstN">First Name</label>
                            <input type="text" id="firstN" name="firstN" class="form-control" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" required/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="offset-sm-2 col-sm-3 d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a href="instructor.php" class="btn btn-outline-primary" role="button">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
    
</body>
</html>