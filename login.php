<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $con = new mysqli("localhost", "root", "", "test");

    if ($con->connect_error){
        die("Failed to connect: " . $con->connect_error);
    } else {
        // Prepare SQL statement to insert email and password into the registration table
        $stmt = $con->prepare("INSERT INTO registration (email, password) VALUES (?, ?)");
        
        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $email, $password);
        $result = $stmt->execute();
        
        // Check if insertion was successful
        if ($result) {
            echo "<h2>Registration successful</h2>";
        } else {
            echo "<h2>Registration failed</h2>";
        }

        // Close the statement and connection
        $stmt->close();
        $con->close();
    }
?>