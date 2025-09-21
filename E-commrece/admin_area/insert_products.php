<?php
include("../includes/connect.php");
if (isset($_POST['insert_product'])) {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing images
    $product_image1 = $_FILES['product-image1']['name'];
    $product_image2 = $_FILES['product-image2']['name'];
    $product_image3 = $_FILES['product-image3']['name'];

    // accessing images temp name
    $tmp_image1 = $_FILES['product-image1']['tmp_name'];
    $tmp_image2 = $_FILES['product-image2']['tmp_name'];
    $tmp_image3 = $_FILES['product-image3']['tmp_name'];

    // checking the empty condition
    if (
        $product_name == '' or $product_description == '' or $product_keywords == '' or $product_category == ''
        or $product_price == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == ''
    ) {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($tmp_image1, "./product_images/$product_image1");
        move_uploaded_file($tmp_image2, "./product_images/$product_image2");
        move_uploaded_file($tmp_image3, "./product_images/$product_image3");

        // insert query
        $insert_query = "INSERT INTO products (product_name,product_description,product_keywords,category_id,product_img1,product_img2,
        product_img3,product_price,date,status) VALUES('$product_name', ' $product_description', 
        ' $product_keywords', ' $product_category', '$product_image1', '$product_image2', '$product_image3','$product_price', Now(), '$product_status')";

        $result_query = mysqli_query($con, $insert_query);
        if ($result_query) {
            echo "<script>alert('Successfully inserted the Products')</script>";
        }
    }
}





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" caontent="width=device-width, initial-scale=1.0">
    <title>Insert Products Admin-DashBoard</title>

    <!-- favicon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="../fav_icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../fav_icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../fav_icons/favicon-16x16.png">
    <link rel="manifest" href="../fav_icon/site.webmanifest">
    <link rel="icon" type="image/x-icon" href="../fav_icons/favicon.ico">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="design.css">

</head>

<body class="bg-secondary">
    <div class="container mt-3">
        <h1 class="text-center text-black">Insert Products</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">

            <!-- product name -->

            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_name" class="form-label text-black mt-4">Product Name</label>
                <input type="text" id="product_name" name="product_name" class="form-control"
                    placeholder="Enter product name" autocomplete="off" required="required">
            </div>

            <!-- product price -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_description" class="form-label text-black mt-4">Product description</label>
                <input type="text" id="product_description" name="product_description" class="form-control"
                    placeholder="Enter product description" autocomplete="off" required="required">
            </div>
            <!-- product keywords -->
            <div class="form-outline mb-5 w-50 m-auto">
                <label for="product_keywords" class="form-label text-black mt-4">Product keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" class="form-control"
                    placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>
            <!-- category -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="product_category" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                    $select_category = "SELECT * FROM categories";
                    $result_category = mysqli_query($con, $select_category);

                    while ($row_data = mysqli_fetch_assoc($result_category)) {
                        $category_title = $row_data['category_tittle'];
                        $category_id = $row_data['category_id']; // agar id column hai
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- image1 -->
            <div class="form-outline m-2 w-50 m-auto">
                <label for="product-image1" class="form-label text-black mt-4">Product Image-1</label>
                <input type="file" id="product-image1" name="product-image1" class="form-control" required="required">
            </div>
            <!-- image2 -->
            <div class="form-outline m-2 w-50 m-auto">
                <label for="product-image2" class="form-label text-black mt-4">Product Image-2</label>
                <input type="file" id="product-image2" name="product-image2" class="form-control" required="required">
            </div>
            <!-- image3 -->
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product-image3" class="form-label text-black mt-4">Product Image-3</label>
                <input type="file" id="product-image3" name="product-image3" class="form-control" required="required">
            </div>
            <!-- product price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label text-black mt-4">Product price</label>
                <input type="text" id="product_price" name="product_price" class="form-control"
                    placeholder="Enter product price" required="required">
            </div>
            <!-- button -->
            <div class="form-outline mb-2 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-dark mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
</body>

</html>