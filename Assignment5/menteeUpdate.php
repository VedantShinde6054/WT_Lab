<?php
include 'config.php'; // Database connection file

$mentee = null; // Variable to store fetched mentee data

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fetch'])) {
    $prn = $_POST['prn'];

    // Fetch mentee details
    $query = "SELECT * FROM records WHERE prn='$prn'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $mentee = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('No record found for this PRN');</script>";
    }
}

// Handle update request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
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

    // Update query
    $update_query = "UPDATE records SET 
                    name='$name', dept='$dept', dob='$dob', class='$class',
                    contact='$contact', email='$email',
                    pname='$pname', pcontact='$pcontact',
                    mentor='$mentor' WHERE prn='$prn'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>setTimeout(\"location.href = 'menteeShow.php';\",200);</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Mentee</title>
    <link rel="stylesheet" href="assets/Update.css">
</head>
<body>
    <div class="mentee-container">
        <center>
            <h1 class="mentee-title">Update Mentee Record</h1>
            
            <form method="post">
                <label for="prn"><?php if(!$mentee){ echo "Enter the PRN NO. :";}else{ echo "Mentee PRN NO. :";}?></label>
                <input type="text" name="prn" required value="<?php if($mentee){ echo $mentee['prn'];}?>"><br>
                <button type="submit" name="fetch">Fetch Record</button>
                <a href="index.html"><input type="button" name="go-home" id="go-home" value="Go to home"></a>
            </form>

            <?php if ($mentee): ?>
            <form method="post">
                <input type="hidden" name="prn" value="<?= $mentee['prn'] ?>">
                <table>
                    <tr>
                        <td><label for="name">Mentee Name:</label></td>
                        <td><input type="text" name="name" value="<?= $mentee['name'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="dept">Department:</label></td>
                        <td><input type="text" name="dept" value="<?= $mentee['dept'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="dob">Date of Birth:</label></td>
                        <td><input type="date" name="dob" value="<?= $mentee['dob'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="class">Class:</label></td>
                        <td>
                            <select name="class">
                                <option value="<?= $mentee['class'] ?>" selected><?= $mentee['class'] ?></option>
                                <option value="First">First Year</option>
                                <option value="Second">Second Year</option>
                                <option value="Third">Third Year</option>
                                <option value="Btech">B.Tech</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="contact">Contact:</label></td>
                        <td><input type="number" name="contact" value="<?= $mentee['contact'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" name="email" value="<?= $mentee['email'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="prnt_name">Parent Name:</label></td>
                        <td><input type="text" name="prnt_name" value="<?= $mentee['pname'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="prnt_contact">Parent Contact:</label></td>
                        <td><input type="number" name="prnt_contact" value="<?= $mentee['pcontact'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="ch_mentor">Mentor:</label></td>
                        <td>
                            <select name="ch_mentor">
                                <option value="<?= $mentee['mentor'] ?>" selected><?= $mentee['mentor'] ?></option>
                                <option value="Mentor-1">Mentor-1</option>
                                <option value="Mentor-2">Mentor-2</option>
                                <option value="Mentor-3">Mentor-3</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="submit" name="update">Update Mentee</button>
                
            </form>
            <?php endif; ?>
        </center>
    </div>
</body>
</html>
