<?php
    include 'connector.php';
    
    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $check = $connection -> query("SELECT * FROM products WHERE product_id = $id");
        if($check -> num_rows > 0){
            
            $sql = "DELETE FROM products WHERE product_id = $id";
            if($connection -> query($sql) === TRUE){
                echo "<script> alert('Product deleted successfully');
                window.location.href = 'index.php?folder=account&page=admin';</script>";
            } else {
                echo "<script> alert('Failed to delete product');
                window.location.href = 'index.php?folder=account&page=info';</script>";
            }
        } else {
            echo "<script> alert('Product not found');
            window.location.href = 'index.php?folder=account&page=admin';</script>";
        }
    }
?>