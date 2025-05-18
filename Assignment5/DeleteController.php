<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Remove-mentee'])) {

    $prn = $_POST['prn'];
    $check_prn = mysqli_query($conn, "SELECT * FROM `records` WHERE prn='$prn'");
    if (mysqli_num_rows($check_prn) == 0) {
        echo "<script>alert('PRN not found!'); window.history.back();</script>";
        exit();
    }
    
    $delete = mysqli_query($conn, "DELETE FROM `records` WHERE prn = '$prn';");

    if ($delete) {
        echo "<script>alert('Record Deleted Successfully')</script>";
        echo "<script>window.history.back();</script>";
    } else {
        echo "<script>alert('Delete Was Not Performed !!')</script>";
    }
}
?>