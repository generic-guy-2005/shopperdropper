<div class="container mb-5">

    <?php
        include 'connector.php';
        $id = $_GET['id'];
        $detail = $connection -> query("SELECT * FROM products WHERE product_id='$id'");
        $cards = $detail -> fetch_assoc();

        $price = $connection -> query("SELECT FORMAT(product_price, 2) AS cost FROM products WHERE product_id='$id'");
        $cost = $price -> fetch_assoc();

        $type = $connection -> query("SELECT type_name FROM products p, types t WHERE p.type_id = t.type_id");
        $category = $type -> fetch_assoc();

        $supplier = $connection -> query("SELECT user_name FROM users u, products p WHERE u.user_id = p.user_id");
        $name = $supplier -> fetch_assoc();
    ?>

    <h2><?= $cards['product_name'] ?> <span class="badge text-bg-secondary"><?= $category['type_name'] ?></span></h2> <hr>

    <div style="display:flex; gap:50px">
        <img src="uploads/<?= $cards['product_img'] ?>" style="width:100%; margin:5%;">
        
        <div style="display:flex; flex-direction:column;">
            <h4><?= $name['user_name'] ?></h4>
            <h5>Price: Rp<?= $cost['cost'] ?></h5>
            <hr>
            <p style="height:max-content"><?= $cards['product_desc'] ?></p>

            <?php if($_SESSION['authorization'] == 'Customer'){ ?>

            <div style="display:flex; gap:10px">
                <a href="index.php?folder=transaction&page=product_buy&id=<?= $id ?>" class="btn btn-success">Buy</a>
                <a href="index.php?folder=product&page=product_view" class="btn btn-danger">Back</a>
            </div>

            <?php } ?>
            
        </div>
    </div>
</div>