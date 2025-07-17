<?php
    include 'connector.php';
    $id = $_GET['id'];
    $fetch = $connection -> query("SELECT * FROM products WHERE product_id = $id");
    $fetchData = $fetch -> fetch_assoc();

    if($fetchData){
        $type = $fetchData['type_id'];
        $price = $fetchData['product_price'];
        $desc = $fetchData['product_desc'];
    } else {
        echo "Product not found.";
        exit;
    }
?>

<div class="container">
    <form action="index.php?folder=account&page=process_update&id=<?= $id ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="productname" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="productname" value="<?= $fetchData['product_name'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="producttype" class="form-label">Type</label>
        <input type="text" class="form-control" name="producttype" value="<?= $type ?>" required>
    </div>
    <div class="mb-3">
        <label for="productprice" class="form-label">Price</label>
        <input type="number" class="form-control" name="productprice" value="<?= $price ?>" required>
    </div>
    <div class="mb-3">
        <label for="productprice" class="form-label">Description</label>
        <textarea class="form-control" name="productdesc" rows="2">"<?= $desc ?>"</textarea>
    </div>
    <div class="mb-3">
        <label for="productimg" class="form-label">Image</label>
        <input type="file" class="form-control" name="productimg" accept="image/jpeg, image/png">
    </div>
    <input type="submit" class="btn btn-success mb-5" name="upproduct" name="upproduct" value="Done">
    </form>
</div>