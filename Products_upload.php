<?php include('includes/header.php'); ?>
<form action="product_upload.php" method="post" enctype="multipart/form-data">
    <h2>Upload Product</h2>
    <input type="text" name="name" placeholder="Product Name" required>
    <textarea name="description" placeholder="Product Description" required></textarea>
    <input type="number" name="price" step="0.01" placeholder="Product Price" required>
    <input type="text" name="category" placeholder="Product Category" required>
    <input type="file" name="image" required>
    <button type="submit">Upload</button>
</form>
<?php include('includes/footer.php'); ?>

<?php
include('includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1} else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Save to database
            $image = basename($_FILES["image"]["name"]);
            $sql = "INSERT INTO products (name, description, price, category, image) VALUES ('$name', '$description', '$price', '$category', '$image')";
            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])). " has been uploaded.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>