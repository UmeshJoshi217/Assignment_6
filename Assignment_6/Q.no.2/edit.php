<?php
include 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}


if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE employees SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<h2>Edit Employee</h2>
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
    Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br><br>
    <input type="submit" name="update" value="Update Employee">
</form>
