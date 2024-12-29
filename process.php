<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $errors = [];
    if (empty($name)) {
        $errors[] = 'Name is required';
    } else if (strlen($name) < 3) {
        $errors[] = 'Name must be at least 3 characters.';
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        echo "<h3>form submitted successfully</h3>";
        echo "<p>name   : " . htmlspecialchars($name) . "</p>";
        echo "<p>email  : " . htmlspecialchars($email) . "</p>";
    }
} else {
    echo "invalid request";
}
