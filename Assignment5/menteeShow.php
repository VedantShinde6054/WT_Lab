<?php
include 'config.php'; 

$select = mysqli_query($conn, "SELECT * FROM records"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Mentee</title>
    </style>
    <link rel="stylesheet" href="assets/Display.css">
</head>
<body>
    <div class="mentee-container">
        <center>
            <h1 class="mentee-title">All Mentee Records</h1>

            <?php if(mysqli_num_rows($select) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>PRN No.</th>
                            <th>Name</th>
                            <th>Dept</th>
                            <th>DOB</th>
                            <th>Class</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Parent Name</th>
                            <th>Parent Contact</th>
                            <th>Mentor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($select)): ?>
                            <tr>
                                <td><?php echo $row['prn']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['dept']; ?></td>
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['class']; ?></td>
                                <td><?php echo $row['contact']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['pname']; ?></td>
                                <td><?php echo $row['pcontact']; ?></td>
                                <td><?php echo $row['mentor']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No records found.</p>
            <?php endif; ?>
            <div class="button-container">
                <a href="index.html"><button class="nav-btn">Go to Home</button></a>
                <a href="menteeAdd.html"><button class="nav-btn">Add Mentee</button></a>
                <a href="menteeDel.html"><button class="nav-btn">Remove Mentee</button></a>
            </div>
        </center>
    </div>
</body>
</html>
