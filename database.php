<?php

// session_start();

// define('servername', 'localhost');
// define('username', 'root');
// define('password', '');
// define('database', 'hallo');

// $conn = new mysqli('localhost','root','','hallo') or die(mysqli_error('Failed to connect'));

// if($conn){
//     // echo "Connection successfull";
// }





// $servername = ['localhost'];
// $username = ['root'];
// $password = [''];
// $database = ['hallo'];

// $conn = new mysqli('localhost','root','','hallo');
// if($conn){
//     // echo "connection successfull !";
//     ?>
     <!-- <script>
//         alert("connection successfull !")
//     </script> -->
     <?php
// }

session_start();

$conn = mysqli_connect('localhost','root','','hallo');

?>