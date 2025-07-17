<?php
    include 'connector.php';

    if(isset($_POST['upproduct'])){
        $name = $_POST['productname'];
        $type = $_POST['producttype'];
        $price = $_POST['productprice'];
        $desc = $_POST['productdesc'];
        $id = $_SESSION['id'];
        $product_id = $_GET['id'];

        $select = $connection -> query("SELECT product_img FROM products WHERE product_id = $product_id");
        $result = $select -> fetch_assoc();

        $img = $result['product_img'] ?? null;
        if(isset($_FILES['productimg']) && $_FILES['productimg']['error'] == 0){
            $folder = "uploads/";

            if(!is_dir("uploads/")){
                mkdir($folder, 0777, true);
            }

            $filename = $_FILES['productimg']['name'];
            $path = $folder . $filename;

            if(move_uploaded_file($_FILES['productimg']['tmp_name'], $path)){
                $img = $filename;
            }
            else{
                echo "<script> alert('Failed to upload files');
                window.location.href = 'index.php?folder=account&page=update_product&id=$id';
                </script>";
                exit;
            }
        }

        $sql = "UPDATE products SET product_name='$name', product_price=$price, type_id='$type', product_img='$img', product_desc='$desc' WHERE product_id=$product_id";
        $query = $connection -> query($sql);

        if($query === TRUE){
            echo "<script> alert('Product updated successfully');
            window.location.href = 'index.php?folder=account&page=info';</script>";
        }
        else {
            echo "<script> alert('Failed to update product');
                window.location.href = 'index.php?folder=account&page=update_product&id=$id';
                </script>";
        }
    }
?>