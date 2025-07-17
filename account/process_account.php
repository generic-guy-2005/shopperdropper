<?php

    include 'connector.php';
    if(isset($_POST['update_profile'])){
        if($_POST['name'] == null){
            $name = $_SESSION['name'];
        }
        else{
            $name = $_POST['name'];
        }

        if($_POST['email'] == null){
            $email = $_SESSION['email'];
        }
        else{
            $email = $_SESSION['email'];
        }

        $photo = null;
        if(isset($_FILES['profileimg']) && $_FILES['profileimg']['error'] == 0){
            $folder = "profiles/";

            if(!is_dir("profiles/")){
                mkdir($folder, 0777, true);
            }

            $filename = $_FILES['profileimg']['name'];
            $path = $folder . $filename;

            if(move_uploaded_file($_FILES['profileimg']['tmp_name'], $path)){
                $photo = $filename;
            }
            else{
                echo "<script> alert('Failed to upload files');
                    window.location.href = 'index.php?folder=account&page=update_profile';
                    </script>";
                exit;
            }
        }

        $id = $_SESSION['id'];
        $sql = "UPDATE users SET user_name = '$name', user_email = '$email', profile_img = '$photo' WHERE user_id = $id;";
        $query = $connection -> query($sql);

        if($query === TRUE){
            $currentUser = $connection -> query("SELECT * FROM users WHERE user_name='$name'");

            if($currentUser -> num_rows === 1){
                $updatedUser = $currentUser -> fetch_assoc();
                $_SESSION['name'] = $updatedUser['user_name'];
                $_SESSION['email'] = $updatedUser['user_email'];
                $_SESSION['profile'] = $updatedUser['profile_img'];
            }
            else{
                echo "<script> alert('Something went wrong!');
                    window.location.href = 'index.php?folder=account&page=info';
                    </script>";
            }

            echo "<script>window.location.href = 'index.php?folder=account&page=info';</script>";
        }
        else {
            echo "<script> alert('Failed');
                window.location.href = 'index.php?folder=account&page=info';
                </script>";
        }
    }
    elseif(isset($_POST['delete'])){
        $id = $_POST['id'];
        $connection -> query("DELETE FROM products WHERE user_id = $id");
        $connection -> query("DELETE FROM wallets WHERE user_id = $id");
        $connection -> query("DELETE FROM transactions WHERE user_id = $id");
        $result = $connection -> query("DELETE FROM users WHERE user_id = $id");

        if($result === TRUE){
            echo "<script> alert('User deleted successfully');
                window.location.href = 'index.php?folder=account&page=info';
                </script>";
        }
        else{
            echo "<script> alert('Failed to delete user');
                window.location.href = 'index.php?folder=account&page=info';
                </script>";
        }
    }
    else{
        echo "<script> alert('No Input');
                window.location.href = 'index.php?folder=account&page=info';
            </script>";
    }

?>