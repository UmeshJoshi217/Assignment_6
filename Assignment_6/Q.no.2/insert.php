<?php
include 'db.php';
	

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO employees (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if($conn->query($sql) === TRUE){
        echo "New employee added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM employees WHERE id=$id";
    $conn->query($sql);
}
?>

<h2>Add Employee</h2>
<form method="post" action="">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Phone: <input type="text" name="phone" required><br><br>
    <input type="submit" name="submit" value="Add Employee">
</form>

<h2>Employee List</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>

<?php
$sql = "SELECT * FROM employees ORDER BY id ASC";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['phone']."</td>
                <td>
                    <a href='edit.php?id=".$row['id']."'>Edit</a> | 
                    <a href='index.php?delete=".$row['id']."' onclick=\"return confirm('Are you sure?')\">Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No employees found</td></tr>";
}
?>
</table>
