<?php include 'config/db.php'; ?>

<?php
if (isset($_POST['add_patient'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO patients (name, age, gender, contact) VALUES ('$name', '$age', '$gender', '$contact')";
    $conn->query($sql);
    header("Location: index.php");
}

if (isset($_GET['delete_patient'])) {
    $id = $_GET['delete_patient'];
    $sql = "DELETE FROM patients WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
}
?>
