<?php

include('database.php'); // database connection file

if(isset($_POST['login'])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM hallodb WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $verifypassword = password_verify($password,$row['password']); // this is for verify or check password is currect is or not
        if($verifypassword==1){

            $_SESSION['IS_LOGINUSER'] = true;
            $_SESSION['EMAIL'] = $row['email'];
            if($row["usertype"]=="user"){
                header("location: user.php");
            }

            $_SESSION['IS_LOGINADMIN'] = true;
            $_SESSION['EMAIL'] = $row['email'];
            if($row["usertype"]=="admin"){
                header("location: admin.php");
            }
        }else{
            echo '<script>
                alert("password does not match \n please try again !")
            </script>';
        }
    }else{
        echo '<script>
            alert("This email is not registered. \n Please make your account... !")
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-page</title>
    <!-- BootStrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="font-family:Georgia, 'Times New Roman', Times, serif;">
    <section class="vh-100 bg-dark">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-6 col-lg-5 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-3 text-center">

                            <a type="submit" value="Back" href="interface.php" class="btn btn-dark text-decoration-none text-light" style="margin-right: 350px">Home</a>

                            <h2 class="mb-3 fw-bold">Log In</h2>

                            <form method="post" action="login.php">

                                <div class="form-outline mb-2">
                                <input type="email" name="email" class="form-control form-control-lg" required>
                                <label class="form-label" for="Email">Email</label>
                                </div>

                                <div class="form-outline mb-2">
                                <input type="password" name="password" class="form-control form-control-lg" required>
                                <label class="form-label" for="Password">Password</label>
                                </div>

                                <button name="login" class="btn btn-dark btn-lg btn-block mb-3">Login</button>

                                <h5 class="">Don't have account! <a class="text-decoration-none" href="register.php">Register</a></h5>

                                <hr class="my-2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
