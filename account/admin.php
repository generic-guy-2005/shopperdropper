<head>
    <!-- beh bootstrap tak ada chart laaa -->
    <!-- meng js saja lagee -->
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css" />
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js"></script>
</head>

<?php
    include 'connector.php';
    // Sudah mulai lupa SQL buseddd
    $users = $connection -> query("SELECT COUNT(user_id) AS total FROM users;");
    $data = $users -> fetch_assoc();

    $admin = $connection -> query("SELECT COUNT(user_id) AS admins FROM users WHERE authorization='admin'");
    $elitGlobal = $admin -> fetch_assoc();

    $supplier = $connection -> query("SELECT COUNT(user_id) AS supplier FROM users WHERE authorization='supplier'");
    $elitPasar = $supplier -> fetch_assoc();

    $customer = $connection -> query("SELECT COUNT(user_id) AS customer FROM users WHERE authorization='customer'");
    $rakyat = $customer -> fetch_assoc();
?>

<body>
    <h3>Product Statistics</h3>

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
                $items = $connection -> query("SELECT product_id, product_name, FORMAT(product_price, 2) AS price, product_img, user_name FROM products p, users u WHERE p.user_id = u.user_id;");

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
    </div>

    <hr>

    <h3>Transactions</h3>
    
    <div class="container">
        <table class="table">
            <thead>
                <tr scope="col">
                    <th>No</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Supplier</th>
                    <th>Customer</th>
                </tr>
            </thead>

            <?php
                include 'connector.php';
                $record = $connection -> query("SELECT * FROM transactions");
                $record -> fetch_assoc();

                $supplier = $connection -> query("SELECT user_name FROM users u, transactions t WHERE u.user_id = t.supplier_id");
                $supplierName = $supplier -> fetch_assoc();

                $product = $connection -> query("SELECT product_name, FORMAT(product_price, 2) AS price FROM products p, transactions t WHERE p.product_id = t.product_id");
                $productName = $product -> fetch_assoc();

                $customer = $connection -> query("SELECT user_name FROM users u, transactions t WHERE u.user_id = t.user_id");
                $customerName = $customer -> fetch_assoc();

                $num = 1;
                while($history = $record -> fetch_assoc()){
            ?>

            <tbody>
                <tr scope="col">
                    <td><?= $num++ ?></td>
                    <td><?= $productName['product_name'] ?></td>
                    <td><?= $productName['price'] ?></td>
                    <td><?= $supplierName['user_name'] ?></td>
                    <td><?= $customerName['user_name'] ?></td>
                </tr>
            </tbody>

            <?php } ?>
        </table>
    </div>

    <hr>

    <h3>User Statistics</h3>

    <div class="container">
        <script>
            let chart = bb.generate({
                data: {
                    columns: [
                        ["Administrator", <?= $elitGlobal['admins'] ?>],
                        ["Supplier", <?= $elitPasar['supplier'] ?>],
                        ["Customer", <?= $rakyat['customer'] ?>],
                    ],
                    type: "donut",
                    onclick: function (d, i) {
                        console.log("onclick", d, i);
                    },
                    onover: function (d, i) {
                        console.log("onover", d, i);
                    },
                    onout: function (d, i) {
                        console.log("onout", d, i);
                    },
                },
                donut: {
                    title: "<?= $data['total'] ?>",
                },
                bindto: "#donut-chart",
            });
        </script>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr scope="col">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Modify</th>
                    <th>Type</th>
                </tr>
            </thead>

            <?php
                $registeredUser = $connection -> query("SELECT user_id, user_name, user_email, authorization FROM users");
                $order = 1;
                while($registered = $registeredUser -> fetch_assoc()){
            ?>

            <tbody>
                <tr scope="col">
                    <td><?= $order++ ?></td>
                    <td><?= $registered['user_name'] ?></td>
                    <td><?= $registered['user_email'] ?></td>
                    <td>
                        <div style="display:flex; gap:10px">
                            <a href="index.php?folder=account&page=update_profile&id=<?= $registered['user_id'] ?>" class="btn btn-warning" style="color: white">Update</a>
                            <form action="index.php?folder=account&page=process_account" method="post">
                                <input type="hidden" name="id" value="<?= $registered['user_id']?>">
                                <input onclick="return confirm('Do you want to delete the user?')" type="submit" name="delete" value="Delete" class="btn btn-danger">
                            </form>
                        </div>
                    </td>
                    <?php
                        if($registered['authorization'] == 'Administrator'){
                            echo "<td style='background-color: #1f7ed1; color: white'> Administrator </td>";
                        }
                        else if($registered['authorization'] == 'Supplier'){
                            echo "<td style='background-color: #e39f22; color: white'>Supplier</td";
                        }
                        else{
                            echo "<td style='background-color: #2ea823; color: white;'>Customer</td>";
                        }
                    ?>
                </tr>
            </tbody>

            <?php } ?>

        </table>
    </div>

</body>