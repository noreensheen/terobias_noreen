<?php
include('.././conn.php');

if (isset($_GET['instructorID'])) {
    $id = $_GET['instructorID'];

    $sql = "DELETE FROM `instructor` WHERE `instructorID` = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:instructor.php');
    } else {
        die(mysqli_error($con));
    }
}
?>