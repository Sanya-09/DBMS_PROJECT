<!-- INSERT PRODUCT FORM -->
<?php
include('../includes/connect.php');

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];   
    $Description = $_POST['Description']; 
    $product_keyword = $_POST['product_keyword']; 
    $product_category = $_POST['product_category']; 
    $product_brand = $_POST['product_brand']; 
    $product_price = $_POST['product_price'];
    $product_status = true;

    // Accessing the image
    $product_image1 = $_FILES['product_image1']['name']; 
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // Accessing image temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name']; 
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Checking empty condition
    if ($product_title == '' || $Description == '' || $product_keyword == '' || $product_category == '' || $product_brand == '' || $product_price == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // Insert query
        $insert_products = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES ('$product_title', '$Description', '$product_keyword', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('Successfully inserted products')</script>";
        } else {
            echo "<script>alert('Error inserting products: " . mysqli_error($con) . "')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>

<!--bootstrap css link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- font awesome --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--css file --> 
<link rel="stylesheet" href="../style.css">

</head>
<body class='bg-light'>
    <!-- title -->
    <div class="container mt-3 w-50 m-auto">
        <h1 class="text-center">Insert Products</h1>
        <!--FORM POST METHOD FOR SENSITIVE DATA-->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title"  class="form-control" placeholder="Enter Product title" autocomplete="off" required="required">
            </div>

     <!-- description -->
            <div class="form-outline mb-4 m-auto">
                <label for="Desccription" class="form-label">Product Description</label>
                <input type="text" name="Description" id="Description"  class="form-control" placeholder="Enter Product Details" autocomplete="off" required="required">
            </div>

    <!-- KEYWORDS -->
    <div class="form-outline mb-4 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword"  class="form-control" placeholder="Enter Product Details" autocomplete="off" required="required">
            </div>

    <!-- categories -->
             <div class="form-outline mb-4 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    
                 <?php
                    $select_query = "SELECT * FROM `categories`"; // Use backticks or no quotes for table names
                    $result_query = mysqli_query($con, $select_query);
                     if ($result_query) { // Check if the query was successful
                          while ($row = mysqli_fetch_assoc($result_query)) {
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'> $category_title </option>"; // Set the value to category_id
                         }
                    } else {
                         // Handle query error
                         echo "Error: " . mysqli_error($con);
                    }
                ?>
                </select>
            </div>

     <!-- brands -->
     <div class="form-outline mb-4 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select Brand</option>
                    
                    <?php
                    $select_query = "SELECT * FROM `brands`"; // Use backticks or no quotes for table names
                    $result_query = mysqli_query($con, $select_query);
                    
                    if ($result_query) { // Check if the query was successful
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $brand_title = $row['brand_title']; // Correct variable name
                            $brand_id = $row['brand_id'];
                            echo "<option value='$brand_id'> $brand_title </option>"; // Use $brand_title here
                        }
                    } else {
                        // Handle query error
                        echo "Error: " . mysqli_error($con);
                    }
                    ?>  
                </select>
            </div>

    <!-- IMAGE 1-->
    <div class="form-outline mb-4 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1"  class="form-control" required="required">
            </div>

     <!-- IMAGE 2-->
     <div class="form-outline mb-4 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2"  class="form-control" required="required">
            </div>

     <!-- IMAGE 3-->
     <div class="form-outline mb-4 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3"  class="form-control" required="required">
            </div>

    <!-- PRICE -->
    <div class="form-outline mb-4 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price"  class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>

    <!-- Submit Button -->
    <div class="form-outline mb-4 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product" >
            </div>
        </form>
    </div>
    
</body>
</html>
