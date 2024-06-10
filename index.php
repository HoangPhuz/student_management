<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class 369</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/sidebar.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class='bx bx-menu'></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Menu</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class='bx bx-home'></i>
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="student.php" class="sidebar-link">
                        <i class='bx bx-user'></i>
                        <span>Sinh viên</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="score.php" class="sidebar-link">
                        <i class='bx bx-book-add' style='color:#ffffff'></i>
                        <span>Quản lý điểm</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class='bx bx-bar-chart-square'></i>
                        <span>Biểu đồ điểm</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link">
                    <i class='bx bx-log-out'></i>
                    <span>Đăng xuất</span>
                </a>
            </div>
        </aside>
        <div class="main p-3 img" style="background-image: url(./images/ok1.jpg);">
            <div class="text-center mt-4">
                <h1 class="title">
                    Class NHP
                </h1>
            </div>
            <div class="text-center mt-5">
            </div>
            <div class="d-flex mt-5 flex-column align-items-center">
                <h1 style="font-size: 2rem;   color: black; margin-top: 5rem; text-align: center; text-shadow: 2px 2px 5px rgba(233, 150, 122, 0.2);">Top 3 sinh viên có GPA cao nhất</h1>
                <table class="table table-striped table-condensed table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                            <th>Tên lớp</th>
                            <th>Tên ngành</th>
                            <th>GPA</th>
                        </tr>

                    </thead>
                    <tbody id="dataIndex">
                        <?php
                        require_once('dashboard.php');
                        echo topStudent();
                        ?>
                    </tbody>
                </table>

            </div>


        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>