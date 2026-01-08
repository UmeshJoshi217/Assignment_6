<?php
include "db_connect.php";
if ($_SERVER['REQUEST_METHOD']=== 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $sql = "INSERT INTO record (name, email, phone)
    VALUES ('$name', '$email', '$phone')";

    mysqli_query($conn, $sql);
    header(header: "Location: view.php");

}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h2>Insert Customer Details</h2>
    <form method="post">
    Name: <input type="text" name="name" required><br>
    Email: <input type="text" name="email" required><br>
Phone: <input type="text" name="phone" required><br>
<input type="submit" name="Submit" value="Insert">
</form>
</body>
</html>