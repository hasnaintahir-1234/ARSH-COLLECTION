<?php

include('includes/connect.php');
include('function/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARSH COLLECTION</title>

    <!-- favicon link -->
    <link rel="apple-touch-icon" sizes="180x180" href="fav_icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="fav_icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="fav_icons/favicon-16x16.png">
    <link rel="manifest" href="fav_icon/site.webmanifest">
    <link rel="icon" type="image/x-icon" href="fav_icons/favicon.ico">

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

<body>

    <!-- nav-bar -->
    <div class="container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">ARSH COLLECTION</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="display.php">Products</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Catageries
                            </a>
                            <ul class="dropdown-menu bg-dark">
                                <?php
                                getcategory();
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i
                                    class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Total Price:100/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg  navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">
                ARSH - STORE
            </h3>
            <p class="text-center">
                Elegance You Can Feel,
                Quality You Can Trust
            </p>
        </div>
        <!-- fourth child -->
        <div class="row py-2">
            <div class="col-md-12 mb-2">
                <!-- Products -->
                <div class="row">

                    <!-- fatching products form database -->
                    <?php
                    // calling function
                    get_unique_categories();
                    gett_all_products();
                    ?>
                </div>
            </div>
        </div>
        <!-- Last child -->

        <div class="bg-dark text-light p-3 text-center mt-auto">
            <p>All this right - designed by Hasnain</p>
        </div>
    </div>



    <!-- bootstrap js linl -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>