<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$id = $_GET['id'];
$error = "";

// Fetch current employee data
$sql = "SELECT * FROM employees WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    header("Location: dashboard.php");
    exit;
}

$row = $result->fetch_assoc();

// Update form submission
if (isset($_POST['update'])) {
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
        $sql = "UPDATE employees SET 
                    name='$name', 
                    email='$email', 
                    position='$position', 
                    salary='$salary' 
                WHERE id=$id";
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
    <title>Edit Employee</title>
</head>
<body>

<h2>Edit Employee</h2>
<a href="dashboard.php">← Back to Dashboard</a><br><br>

<form method="POST">
    <input type="text" name="name" value="<?= $row['name'] ?>"><br><br>
    <input type="text" name="email" value="<?= $row['email'] ?>"><br><br>
    <input type="text" name="position" value="<?= $row['position'] ?>"><br><br>
    <input type="text" name="salary" value="<?= $row['salary'] ?>"><br><br>
    <input type="submit" name="update" value="Update Employee">
</form>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

</body>
</html>
