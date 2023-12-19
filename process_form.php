
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $program = $_POST['program'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    // TODO: Update with your database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "admin0789712590";
    $database = "muni_hostels";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $database);


    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs to prevent SQL injection
    $fname = $conn->real_escape_string($fname);
    $lname = $conn->real_escape_string($lname);
    $program = $conn->real_escape_string($program);
    $gender = $conn->real_escape_string($gender);
    $email = $conn->real_escape_string($email);
    $tel = $conn->real_escape_string($tel);

    // Insert data into the database
    $sql = "INSERT INTO registration(First_name, Last_name, Program, Gender, Email, Telephone) 
            VALUES ('$fname', '$lname', '$program', '$gender', '$email', '$tel')";

    if ($conn->query($sql) === true) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // For testing purposes, you can echo the values
    echo "First Name: $fname<br>";
    echo "Last Name: $lname<br>";
    echo "Program: $program<br>";
    echo "Gender: $gender<br>";
    echo "Email: $email<br>";
    echo "Telephone: $tel<br>";
}

?>