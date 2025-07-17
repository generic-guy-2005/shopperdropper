<?php

    include 'connector.php';
    if(isset($_POST['addproduct'])){
        $name = $_POST['productname'];
        $type = $_POST['producttype'];
        $price = $_POST['productprice'];
        $desc = $_POST['productdesc'];
        $id = $_SESSION['id'];

        $img = null;
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
                window.location.href = 'index.php?folder=product&page=add_product';
                </script>";
                exit;
            }
        }

        $sql = "INSERT INTO products(product_name, product_price, type_id, product_img, product_desc, user_id) VALUES ('$name', $price, '$type', '$img', '$desc', '$id')";
        $query = $connection -> query($sql);

        if($query === TRUE){
            echo "<script>window.location.href = 'index.php?folder=product&page=product_acknowledge';</script>";
        }
        else {
            echo "<script> alert('Failed');
                window.location.href = 'index.php?folder=product&page=product_view';
                </script>";
        }
    }
    else {
        echo "<script> alert('No Input');
                window.location.href = 'index.php?page=intro';
            </script>";
    }
?>