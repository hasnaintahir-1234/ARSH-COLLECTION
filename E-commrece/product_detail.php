<?php
include('includes/connect.php');
include('function/common_function.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Product ka data nikalna
    $select_query = "SELECT * FROM products WHERE product_id=$product_id";
    $result_query = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result_query);

    $product_name = $row['product_name'];
    $product_description = $row['product_description'];
    $product_img1 = $row['product_img1'];
    $product_price = $row['product_price'];
    $category_id = $row['category_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product_name; ?> - ARSH COLLECTION</title>

    <!-- favicon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="fav_icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav_icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav_icons/favicon-16x16.png">
    <link rel="manifest" href="fav_icon/site.webmanifest">
    <link rel="icon" type="image/x-icon" href="fav_icons/favicon.ico">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container my-5">
        <div class="row g-4 align-items-center">
            <!-- Product Image -->
            <div class="col-lg-6 col-md-6 col-12 text-center">
                <img src="./admin_area/product_images/<?php echo $product_img1; ?>" class="img-fluid rounded shadow-sm"
                    alt="<?php echo $product_name; ?>">
            </div>

            <!-- Product Details -->
            <div class="col-lg-6 col-md-6 col-12">
                <h2 class="fw-bold"><?php echo $product_name; ?></h2>
                <p class="text-muted"><?php echo $product_description; ?></p>
                <h4 class="text-dark fw-semibold mb-4">Price: <?php echo $product_price; ?> /-</h4>
                <a href="#" class="btn btn-dark btn-lg">🛒 Add to Cart</a>
            </div>
        </div>

        <!-- Related Products -->
        <div class="row mt-5">
            <h3 class="mb-4 fw-bold">Related Products</h3>
            <?php
            $related_query = "SELECT * FROM products WHERE category_id=$category_id AND product_id!=$product_id LIMIT 4";
            $related_result = mysqli_query($con, $related_query);

            while ($rel = mysqli_fetch_assoc($related_result)) {
                $rel_id = $rel['product_id'];
                $rel_name = $rel['product_name'];
                $rel_img = $rel['product_img1'];
                $rel_price = $rel['product_price'];

                echo "
        <div class='col-lg-3 col-md-4 col-sm-6 col-12 mb-4'>
            <div class='card h-100 shadow-sm border-0'>
                <img src='./admin_area/product_images/$rel_img' 
                     class='card-img-top img-fluid' 
                     alt='$rel_name'
                     style='height:200px; object-fit:cover;'>
                <div class='card-body d-flex flex-column'>
                    <h6 class='card-title fw-bold text-truncate'>$rel_name</h6>
                    <p class='card-text text-muted mb-3'>Price: $rel_price/-</p>
                    
                    <div class='d-flex justify-content-between gap-2 mt-auto'>
                    <a href='index.php?add_to_cart=$rel_id' class='btn btn-dark btn-sm w-50'>Add to Cart</a>
                        <a href='product_detail.php?product_id=$rel_id' class='btn btn-outline-dark btn-sm w-50'>View More</a>
                    </div>
                </div>
            </div>
        </div>";
            }
            ?>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>