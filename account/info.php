<div class="container">
    <h2>Account Information</h2> <hr>

    <div style="display:flex; gap:50px;" class="mb-5">

        <?php

            if($_SESSION['profile'] == null){
                echo "<img src='profiles/account_circle_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png' style='width: 20%; aspect-ratio: 4/3'>";
            }
            else{
                echo "<img src='profiles/".$_SESSION['profile']."' style='width:20%; aspect-ratio:1/1; border-radius:50%'></img>";
            }

        ?>

        <div style="display:flex; flex-direction:column;">
            <h4><?= $_SESSION['name'] ?></h4>
            <h6>Details</h6>
            <p>Joined at <?= $_SESSION['creation'] ?></p>
            <p>Email: <?= $_SESSION['email'] ?></p>
            <p>Account Type: <?= $_SESSION['authorization'] ?> </p>

            <div style="display: flex; gap: 10px">
                <a href="index.php?folder=account&page=update_profile&id=<?= $_SESSION['id'] ?>" class="btn btn-warning" style="color: white">Update</a>
                <a class="btn btn-danger">Delete</a>
                <a href="logout.php" class="btn btn-secondary">Log Out</a>
            </div>
        </div>
    </div>

    <hr>

    <?php
        if($_SESSION['authorization'] == "Administrator"){
            include 'admin.php';
        }
        else if($_SESSION['authorization'] == "Supplier"){
            include 'supplier.php';
        }
        else{
            include 'customer.php';
        }
    ?>

</div>