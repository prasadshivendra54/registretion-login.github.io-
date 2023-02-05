
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-page</title>
    <!-- BootStrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light py-4">
        <div class="container">
            <div class="navbar-brand">
                <h3 class="fw-bold bg-danger text-light"><i class="bi bi-people-fill"></i></i> Hallo-User:- <br> <span class="fw-bold bg-dark text-light">
                            <?php // php script start
                            include("database.php");
                            if(!isset($_SESSION['IS_LOGINUSER'])){
                                header("location: login.php");
                                die();
                            }
                            echo $_SESSION['EMAIL'];
                            ?>
                        </span>
                </h3> 

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
</body>
</html>