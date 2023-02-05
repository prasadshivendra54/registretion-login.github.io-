<?php
include('database.php');

if(isset($_POST['register'])){
    $name =($_POST['name']);
    $email =($_POST['email']);
    $password =($_POST['password']); 
    $cpassword =($_POST['cpassword']);
    
    if(empty($name)){
        $error = "Enter your name !"; 
    }
    elseif(!preg_match_all("/^[a-zA-Z-' ]*$/",$name)){
        $error = "Only laters allowed !";
    }
    elseif(strlen($name) <2 || strlen($name) >30){
        $error = "Name must be more then 2 charecter !";
    }

    elseif(empty($email)){
        $error = "Enter your email !"; // filter_var($email, FILTER_SANITIZE_EMAIL) && filter_var($email, FILTER_VALIDATE_EMAIL) "this is not working"
    }

    elseif(empty($password)){
        $error = "Genrate your password !";
    }
    elseif(empty($cpassword)){
        $error = "Conform your password !";
    }
    elseif($password != $cpassword){
        $error = "Password does not match !";
    }
    elseif(strlen($password) <6){
        $error = "Password must be more then 6 charecter !";
    }

    else{
        $query= "SELECT * FROM hallodb WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            $error = "Email alredy exist !";
        }
        else{
            $password = password_hash($password,PASSWORD_DEFAULT); // $pass = md5($password); "we can use this also"
            $sql = "INSERT INTO hallodb (name, email, password) VALUES('$name','$email','$password')";
            mysqli_query($conn,$sql);
            header('location: login.php'); 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-page</title>
    <!-- BootStrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="font-family:Georgia, 'Times New Roman', Times, serif;">
    <section class="vh-100 bg-dark">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-3 text-center">

                            <a type="submit" value="Back" href="interface.php" class="btn btn-dark text-decoration-none text-light" style="margin-right: 350px">Home</a>

                            <h3 class="mb-1 fw-bold btn btn-dark">Register</h3>

                            <p style="color: red">
                            <?php
                            if(isset($error)){
                                echo '<span class="error-msg">'.$error.'</span>';
                            }
                            ?>
                            </p>

                            <form method="post" action="register.php">

                                <div class="form-outline mb-2">   
                                <input type="text" name="name" class="form-control form-control-lg" value="<?php if(isset($error)){echo $name ;}?>">
                                <label class="form-label" for="Email">Name</label>
                                </div>

                                <div class="form-outline mb-2">   
                                <input type="email" name="email" class="form-control form-control-lg" value="<?php if(isset($error)){echo $email ;}?>">
                                <label class="form-label" for="Email">Email</label>
                                </div>

                                <div class="form-outline mb-2">
                                <input type="password" name="password" class="form-control form-control-lg" value="<?php if(isset($error)){echo $password ;}?>">
                                <label class="form-label" for="Password">Password</label>
                                </div>

                                <div class="form-outline mb-2">
                                <input type="password" name="cpassword" class="form-control form-control-lg">
                                <label class="form-label" for="Conform Password">Conform Password</label>
                                </div>

                                <button name="register" class="btn btn-dark btn-lg btn-block mb-3">Register</button>

                                <h5 class="">already have account? <a class="text-decoration-none" href="login.php">Login</a></h5>

                                <hr class="my-1">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
