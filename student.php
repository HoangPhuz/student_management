<?php
require_once('./admincp/config/dbhelp.php');
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
    <link rel="stylesheet" href="./css/modalForm.css">

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
                    <a href="index.php" class="sidebar-link">
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
        <div class="main p-3">
            <div class="text-center">
                <h1 class="title">
                    Quản lý sinh viên
                </h1>
            </div>
            <div class="container" style="max-width: 50%;">
                <div class="text-center mt-5 mb-4"></div>
                <input type="text" class="form-control" id="searchBar" autocomplete="off" placeholder="Tìm kiếm...">

            </div>
            <div class="button-container">
                <button type="button" class="btn btn-lg fs-6" data-bs-toggle="modal" data-bs-target="#newStudentModal" style="background-color: #DC143C; color: white; width: 11rem; margin-left: 5rem; margin-top: 3rem;">
                    <i class='bx bx-plus' style='color:#ffffff'></i> Thêm sinh viên
                </button>
                <!-- <button class="btn btn-lg fs-6" style="background-color: #DC143C; color: white; width: 13rem; margin-top: 3rem;">
                    <i class='bx bx-list-ul' style='color:#ffffff'></i> Danh sách sinh viên
                </button> -->
            </div>
            <!--Hiển thị danh sách sinh viên-->
            <div class="d-flex">
                <table class="table table-striped table-bordered" style="margin-left: 5rem; margin-top: 1rem;">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">STT</th>
                            <th scope="col" style="text-align: center;">Mã sinh viên</th>
                            <th scope="col" style="text-align: center;">Họ tên</th>
                            <th scope="col" style="text-align: center;">Mã lớp</th>
                            <th scope="col" style="text-align: center;">Giới tính</th>
                            <th scope="col" style="text-align: center;">Ngày sinh</th>
                            <th scope="col" style="text-align: center;">Địa chỉ</th>
                            <th scope="col" style="text-align: center;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="data">
                        <?php
                        require_once('crudStudent.php');
                        echo showStudent();
                        ?>
                    </tbody>
                </table>
            </div>





            <!--Modal Form xem sinh viên-->
            <div class="modal fade" id="showStudentModal">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thông tin sinh viên</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="crudStudent.php" id="myFormShow">
                                <div class="inputField">
                                    <!-- <div>
                                        <input type="hidden" id="showIdStudent" name="showidStudent">
                                    </div> -->
                                    <div>
                                        <label for="showIdStudent">Mã sinh viên:</label>
                                        <input type="text" name="idStudent" id="showIdStudent" readonly>
                                    </div>
                                    <div>
                                        <label for="showName">Họ tên:</label>
                                        <input type="text" name="name" id="showName" readonly>
                                    </div>
                                    <div>
                                        <label for="showGender">Giới tính:</label>
                                        <input type="text" name="gender" id="showGender" readonly>
                                    </div>
                                    <div>
                                        <label for="showBirthOfDate">Ngày sinh:</label>
                                        <input type="date" name="birthOfDate" id="showBirthOfDate" readonly>
                                    </div>
                                    <div>
                                        <label for="showNameClass">Lớp:</label>
                                        <input type="text" name="showNameClass" id="showNameClass" readonly>
                                    </div>
                                    <div>
                                        <label for="showMajors">Ngành:</label>
                                        <input type="text" name="showMajors" id="showMajors" readonly>
                                    </div>
                                    <div>
                                        <label for="GPA">GPA:</label>
                                        <input type="text" name="GPA" id="GPA" readonly>
                                    </div>
                                    <div>
                                        <label for="typeCollege">Hệ đào tạo:</label>
                                        <input type="text" name="typeCollege" id="typeCollege" readonly>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>




            <!--Modal Form Thêm sinh viên-->
            <div class="modal fade" id="newStudentModal">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm sinh viên</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="crudStudent.php" id="myFormAdd">
                                <div class="inputField">
                                    <div>
                                        <label for="idStudent">Mã sinh viên:</label>
                                        <input type="text" name="idStudent" id="idStudent" required>
                                    </div>
                                    <div>
                                        <label for="name">Họ tên:</label>
                                        <input type="text" name="name" id="name" required>
                                    </div>
                                    <div>
                                        <label for="idClass">Mã lớp:</label>
                                        <input type="text" name="idClass" id="idClass" required>
                                    </div>
                                    <div>
                                        <label for="gender">Giới tính:</label>
                                        <input type="text" name="gender" id="gender" required>
                                    </div>
                                    <div>
                                        <label for="birthOfDate">Ngày sinh:</label>
                                        <input type="date" name="birthOfDate" id="birthOfDate" required>
                                    </div>
                                    <div>
                                        <label for="address">Địa chỉ:</label>
                                        <input type="text" name="address" id="address" required>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="submit" form="myFormAdd" class="btn btn-success" name="save">Lưu lại</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal Form Sửa sinh viên-->
            <div class="modal fade" id="editStudentModal">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Sửa thông tin</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="crudStudent.php" id="myFormEdit">
                                <div class="inputField">
                                    <div>
                                        <label for="editIdStudent">Mã sinh viên:</label>
                                        <input type="text" name="idStudent" id="editIdStudent" readonly>
                                    </div>
                                    <div>
                                        <label for="editName">Họ tên:</label>
                                        <input type="text" name="name" id="editName" required>
                                    </div>
                                    <div>
                                        <label for="editIdClass">Mã lớp:</label>
                                        <input type="text" name="idClass" id="editIdClass" required>
                                    </div>
                                    <div>
                                        <label for="editGender">Giới tính:</label>
                                        <input type="text" name="gender" id="editGender" required>
                                    </div>
                                    <div>
                                        <label for="editBirthOfDate">Ngày sinh:</label>
                                        <input type="date" name="birthOfDate" id="editBirthOfDate" required>
                                    </div>
                                    <div>
                                        <label for="editAddress">Địa chỉ:</label>
                                        <input type="text" name="address" id="editAddress" required>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="submit" form="myFormEdit" class="btn btn-success" name="edit">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal Form Xoá sinh viên-->
            <div class="modal fade" id="deleteStudentModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Xoá sinh viên</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="crudStudent.php" id="myFormDelete">
                                <div>
                                    <input type="hidden" id="deleteIdStudent" name="idStudent">
                                    <p>Bạn có chắc muốn xoá không?</p>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="submit" form="myFormDelete" class="btn btn-danger" name="delete">Xoá</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
</body>

</html>