<?php include('includes/header.php'); ?>
<h2>Checkout</h2>
<form action="checkout.php" method="post">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="address" placeholder="Shipping Address" required>
    <input type="text" name="city" placeholder="City" required>
    <input type="text" name="zip" placeholder="ZIP Code" required>
    <input type="text" name="country" placeholder="Country" required>
    <button type="submit">Place Order</button>
</form>
<?php include('includes/footer.php'); ?>

<?php
include('includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle order processing
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];

    // Save order to database (placeholder code, needs proper implementation)
    $sql = "INSERT INTO orders (name, email, address, city, zip, country) VALUES ('$name', '$email', '$address', '$city', '$zip', '$country')";
    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
        // Send order email
        mail("cbawa83@gmail.com", "New Order from Kontonkyi Supply", "Order details: \nName: $name\nEmail: $email\nAddress: $address\nCity: $city\nZIP: $zip\nCountry: $country");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>