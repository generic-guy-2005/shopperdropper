<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log Out</title>
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
        <?php
            session_start();
            session_destroy();
        ?>

        <div class="container mt-5" style="display:flex; gap: 20px; justify-content:center; padding-top: 10%; padding-bottom: 10%">
            <img src="assets/3d_delivery_box_parcel.jpg" style="width: 15%">
            <div style="display: flex; flex-direction:column; gap:30px">
            <h5>You Have Been Logged Out!</h5>
                <div>
                    <a href="index.php?page=intro" class="btn btn-primary" style="width:100%">Confirm</a>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    </body>
</html>
