<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin area</title>

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

    <style>
        .logo {
            width: 5%;
            height: 4%;
        }

        .admin_img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <!-- nav bar -->

    <!-- first child -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-black">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <h1 class="text-light">ARSH COLLECTION</h1>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link text-light">Welcome Guest</a>
                        <button class="btn btn-dark m-1">Logout</button>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- second child -->
        <div class="row g-0">
            <div class="col-md-12 bg-secondary p-2 d-flex align-items-center justify-content-between">

                <!-- LEFT: image + name -->
                <div class="d-flex align-items-center p-3">
                    <a href="">
                        <img src="../images/fanus1.png" alt="" class="admin_img me-2">
                    </a>
                    <p class="mb-0 ">Admin Name</p>
                </div>

                <!-- RIGHT: buttons -->
                <div class="d-flex flex-wrap pe-4">
                    <button class="btn btn-dark m-1"><a href="insert_products.php" class="nav-link text-light">Insert
                            Products</a></button>
                    <button class="btn btn-dark m-1"><a href="" class="nav-link text-light">View Products</a></button>
                    <button class="btn btn-dark m-1"><a href="index.php?insert_category"
                            class="nav-link text-light">Insert Categories</a></button>
                    <button class="btn btn-dark m-1"><a href="" class="nav-link text-light">View Categories</a></button>
                    <button class="btn btn-dark m-1"><a href="" class="nav-link text-light">All Orders</a></button>
                    <button class="btn btn-dark m-1"><a href="" class="nav-link text-light">All Payments</a></button>
                    <button class="btn btn-dark m-1"><a href="" class="nav-link text-light">List Users</a></button>
                </div>

            </div>
        </div>

    </div>

    <!-- fourth child -->

    <!-- ye button ko di hoi class lihki hoi ha GET k andar means jab insert category par click ho to wo osy insert_categry.php par ly jay ga or baki sary bhi aasy he ho gy means agar product par to oski file par -->
    <div class="container my-5">
        <?php
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_product'])) {
            include('insert_products.php');
        }


        ?>
    </div>


    <!-- bootstrap css link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>