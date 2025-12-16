<div class="container">
    <h3>Balance</h3>

    <?php
    include 'connector.php';

    $current = $_SESSION['id'];
    $balance = "SELECT FORMAT(balance, 2) AS balance FROM wallets WHERE user_id = $current";
    $result = $connection->query($balance);
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $currentbalance = $data['balance'];
    } else {
        $currentbalance = 0; // Kalo error hehe
    }
    ?>

    <div>
        <div class="card text-bg-success p-3 m-3" style="display: flex; gap: 20px; flex-direction:row; width: 50%">
            <h4>Rp</h4>
            <h5><?= $currentbalance ?></h5>
        </div>

        <a href="index.php?folder=account&page=top_up" class="btn btn-primary m-3">Top Up</a>
    </div>
</div>

<hr>

<div class="container">
    <h3>History</h3>

    <div class="container">
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
            $current = $_SESSION['id'];

            $record = $connection->query("SELECT t.transaction_id, u.user_id AS customer, p.product_name, p.product_price, p.product_id
                FROM transactions t
                INNER JOIN users u ON t.user_id = u.user_id
                INNER JOIN products p ON t.product_id = p.product_id
                WHERE u.user_id = $current;
            ");

            /*
            $product = $connection->query("SELECT product_name, FORMAT(product_price, 2) AS price FROM products WHERE product_id = " . $history['product_id'] . "");
            $productData = $product->fetch_assoc();
            */

            $num = 1;
            while ($history = $record->fetch_assoc()) {
                $supplier = $connection->query("SELECT u.user_name AS supplier_name
                    FROM users u
                    INNER JOIN products p ON u.user_id = p.user_id
                    WHERE p.product_id = " . $history['product_id'] . ";
                ");
            ?>

                <tbody>
                    <tr scope="col">
                        <td><?= $num++ ?></td>
                        <td><?= $history['transaction_id'] ?></td>
                        <td><?= $history['product_name'] ?></td>
                        <td><?= number_format($history['product_price'], 0, ',', ',') ?></td>
                        <td>
                            <?php
                                $supplierData = $supplier->fetch_assoc();
                                echo $supplierData['supplier_name'];
                            ?>
                        </td>
                    </tr>
                </tbody>

            <?php } ?>
        </table>
    </div>
</div>