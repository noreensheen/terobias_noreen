<?php

include('.././conn.php');

if (isset($_GET['instructorID'])) {
$id = $_GET['instructorID'];
$sql = "SELECT * FROM `instructor` Where instructorID = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
 if(!$row) {
    header('instructor.php');
 }
}
else{
    header('instructor.php');
}
if (isset($_POST['submit'])) {
    $fname = $_POST['firstN'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $id = $_GET['instructorID'];


    $sql = "UPDATE `instructor` SET `firstN`='$fname',`lastName`='$lname',`email`='$email' WHERE `instructorID` = $id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Location: instructor.php?msg=Record updated successfully!");
        exit();
    } else {
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
            <h1 class="text-center my-3">UPDATE INSTRUCTOR INFORMATION</h1>
            <div class="row">
                <form method="POST">
                <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <input type="hidden" id="instructorID" name="instructorID" value="<?php echo $row['instructorID'] ?>" class="form-control" required/>
                        </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstN" name="firstN" value="<?php echo $row['firstN'] ?>" class="form-control" required/>
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" required value="<?php echo $row['lastName'] ?>" />
                        </div>
                    </div>
                    <div class="mx-5 mt-3 col-sm-12 col-lg-9">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="offset-sm-2 col-sm-3 d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
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