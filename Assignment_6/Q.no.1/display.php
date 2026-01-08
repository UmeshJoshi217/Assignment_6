<?php
include 'db.php';

$sql = "SELECT * FROM record ORDER BY id ASC";
$result = $conn->query($sql);

echo "<h2>Customer Records</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr>";

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "<td>
                <a href='edit.php?id=".$row['id']."'>Edit</a> | 
                <a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No records found.</td></tr>";
}
echo "</table>";
echo "<br><a href='insert.php'>Add New Record</a>";
?>
