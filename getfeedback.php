<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "your_mysql_server";
    $username = "your_mysql_username";
    $password = "your_mysql_password";
    $dbname = "webpage_feedback";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $name = $_POST["name"];
    $class = $_POST["Class"];
    $subjects = isset($_POST["subject"]) ? implode(", ", $_POST["subject"]) : "";
    $feedback_text = $_POST["Feedback"];
    $city = $_POST["city"];

    // Insert data into MySQL database
    $sql = "INSERT INTO feedback_data (name, class, subjects, feedback_text, city) 
            VALUES ('$name', '$class', '$subjects', '$feedback_text', '$city')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Form not submitted";
}
?>
