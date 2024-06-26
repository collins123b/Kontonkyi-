<?php include('includes/header.php'); ?>
<div class="hero">
    <h1>Welcome to Kontonkyi Supply</h1>
    <button class="cta">Shop Now</button>
</div>

<section class="products">
    <?php
    include('includes/db_connect.php');
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>
                    <img src='uploads/" . $row["image"] . "' alt='" . $row["name"] . "'>
                    <h2>" . $row["name"] . "</h2>
                    <p>$" . $row["price"] . "</p>
                    <a href='product_details.php?id=" . $row["id"] . "'>View Details</a>
                  </div>";
        }
    } else {
        echo "No products found.";
    }
    ?>
</section>
<?php include('includes/footer.php'); ?>