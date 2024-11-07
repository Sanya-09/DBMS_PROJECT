<!-- INSERT BRAND FORM  -->
<?php
include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // Check if the brand already exists
    $select_query = "SELECT * FROM brands WHERE brand_title='$brand_title'";
    $select_result = mysqli_query($con, $select_query);

    if (mysqli_num_rows($select_result) > 0) {
        echo "<script>alert('brand already exists.')</script>";
    } else {
        // Insert the new brand
        $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('Brand has been inserted successfully.')</script>";
        } else {
            echo "<script>alert('Error inserting brand: " . mysqli_error($con) . "')</script>";
        }
    }
}
?>

<h2 class="text-center">Insert Brands</h2>


<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  
 <input type="Submit" class="bg-info  border-0 p-2 my-3" name="insert_brand" value="Insert Brands" > 
  
</div>
</form>
