<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Patient Management System</h2>
    
    <form action="process.php" method="POST">
        <input type="text" name="name" placeholder="Patient Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <input type="text" name="contact" placeholder="Contact" required>
        <button type="submit" name="add_patient">Add Patient</button>
    </form>

    <h3>Patient List</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM patients";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['contact']}</td>
                    <td><a href='process.php?delete_patient={$row['id']}'>Delete</a></td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
