<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Form</title>
</head>
<body>

<h2>Add Employee</h2>
<form action="index.php" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="salary">Salary:</label><br>
    <input type="number" step="0.01" id="salary" name="salary" required><br><br>

    <label for="department">Department:</label><br>
    <select id="department" name="department" required>
        <option value="finance">Finance</option>
        <option value="IT">IT</option>
        <option value="development">Development</option>
    </select><br><br>

    <label>Responsibility:</label><br>
    <input type="checkbox" id="manager" name="responsibility[]" value="manager">
    <label for="manager">Manager</label><br>
    <input type="checkbox" id="developer" name="responsibility[]" value="developer">
    <label for="developer">Developer</label><br>
    <input type="checkbox" id="team_lead" name="responsibility[]" value="team lead">
    <label for="team_lead">Team Lead</label><br><br>

    <input type="submit" name="submit" value="Add Employee">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];
    $department = $_POST['department'];
    $responsibility = implode(",", $_POST['responsibility']);

    $sql = "INSERT INTO employee (name, phone, salary, department, responsibility)
            VALUES ('$name', '$phone', '$salary', '$department', '$responsibility')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Employee List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Salary</th>
        <th>Department</th>
        <th>Responsibility</th>
    </tr>
    <?php
    $sql = "SELECT * FROM employee";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"]. "</td>
                    <td>" . $row["name"]. "</td>
                    <td>" . $row["phone"]. "</td>
                    <td>" . $row["salary"]. "</td>
                    <td>" . $row["department"]. "</td>
                    <td>" . $row["responsibility"]. "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No employees found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php $conn->close(); ?>
