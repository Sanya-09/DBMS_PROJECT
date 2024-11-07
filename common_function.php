<?php

// including connect file
include('./includes/connect.php');

// Getting products 
function getproducts() {
    global $con;

    // Check if the category or brand is set
    $category_id = isset($_GET['category']) ? $_GET['category'] : null;
    $brand_id = isset($_GET['brand']) ? $_GET['brand'] : null;

    // Base query
    $select_query = "SELECT * FROM `products`";

    // Add conditions based on category and brand
    if ($category_id) {
        $select_query .= " WHERE `category_id` = '$category_id'";
    }

    if ($brand_id) {
        if ($category_id) {
            $select_query .= " AND `brand_id` = '$brand_id'";
        } else {
            $select_query .= " WHERE `brand_id` = '$brand_id'";
        }
    }

    // Add random order and limit
    $select_query .= " ORDER BY RAND() LIMIT 0, 9"; 

    $result_query = mysqli_query($con, $select_query);

    // Check if the query was successful
    if ($result_query) {
        // Check if there are any products
        if (mysqli_num_rows($result_query) > 0) {
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- Display product image -->
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='" . htmlspecialchars($product_title) . "'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . htmlspecialchars($product_title) . "</h5>
                            <p class='card-text'>" . htmlspecialchars($product_description) . "</p>
                            <p class='card-text'>Price: $" . htmlspecialchars($product_price) . "</p>
                            <a href='#' class='btn btn-info'>Add to Cart</a>
                            <a href='#' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<p>No products found.</p>";
        }
    } else {
        // Output error message if the query fails
        echo "Error fetching products: " . mysqli_error($con);
    }
}


// displaying brands in side nav 

function getbrands(){
    global $con;
    $select_brands = "SELECT * FROM brands"; 
    $result_brands = mysqli_query($con, $select_brands);

    // Check if the query was successful
    if ($result_brands) {
        // Loop through the results and display each brand
        while ($row_data = mysqli_fetch_assoc($result_brands)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo "<li class='nav-item'>
                <a href='index.php?brand=$brand_id' class='nav-link text-light'> $brand_title </a>
            </li>";
        }
    }
}

// displaying categories in side nav 
function getcat(){
    global $con;
    $select_categories = "SELECT * FROM categories"; 
        $result_categories = mysqli_query($con, $select_categories);

        // Check if the query was successful
        if ($result_categories) {
            // Loop through the results and display each category
            while ($row_data = mysqli_fetch_assoc($result_categories)) {
                $category_title = $row_data['category_title'];
                $category_id = $row_data['category_id'];
                echo "<li class='nav-item'>
                    <a href='index.php?category=$category_id' class='nav-link text-light'> $category_title </a>
                </li>";
            }
        } else {
            // Handle query error
            echo "Error: " . mysqli_error($con);
        }
}


?>
