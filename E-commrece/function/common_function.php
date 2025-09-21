<?php
// including connect file
include('./includes/connect.php');

// getting products
function getproducts()
{
    global $con;
    // checking isset or not
    if (!isset($_GET['category'])) {
        $select_query = "SELECT * FROM products order by rand() LIMIT 0,5";
        $result_query = mysqli_query($con, $select_query);
        //  $row=mysqli_fetch_assoc($result_query);
        //  echo $row['product_name'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo " <div class='col-md-3 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_img1' class='card-img-top img-fluid' alt='$product_name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_name</h5>
                                <p class='card-text'>$product_description</p>
                                <a href='#' class='btn btn-dark text-light'>At to cart</a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                </div>";
        }
    }
}

// getting unique category

function get_unique_categories()
{
    global $con;
    // checking isset or not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM products  WHERE category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger mt-3' style='margin-bottom:24.3%;'> No stock available for this category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo " <div class='col-md-3 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_img1' class='card-img-top img-fluid' alt='$product_name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_name</h5>
                                <p class='card-text'>$product_description</p>
                                <a href='#' class='btn btn-dark text-light'>At to cart</a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                                </div>
                                </div>
                </div>";
        }
    }
}

// getting all products

function gett_all_products()
{

    global $con;
    // checking isset or not
    if (!isset($_GET['category'])) {
        $select_query = "SELECT * FROM products order by rand()";
        $result_query = mysqli_query($con, $select_query);
        //  $row=mysqli_fetch_assoc($result_query);
        //  echo $row['product_name'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo " <div class='col-md-3 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_img1' class='card-img-top img-fluid' alt='$product_name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_name</h5>
                                <p class='card-text'>$product_description</p>
                                <a href='#' class='btn btn-dark text-light'>At to cart</a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                </div>";
        }
    }
}


// displying categories on navbar in categories

function getcategory()
{
    global $con;
    $select_category = "SELECT * FROM categories";
    $result_category = mysqli_query($con, $select_category);

    while ($row_data = mysqli_fetch_assoc($result_category)) {
        $category_title = $row_data['category_tittle'];
        $category_id = $row_data['category_id']; // agar id column hai
        echo "<li><a class='dropdown-item text-light' href='index.php?category=$category_id'>$category_title</a></li>";
    }

}

// searching products function
function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM products WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger mt-3' style='margin-bottom:24.3%;'> No result match. No product 
            found on this category!</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            echo " <div class='col-md-3 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_img1' class='card-img-top img-fluid' alt='$product_name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_name</h5>
                                <p class='card-text'>$product_description</p>
                                <a href='#' class='btn btn-dark text-light'>At to cart</a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                </div>";
        }
    }
}
?>