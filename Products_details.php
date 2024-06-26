<?php include('includes/header.php'); ?>
<?php
include('includes/db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='product-details'>
                <img src='uploads/" . $row["image"] . "' alt='" . $row["name"] . "'>
                <h2>" . $row["name"] . "</h2>
                <p>" . $row["description"] . "</p>
                <p>$" . $row["price"] . "</p>
                <button>Add to Cart</button>
              </div>";
    } else {
        echo "Product not found.";
    }
} else {
    echo "No product ID provided.";
}
?>
<?php include('includes/footer.php'); ?>