<?php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Add-mentee'])) {

    $prn = $_POST['prn'];
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $pname = $_POST['prnt_name'];
    $pcontact = $_POST['prnt_contact'];
    $mentor = $_POST['ch_mentor'];

    $insert = mysqli_query($conn, "INSERT INTO `records`VALUES('$prn', '$name', '$dept' , '$dob' , '$class' , '$contact' , '$email' , '$pname' , '$pcontact' , '$mentor' )");

    if ($insert) {
        echo "<script>alert('Record Added Successfully')</script>";
        echo "<script>setTimeout(\"location.href = 'menteeAdd.html';\",200);</script>";
    } else {
        echo "<script>alert('Record Insertion Failed')</script>";
    }
}
?>