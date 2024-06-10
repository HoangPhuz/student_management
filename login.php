<?php
session_start();
require_once('./admincp/config/connect.php');
if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $sql = " SELECT * FROM tblUser WHERE email='$email' AND passWord='$password'";
    $resultset = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($resultset);
    if ($num_rows == 0) {
        echo '<script>alert("Tài khoản hoặc mật khẩu không chính xác!")</script>';
    } else {
        $row = mysqli_fetch_array($resultset);

        $_SESSION['email'] = $email;
        $_SESSION['passWord'] = $password;
        $_SESSION['fullName'] = $row['fullName'];

        header('Location: index.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/style.css">
    <title>Quản lý sinh viên</title>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-4 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-3 p-3 d-flex justify-content-center align-items-center flex-column left-box" style="background-color: #ECECEC;">
                <img src="./images/student-icon.png" alt="">
                <p class="display-4 text-center" style="color: red; font-family: Arial, Helvetica, sans-serif; font-weight: 600;">Class 369</p>
                <small class="text-wrap text-center" style="color: red; font-size: 18px; font-family: Arial, Helvetica, sans-serif; font-weight: 200;">Xây dựng và phát triển bởi Nguyễn Hoàng Phúc</small>

            </div>

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="text-center">
                        <img src="./images/Logo_PTIT_University.png" style="height: 8rem; width: 9rem;" class="img-fluid">
                    </div>
                    <p class="fs-2 text-center mt-2" style="color: #DC143C; font-family: Arial, Helvetica, sans-serif; font-weight: 600">ĐĂNG NHẬP</p>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-user'></i>
                            </span>
                            <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email đăng nhập" name="email" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-lock-alt'></i>
                            </span>
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Mật khẩu" name="password" required>
                        </div>
                        <div class="input-group mt-4">
                            <button class="btn btn-lg fs-6" style="background-color: #DC143C; color: white; width: 60%; margin-left: 5rem;" name="submit">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>