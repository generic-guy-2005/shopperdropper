<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

            * {
                font-family: 'Inter', 'Times New Roman', Times, serif;
            }
        </style>
        <link rel="icon" href="logo.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    </head>

    <body>
        <div class="mt-5" style="margin-bottom:100px;">
            <div class="container mb-5" style="display:flex; gap:20px; justify-content:center;">
                <div style="display:flex; flex-direction:column; width: calc(50% - 10px); gap:20px;">
                    <div class="card mb-3 text-bg-primary" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/9949274.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Welcome Back!</h5> <br>
                                    <p class="card-text">We brought you the <u>horizon</u>!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 text-bg-warning" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/28070146_5400_6_07.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Don't have an account?</h5> <br>
                                    <p class="card-text">Don't worry pal! We got your back!</p>
                                    <a href="register.php" class="btn" style="background-color: white; color: #f0ad4e">Register Here!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-3" style="width: calc(50% - 10px); border: solid #0275d8">
                    <h3 style="position:absolute;right:20px">Log In</h3>
                    <form class="mt-5" action="" method="post">
                        <div class="mb-3 mt-3">
                            <label for="email" class="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Input Your Email" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="password">Password</label>
                            <input type="password" class="form-control" name="pass" id="pass" required>
                        </div>
                        <div style="display:flex; justify-content:center">
                            <input type="submit" name="login" id="login" class="btn btn-primary mb-3" value="Log In" style="width:100%">
                        </div>
                    </form>

                    <?php
                        if(isset($_POST['login'])){
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];

                            include 'connector.php';
                            $login = $connection -> query("SELECT * FROM users WHERE user_email='$email'");

                            if($login -> num_rows > 0){
                                $account = $login -> fetch_assoc();
                                $hash = $account['user_password'];
                                
                                if(password_verify($pass, $hash)){
                                    session_start();
                                    $_SESSION['login'] = TRUE;
                                    $_SESSION['id'] = $account['user_id'];
                                    $_SESSION['name'] = $account['user_name'];
                                    $_SESSION['email'] = $account['user_email'];
                                    $_SESSION['creation'] = $account['creation_date'];
                                    $_SESSION['authorization'] = $account['authorization'];
                                    $_SESSION['profile'] = $account['profile_img'];
                                    header("Location: index.php?page=intro");
                                    exit;
                                }
                                else{
                                    echo "<p style='color: red;'>Incorrect Password!</p>";
                                }
                            }
                            else{
                                echo "<p style='color: red;'>Account Not Found!</p>";
                            }
                        }
                    ?>

                </div>
            </div>
        </div>

        <footer class="footerStyle" style="background-color: #023c40; color:white; display:flex; gap:50px; padding-bottom:20px;">
            <div style="padding-left:10vw; padding-top:40px;">
                <h5>Details</h5>
                <p>This website made for educational purposes</p>
            </div>
            <div>
                <h5 style="padding-top:40px;">Author</h5>
                <p style="margin-bottom:0px;">Rahmat Jevi | 2401082017</p>
                <p style="margin-bottom:0px;">Politeknik Negeri Padang</p> <br>
                <div class="btn btn-success" style="width: 100%;">
                    <img src="assets/github-logo.png" style="height: 20px;">
                    <p style="margin-left: 5px; margin-bottom: 5px;">generic-guy-2005</p>
                </div>
            </div>
            <div>
                <h5 style="padding-top:40px;">Media</h5>
                <p style="margin-bottom:0px;">Freepik</p>
                <a href="https://www.freepik.com/author/macrovector">macrovector</a>
                <a href="https://www.freepik.com/author/creatives-stall-premium/icons">creative-stall-premium</a>
                <a href="https://www.freepik.com/author/freepik/icons">freepik</a>
                <a href="https://www.freepik.com/author/meaicon/icons">meaicon</a>
                <a href="https://www.freepik.com/author/logturnal">logturnal</a>
                <a href="https://www.freepik.com/author/stories">stories</a>
                <a href="https://www.freepik.com/author/catalyststuff">catalyststuff</a>
                <a href="https://www.freepik.com/author/juicy-fish">juicy-fish</a>
                <a href="https://www.freepik.com/author/studiogstock">studiogstock</a>
                <br> <br>
                <p style="margin-bottom:0px;">Flaticon</p>
                <a href="https://www.flaticon.com/free-icons/cat" title="cat icons">Cat icons created by Dave Gandy - Flaticon</a>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>