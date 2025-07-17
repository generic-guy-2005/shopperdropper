<div class="container">
    <h3>Income</h3>

    <?php
        include 'connector.php';

        $current = $_SESSION['id'];
        $balance = "SELECT FORMAT(balance, 2) AS balance FROM wallets WHERE user_id = $current";
        $result = $connection -> query($balance);
        if($result -> num_rows > 0){
            $data = $result -> fetch_assoc();
            $currentbalance = $data['balance'];
        } else {
            $currentbalance = 0;
        }
    ?>

    <div>
        <div class="card text-bg-primary p-3 m-3" style="display: flex; gap: 20px; flex-direction:row; width: 50%">
            <h4>Rp</h4>
            <h5><?= $currentbalance ?></h5>
        </div>
    </div>

</div>

<hr>

<div class="container">
    <h3>Transaction</h3>
    
    <div class="container">
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
                $record = $connection -> query("SELECT * FROM transactions WHERE supplier_id = " . $_SESSION['id']);
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

<hr>

<div class="container">
    <h3>Product</h3>
    
    <div class="container">
        <table class="table">
            <thead>
                <tr scope="col">
                    <th>No</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Supplier</th>
                    <th>Image</th>
                    <th>Modify</th>
                </tr>
            </thead>

            <?php
                include 'connector.php';
                $id = $_SESSION['id'];
                $items = $connection -> query("SELECT product_id, product_name, FORMAT(product_price, 2) AS price, product_img, user_name FROM products p, users u WHERE p.user_id = u.user_id AND u.user_id = $id;");

                $type = $connection -> query("SELECT type_name FROM types t, products p WHERE t.type_id = p.type_id;");
                $types = $type -> fetch_assoc();

                $no = 1;
                while($list = $items -> fetch_assoc()){
            ?>

            <tbody>
                <tr scope="col">
                    <td><?= $no++ ?></td>
                    <td><?= $list['product_name'] ?></td>
                    <td><?= $list['price'] ?></td>
                    <td><?= $types['type_name'] ?></td>
                    <td><?= $list['user_name'] ?></td>
                    <td><img src="uploads/<?= $list['product_img'] ?>" style="width:30%"></td>
                    <td>
                        <div style="display:flex; gap:10px">
                            <a href="index.php?folder=account&page=update_product&id=<?= $list['product_id'] ?>" class="btn btn-warning" style="color: white">Update</a>
                            <form action="index.php?folder=account&page=process_delete&id=<?= $list['product_id'] ?>" method="post">
                                <input type="hidden" name="id" value="<?= $list['product_id']?>">
                                <input onclick="return confirm('Do you want to delete the product?')" type="submit" name="delete" value="Delete" class="btn btn-danger">
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>

            <?php } ?>
        </table>

        <a href="index.php?folder=product&page=add_product" class="btn btn-primary m-3">Add Product</a>
    </div>
</div>