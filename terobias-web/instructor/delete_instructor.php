<?php
include('conn.php');

if (isset($_GET['instructorID'])) {
    $id = $_GET['instructorID'];

    // JavaScript code to display a confirmation dialog
    echo '<script type="text/javascript">';
    echo 'if (confirm("Are you sure you want to delete this instructor?")) {';
    echo '   window.location.href = "delete.php?instructorID=' . $id . '";';
    echo '}';
    echo 'else {';
    echo '   window.location.href = "instructor.php?instructorID=' . $id . '";';
    echo '}';
    echo '</script>';
}
?>