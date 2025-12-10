<?php
    // Login State
    include 'connector.php';
    session_start();

    if(!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }
?>

<!doctype html>

    <!-- TODOs
    #1 Navigation Bar [Done]
    #2 Introduction Card 
    
    PENTING!!!!
    JANGAN PERNAH BUKA cursed.php | BAHAYA: ANCAMAN DUNIA

    -->

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ShopperDropper</title>
        <link href="style.css" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

            * {
                font-family: 'Inter', 'Times New Roman', Times, serif;
            }
        </style>
        <!-- Akhirnya font nya bisa di import -->
        <link rel="icon" href="logo.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    </head>

    <body>

        <nav class="navbar navbar-expand" data-bs-theme="light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?page=intro">
                    <img src="logo.png" style="width: 30px">
                    ShopperDropper
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item p-3">
                            <a class="navButton" href="index.php?page=intro" style="text-decoration: none;">Home</a>
                        </li>
                        <li class="nav-item p-3">
                            <a class="navButton" href="index.php?folder=product&page=product_view" style="text-decoration: none;">Product</a>
                        </li>
                        <li class="nav-item p-3">
                            <a class="navButton" href="index.php?folder=catalog&page=catalog_view" style="text-decoration: none;">Catalog</a>
                        </li>
                    </ul>

                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['name'] ?>
                    </a>
                    <div style="position:absolute; right:222px; margin-top:40px">
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?folder=account&page=info">Information</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                        <li><hr class="dropdown-divider" style="height:fit-content"></li>
                        <li><p class="dropdown-item">Authorization: <?= $_SESSION['authorization'] ?></p></li>
                    </ul>
                    </div>

                    <div style="overflow: hidden; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; margin-left: 10px; border-radius: 50%">
                    <?php
                        if($_SESSION['profile'] != null){
                    ?>
                        <img src="profiles/<?= $_SESSION['profile'] ?>" alt="" style="width:100%; height:100%; border-radius: 50%; object-fit: cover;">
                    <?php } else { ?>
                        <img src="profiles/account_circle_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" style="width:30px; margin-left:10px; border-radius: 50%">
                    <?php } ?>
                    </div>
                </div>
            </div>
        </nav>

        <div>
            <?php
                $folder = basename($_GET['folder'] ?? '');
                $page = basename($_GET['page'] ?? 'home');

                $file = $folder ? "$folder/$page.php" : "$page.php";
                if(file_exists($file)){
                    include $file;
                }
                else{
                    echo "Error 404: Page not found!";
                }
            ?>
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
            <div style="width:30%">
                <h5 style="padding-top:40px;">Media</h5>
                <p style="margin-bottom:0px;">Freepik</p>
                <a href="https://www.freepik.com/author/macrovector">macrovector</a>
                <a href="https://www.freepik.com/author/creatives-stall-premium/icons">creative-stall-premium</a>
                <a href="https://www.freepik.com/author/freepik/icons">freepik</a>
                <a href="https://www.freepik.com/author/meaicon/icons">meaicon</a>
                <a href="https://www.freepik.com/author/logturnal">logturnal</a>
                <a href="https://www.freepik.com/author/stories">stories</a>
                <a href="https://www.freepik.com/author/catalyststuff">catalyststuff</a> <br>
                <a href="https://www.freepik.com/author/juicy-fish">juicy-fish</a>
                <a href="https://www.freepik.com/author/studiogstock">studiogstock</a>
                <br> <br>
                <p style="margin-bottom:0px;">Flaticon</p>
                <a href="https://www.flaticon.com/free-icons/cat" title="cat icons">Cat icons created by Dave Gandy - Flaticon</a>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    </body>
</html>