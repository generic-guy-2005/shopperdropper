<?php
    include 'connector.php';
    $id = $_POST['id'];
    $detail = $connection -> query("SELECT product_price, user_id FROM products WHERE product_id='$id'");
    $price = $detail -> fetch_assoc();

    $income = $connection -> query("SELECT user_id FROM wallets WHERE user_id = '$price[user_id]'");
    $surplus = $income -> fetch_assoc();

    $balance = $connection -> query("SELECT balance FROM wallets WHERE user_id='$_SESSION[id]'");
    $user_balance = $balance -> fetch_assoc();

    if($user_balance['balance'] < $price['product_price']) {
        echo "<script>alert('Insufficient balance!'); window.location.href='index.php?folder=product&page=product_view';</script>";
        exit();
    }
    else{
        $new_balance = $user_balance['balance'] - $price['product_price'];
        $new_income = $surplus['balance'] + $price['product_price'];
        $connection->query("UPDATE wallets SET balance = '$new_balance' WHERE user_id='$_SESSION[id]'");
        $connection->query("UPDATE wallets SET balance = '$new_income' WHERE user_id='$price[user_id]'");
        $connection->query("INSERT INTO transactions (user_id, supplier_id, product_id, amount) VALUES ('$_SESSION[id]', '$price[user_id]', '$id', '$price[product_price]')");
        
        echo "<script>alert('Purchase successful!'); window.location.href='index.php?folder=product&page=product_view';</script>";
    }
?>