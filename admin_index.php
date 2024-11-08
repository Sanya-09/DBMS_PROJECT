<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
<!-- bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- css file -->
 <link rel="stylesheet" href="../style.css">

 <style>
.admin_image{
    width: 100px;
    object-fit: contain;
}
.footer{
    position: absolute;
    bottom:0;
}

 </style>
</head>
<body>
    <!-- nav bar-->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../img/Orange Simple Online Shopping Logo (1).png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link"> Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
         <div class="bg-light">
            <h2 class="text-center">Manage Details </h2>
         </div>

         <!-- third child -->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="px-5">
            <a href="#"><img src="../img/pineapple.jpeg" alt="Admin Profile" class="admin_image"></a>
            <p class="text-light text-center">Admin Name</p>
        </div>
        <!-- Improved button styling -->
        <div class="button text-center">
            <!-- Option 1: Use btn class from Bootstrap -->
            <a href="insert_product.php" class="btn btn-info my-1">Insert Products</a>
            <a href="view_products.php" class="btn btn-info my-1">View Products</a>
            <a href="index.php?insert_category" class="btn btn-info my-1">Insert Categories</a>
            <a href="view_categories.php" class="btn btn-info my-1">View Categories</a>
            <a href="index.php?insert_brand" class="btn btn-info my-1">Insert Brands</a>
            <a href="view_brands.php" class="btn btn-info my-1">View Brands</a>
            <a href="all_orders.php" class="btn btn-info my-1">All orders</a>
            <a href="all_payments.php" class="btn btn-info my-1">All payments</a>
            <a href="list_users.php" class="btn btn-info my-1">List Users</a>
            <a href="logout.php" class="btn btn-info my-1">Log out</a>
        </div>
    </div>
</div>

<!-- fourth child -->
<div class="container">
    <?php
    // Corrected PHP syntax for checking GET parameter
    if(isset($_GET['insert_category'])){
        include('insert_categories.php');
    }
    if(isset($_GET['insert_brand'])){
        include('insert_brands.php');
    }
    ?>
</div>
          <!-- last child -->
    <div class="bg-info p-3 text-center footer"></div>
    <p>All rights reserved-: Designed by Sanya Agarwal </p>
    </div>
     </div>
   <!-- bootstrap js link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
