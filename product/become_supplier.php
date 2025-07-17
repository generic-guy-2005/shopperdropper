<div class="container">
    <div class="mt-5" style="margin-bottom:100px;">
        <div class="container mb-5" style="display:flex; gap:20px; justify-content:center;">

            <div class="card p-3" style="width: calc(50% - 10px); border: solid #0275d8">
                <h3 style="position:absolute;right:20px">Become Supplier</h3>
                <form class="mt-5" action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="text" class="text">Username</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Supplier Name" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Supplier Email" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="password" class="password">Password</label>
                        <input type="password" class="form-control" name="pass" id="pass" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="confirm" class="password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm" id="confirm" required>
                    </div>
                    <div style="display:flex; justify-content:center; gap:10px">
                        <input type="submit" name="reg_supplier" id="reg_supplier" class="btn btn-success mb-3" value="Register" style="color:white; width:45%">
                        <a href="index.php?folder=product&page=product_view" class="btn btn-danger" style="height:fit-content; width: 45%">Cancel</a>
                    </div>
                </form>

                <?php
                    if(isset($_POST['reg_supplier'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $confirmation = $_POST['confirm'];

                        if($pass == $confirmation){
                            include 'connector.php';
                            $hash = password_hash($pass, PASSWORD_DEFAULT);
                            
                            // Brarti lngsung supplier
                            $sql = "INSERT INTO users(user_name, user_email, user_password, creation_date, authorization) VALUES('$name', '$email', '$hash', NOW(), 'Supplier');";
                            $registration = $connection -> query($sql);

                            if($registration){
                                echo "<script>window.location.href = 'index.php?folder=product&page=supplier_reg'</script>";
                            }
                            else{
                                echo "Something went wrong, Try again later";
                            }
                        }
                        else{
                            echo "<p style='color:red;'>Password does not match!</p>";
                        }
                    }
                ?>

            </div>
        </div>
    </div>
</div>