<?php include('includes/header.php'); ?>
<h2>View Orders</h2>
<?php
include('includes/db_connect.php');

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='order'>
                <h3>Order ID: " . $row["id"] . "</h3>
                <p>Name: " . $row["name"] . "</p>
                <p>Email: " . $row["email"] . "</p>
                <p>Address: " . $row["address"] . "</p>
                <p>City: " . $row["city"] . "</p>
                <p>ZIP: " . $row["zip"] . "</p>
                <p>Country: " . $row["country"] . "</p>
              </div>";
    }
} else {
    echo "No orders found.";
}
?>
<?php include('includes/footer.php'); ?>