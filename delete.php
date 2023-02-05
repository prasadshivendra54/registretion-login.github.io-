<?php
include("database.php");

unset($_SESSION['IS_LOGINUSER']);
// unset($_SESSION['IS_LOGINADMIN']);


if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "delete from hallodb where id=$id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("location: admin.php");
    }
    else{
        die();
    }
}

?>