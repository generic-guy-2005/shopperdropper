<div class="container">
    <div class="mt-5" style="margin-bottom:100px;">
        <div class="container mb-5" style="display:flex; gap:20px; justify-content:center;">

            <div class="card p-3" style="width: calc(50% - 10px); border: solid #5cb85c">
                <h3 style="position:absolute;right:20px">Top Up</h3>
                <form class="mt-5" action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="amount" class="text">Amount</label>
                        <input type="number" class="form-control" name="amount" id="amount" placeholder="0" required>
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
                        <input type="submit" name="topup" id="topup" class="btn btn-success mb-3" value="Top Up" style="color:white; width:45%">
                        <a href="index.php?folder=account&page=info" class="btn btn-danger" style="height:fit-content; width: 45%">Cancel</a>
                    </div>
                </form>

                <?php
                    if(isset($_POST['topup'])){
                        $amount = $_POST['amount'];
                        $pass = $_POST['pass'];
                        $confirmation = $_POST['confirm'];

                        if($pass == $confirmation){
                            include 'connector.php';
                            
                            $current = $_SESSION['id'];
                            $check = $connection -> query("SELECT user_password FROM users WHERE user_id = $current");
                            if($check -> num_rows > 0){
                                $data = $check -> fetch_assoc();
                                $hash = $data['user_password'];

                                if(password_verify($pass, $hash)){
                                    // Update balance
                                    $update = $connection -> query("UPDATE wallets SET balance = balance + $amount WHERE user_id = $current");
                                    if($update){
                                        echo "<script>alert('Top Up Successful!'); window.location.href='index.php?folder=account&page=info';</script>";
                                    } else {
                                        echo "<p style='color:red;'>Failed to update balance. Please try again.</p>";
                                    }
                                } else {
                                    echo "<p style='color:red;'>Incorrect Password!</p>";
                                }
                            } else {
                                echo "<p style='color:red;'>User not found!</p>";
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