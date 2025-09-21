<?php

include('../includes/connect.php');

if (isset($_POST['insert_category'])) {
    $category_tittle = $_POST['category_tittle'];


    // select data form data base
    $select_query = "SELECT * FROM categories where category_tittle='$category_tittle'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This category is already present in database')</script>";
    } else {

        $insert_query = "INSERT INTO categories (category_tittle) VALUES('$category_tittle')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('category has been inserted successfully')</script>";
        }
    }
}

?>
    <h3 class="text-center">Insert Categories</h3>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-secondary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="category_tittle" placeholder="Insert Categories"
            aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" name="insert_category" value="Insert Categories" class="bg-secondary p-2 my-3 border-0">
    </div>
</form>