<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "Companydb";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->autocommit(FALSE);

try {

    $sql1 = "INSERT INTO employees (name, email, salary) VALUES ('John Doe', 'john@example.com', 5000)";
    if (!$conn->query($sql1)) {
        throw new Exception("Error inserting employee: " . $conn->error);
    }

    $sql2 = "INSERT INTO departments (dept_name) VALUES ('Sales')";
    if (!$conn->query($sql2)) {
        throw new Exception("Error inserting department: " . $conn->error);
    }

    $sql3 = "INSERT INTO employees (name, email, salary) VALUES ('Jane Doe', 'john@example.com', 6000)";
    if (!$conn->query($sql3)) {
        throw new Exception("Error inserting second employee: " . $conn->error);
    }

    $conn->commit();
    echo "Transaction successful! All records inserted.";

} catch (Exception $e) {
    $conn->rollback();
    echo "Transaction failed. Rolled back. Error: " . $e->getMessage();
}

$conn->autocommit(TRUE);

$conn->close();
?>  
