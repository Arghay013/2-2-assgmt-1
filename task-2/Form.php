<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
</head>
<body>
    <?php
    // Define variables and initialize with empty values
    $name = $email = $phone = $gender = $department = $skills = $content = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and sanitize input data, checking if each field is set
        $name = isset($_POST['name']) ? test_input($_POST['name']) : '';
        $email = isset($_POST['email']) ? test_input($_POST['email']) : '';
        $phone = isset($_POST['phone']) ? test_input($_POST['phone']) : '';
        $gender = isset($_POST['gender']) ? test_input($_POST['gender']) : '';
        $department = isset($_POST['department']) ? test_input($_POST['department']) : '';
        $content = isset($_POST['content']) ? test_input($_POST['content']) : '';

        // Collect skills
        $skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : '';
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="Other">
        <label for="other">Other</label><br><br>

        <label for="department">Department:</label>
        <select id="department" name="department">
            <option value="CSE">CSE</option>
            <option value="IT">IT</option>
            <option value="Finance">Finance</option>
        </select><br><br>

        <label>Skills:</label>
        <input type="checkbox" id="c" name="skills[]" value="C">
        <label for="c">C</label>
        <input type="checkbox" id="html" name="skills[]" value="HTML">
        <label for="html">HTML</label>
        <input type="checkbox" id="python" name="skills[]" value="Python">
        <label for="python">Python</label><br><br>

        <label for="content">Additional Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // Display the submitted data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Submitted Information:</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Department:</strong> $department</p>";
        echo "<p><strong>Skills:</strong> $skills</p>";
        echo "<p><strong>Additional Content:</strong> $content</p>";
    }
    ?>
</body>
</html>
