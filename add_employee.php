<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'db.php';

$name = $email = $position = $salary = "";
$error = "";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $position = trim($_POST['position']);
    $salary = trim($_POST['salary']);

    if (empty($name) || empty($email) || empty($position) || empty($salary)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } elseif (!is_numeric($salary)) {
        $error = "Salary must be a number!";
    } else {
        $sql = "INSERT INTO employees (name, email, position, salary)
                VALUES ('$name', '$email', '$position', '$salary')";
        if ($conn->query($sql) === TRUE) {
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>

<h2>Add New Employee</h2>
<a href="dashboard.php">← Back to Dashboard</a><br><br>

<form method="POST">
    <input type="text" name="name" placeholder="Name" value="<?= $name ?>"><br><br>
    <input type="text" name="email" placeholder="Email" value="<?= $email ?>"><br><br>
    <input type="text" name="position" placeholder="Position" value="<?= $position ?>"><br><br>
    <input type="text" name="salary" placeholder="Salary" value="<?= $salary ?>"><br><br>
    <input type="submit" name="submit" value="Add Employee">
</form>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

</body>
</html>
