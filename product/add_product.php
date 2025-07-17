<div class="container">
    <form action="index.php?folder=product&page=process_product" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="productname" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="productname" required>
    </div>
    <div class="mb-3">
        <label for="producttype" class="form-label">Type</label>
        <input type="text" class="form-control" name="producttype" required>
    </div>
    <div class="mb-3">
        <label for="productprice" class="form-label">Price</label>
        <input type="number" class="form-control" name="productprice" required>
    </div>
    <div class="mb-3">
        <label for="productprice" class="form-label">Description</label>
        <textarea class="form-control" name="productdesc" rows="2"></textarea>
    </div>
    <div class="mb-3">
        <label for="productimg" class="form-label">Image</label>
        <input type="file" class="form-control" name="productimg" accept="image/jpeg, image/png" required>
    </div>
    <input type="submit" class="btn btn-success mb-5" name="addproduct" name="addproduct" value="Done">
    </form>
</div>