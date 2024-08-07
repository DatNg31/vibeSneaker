<?php
include('../includes/config.php');
if (isset($_POST['gui'])) {
    $name = $_POST['ten'];
    $email = $_POST['email'];
    $note = $_POST['note'];
    $sql = "INSERT INTO lienhe (ten, email, note) VALUES ('$name', '$email', '$note')";
    

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Bạn đã thêm thành công!');
        window.history.back();
        </script>";
        
    }
    
    exit();
}
