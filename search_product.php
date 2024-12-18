<!-- connect files -->
<?php 
include('includes/connect.php');
include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compartible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesom  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css link-->
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- NAVIGATION BAR -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
    <img src="./img/Orange Simple Online Shopping Logo (1).png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
         </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: 100/-</a>
         </li>
        
          <form class="d-flex" >
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
         <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
          <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
         </form>
         </div>
         </div>
         </nav>

    <!-- Second child -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
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
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communication is the heart of e-commerce community</p>
    </div>


         <!-- Fourth child -->
<div class="row px-1">
    <div class="col-md-10">
        <!-- PRODUCTS -->
        <div class="row">
            <!-- Fetching products -->
            <?php
            // calling function 
           getproducts();
            ?>
            <!-- Row end -->
        </div>
        <!-- Column end -->
    </div>

    <div class="col-md-2 bg-secondary p-0">
    <ul class="navbar-nav me-auto text-center">
       

        <!-- Brands TO BE DISPLAYED -->
        <li class="nav-item bg-info mt-3">
            <a href="#" class="nav-link text-light"><h4>Delievery Brands</h4></a>
        </li>

        <?php
        getbrands();
        ?>

         <!-- Categories TO BE DISPLAYED-->
         <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
        </li>

        <?php
        getcat();
        ?>
    </ul>
</div>  
</div>
    <!-- last child -->
    <div class="bg-info text-center"><h2>All rights reserved- Designed by Sanya Agarwal</h2></div>
    
    </div>

 
    <!-- bootstrap js link -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
