<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> PASWA 2022 </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                        <?php
                                    include("connection.php");

                                    if (isset($_POST['submit'])) {
                                        $user = mysqli_real_escape_string($mysqli, $_POST['username']);
                                        $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
                                        

                                        if ($user == "" || $pass == "") {
                                            echo "<script language=javascript>
                                    alert('Username atau Password Kosong');
                                    window.location='login.php';
                                </script>";
                                        } else {
                                            $result = mysqli_query($mysqli, "SELECT * FROM tab_user 
                                WHERE username='$user' AND password=md5('$pass')")
                                                or die("Instruksi tidak ditemukan");
                                            $row = mysqli_fetch_assoc($result);

                                            if (is_array($row) && !empty($row)) {
                                                $validuser = $row['username'];
                                                $_SESSION['valid'] = $validuser;
                                                $_SESSION['id'] = $row['id'];
                                            } else {
                                                echo "<script language=javascript>
                                            alert('Username atau Password salah');
                                            window.location='login.php';
                                        </script>";
                                            }

                                            if (isset($_SESSION['valid'])) {
                                                header('Location: dashboard.php');
                                            }
                                        }
                                    } else {
                                    ?>

                                        <form method="POST" action="">
                               
                                <h3>Login</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username">
                            <label for="floatingInput">Username </label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        
                        <input type="submit" name="submit" value="submit" class="btn btn-primary btn-user btn-block">
                        <a href="registrasi.php" class="btn btn-primary btn-user btn-block">Registrasi</a>
                                            <hr>
                                        </form>
                                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>