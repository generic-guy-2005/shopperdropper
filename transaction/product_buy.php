<?php
    include 'connector.php';
    $id = $_GET['id'];
    $detail = $connection -> query("SELECT product_name, FORMAT(product_price, 2) AS product_price, product_img FROM products WHERE product_id='$id'");
    $price = $detail -> fetch_assoc();

    $balance = $connection -> query("SELECT FORMAT(balance, 2)AS balance FROM wallets WHERE user_id='$_SESSION[id]'");
    $user_balance = $balance -> fetch_assoc();
?>

<div class="container">
    <h4>Buy Product?</h4>
    <hr>
</div>

<div class="container mb-5" style="display: flex; gap: 10%">
    <div class="card" style="width: 50%; padding: 10px;">
        <img src="uploads/<?= $price['product_img'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5> <?= $price['product_name'] ?> </h5>
            <p>Rp <?= $price['product_price'] ?> </p>
        </div>
    </div>

    <div style="display: flex; flex-direction: column; gap: 10px; width: 50%;">
        <div style="display: flex; flex-direction: column; gap: 10px; width: 100%;">
            <div class="card text-bg-primary mb-3" style="width: 75%; height: fit-content;">
                <div class="card-header">Balance</div>
                <div class="card-body" style="display: flex; gap: 10px;">
                    <h5 class="card-title">Rp </h5>
                    <h4> <?= $user_balance['balance'] ?></h4>
                </div>
            </div>
        </div>

        <div class="card" style="width: 75%; align-items: center; justify-content: center;">
            <div class="card-body" style="display: flex; flex-direction: column; gap: 10px; justify-content: center;">
                <h5>Confirmation</h5>
                <form action="index.php?folder=transaction&page=process_payment" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="price" value="<?= $price['product_price'] ?>">
                    <button type="submit" class="btn btn-success">Buy</button>
                    <a href="index.php?folder=product&page=product_view" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>