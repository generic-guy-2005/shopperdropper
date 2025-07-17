<?php
    if($_SESSION['authorization'] == "Supplier"){
?>

<div class="container" style="margin-bottom: 180px;">
    <h3>History</h3>
    
    <hr>

    <div class="container mb-5">
        <table class="table">
            <thead>
                <tr scope="col">
                    <th>No</th>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Customer</th>
                </tr>
            </thead>

            <?php
                include 'connector.php';
                $id = $_SESSION['id'];
                $record = $connection -> query("SELECT * FROM transactions");
                $history = $record -> fetch_assoc();

                $product = $connection -> query("SELECT product_name, FORMAT(product_price, 2) AS price FROM products WHERE product_id = " . $history['product_id']);
                $productData = $product -> fetch_assoc();

                $customer = $connection -> query("SELECT user_name FROM users WHERE user_id = " . $history['user_id']);
                $customerData = $customer -> fetch_assoc();

                $num = 1;
                while($history = $record -> fetch_assoc()){
            ?>

            <tbody>
                <tr scope="col">
                    <td><?= $num++ ?></td>
                    <td><?= $history['transaction_id'] ?></td>
                    <td><?= $productData['product_name'] ?></td>
                    <td><?= $productData['price'] ?></td>
                    <td><?= $customerData['user_name'] ?></td>
                </tr>
            </tbody>

            <?php } ?>
        </table>
    </div>
</div>

<?php } elseif($_SESSION['authorization'] == "Customer") { ?>

<div class="container" style="margin-bottom: 180px;">
    <h3>History</h3>
    
    <hr>

    <div class="container mb-5">
        <table class="table">
            <thead>
                <tr scope="col">
                    <th>No</th>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Supplier</th>
                </tr>
            </thead>

            <?php
                include 'connector.php';
                $id = $_SESSION['id'];
                $record = $connection -> query("SELECT * FROM transactions");
                $history = $record -> fetch_assoc();

                $product = $connection -> query("SELECT product_name, FORMAT(product_price, 2) AS price FROM products WHERE product_id = " . $history['product_id']);
                $productData = $product -> fetch_assoc();

                $customer = $connection -> query("SELECT user_name FROM users WHERE user_id = " . $history['user_id']);
                $customerData = $customer -> fetch_assoc();

                $num = 1;
                while($history = $record -> fetch_assoc()){
            ?>

            <tbody>
                <tr scope="col">
                    <td><?= $num++ ?></td>
                    <td><?= $history['transaction_id'] ?></td>
                    <td><?= $productData['product_name'] ?></td>
                    <td><?= $productData['price'] ?></td>
                    <td><?= $customerData['user_name'] ?></td>
                </tr>
            </tbody>

            <?php } ?>
        </table>
    </div>
</div>

<?php } else { ?>

<?php }

?>