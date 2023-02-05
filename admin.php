
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-page</title>
    <!-- BootStrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light py-4">
        <div class="container">
            <div class="navbar-brand">
                <h3 class="fw-bold bg-danger text-light"><i class="bi bi-person-vcard-fill"></i> Hallo-Admin:- <br> <span class="fw-bold bg-dark text-light">
                    <?php
                    include("database.php"); // this is database file
                    if(!isset($_SESSION['IS_LOGINADMIN'])){
                        header("location: login.php");
                        die();
                    }
                    echo $_SESSION['EMAIL'];
                    ?>
                </span></h3>
            </div>

            <div class="">
                <a class="btn btn-dark" href="logout.php">logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="content py-5" style="font-family: 'Nothing You Could Do', cursive;">
            <h2 class="text-center"><span class="bg-dark text-light">Welcome...to techAI</span></h2>

            <h1 class="text-center">This is your Dashbord<span class=""></span></h1>
        </div>

    </div>


<!-- Admin dashboard data -->

    <div class="container">
        <table class="table">
            <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            </tr>
    <?php

    // include("database.php"); // database file is already connected, no need to connect again. 

    $sql = "Select * from hallodb";
    $result = mysqli_query($conn, $sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            echo "<tr>
            <td>$id</td>
            <td>$name</td>
            <td>$email</td>
            <td>$password</td>
            <td>
                <button class='btn btn-danger'><a class='text-light' href='delete.php? deleteid=$id'>Delete</a></button>
                </td>  
            </tr>";
        }
    }
    ?>
    </table>
    </div>
</body>
</html>