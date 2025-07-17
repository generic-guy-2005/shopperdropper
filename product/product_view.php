<div class="container">
    <h4>Product Section</h4>
    <hr>
</div>

<div class="container mb-3" style="display:flex; flex-wrap:wrap; gap:10px;">
    <?php
        include 'connector.php';
        $items = $connection -> query("SELECT product_id, product_name, FORMAT(product_price, 2) AS price, type_name, product_desc, product_img FROM products p, types t WHERE p.type_id = t.type_id");

        if($items -> num_rows === 0){
            echo "
            <div class='container mt-5' style='display:flex; gap: 20px; justify-content:center; padding-top: 10%; padding-bottom: 10%'>
                <img src='assets/136469815_b5909471-bbfa-4841-8286-c836ab718095.jpg' style='width: 15%'>
                <div style='display: flex; flex-direction:column; gap:10px'>
                    <p><p>
                    <h5>No Product Yet!</h5>
                </div>
            </div>
            ";
        }
        else{
            while($cards = $items -> fetch_assoc()){
    ?>

    <div class="card mb-3" style="width: calc(50% - 10px)">
        <a href="index.php?folder=product&page=product_detail&id=<?= $cards['product_id'] ?>" style="text-decoration:none;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="uploads/<?= $cards['product_img'] ?>" class="img-fluid rounded-start" alt="..." style="padding: 10px">
            </div>
            <div class="col-md-8">
                <div class="card-body" style="color:black">
                    <h5 class="card-title"><?= $cards['product_name'] ?></h5>
                    <p class="card-text">Rp<?= $cards['price'] ?></p>
                    <p class="card-text"><?= $cards['product_desc'] ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?= $cards['type_name'] ?></small></p>
                </div>
            </div>
        </div>
        </a>
    </div>

    <?php }} ?>

</div>

<div class="container mt-3 mb-5">
    <hr>

<?php

    if($_SESSION['authorization'] == "Supplier") { ?>

        <p>Want to bring your products?</p>
        <a href="index.php?folder=product&page=add_product" class="btn btn-primary">Add Product</a>

<?php } else if($_SESSION['authorization'] == "Customer") { ?>

        <p>Want to bring your products?</p>
        <a href="index.php?folder=product&page=become_supplier" class="btn btn-primary">Become Supplier</a>

<?php } ?>

</div>