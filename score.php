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
        <asi id="sidebar">
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
                    <i class='bx bx-book-add' style='color:#ffffff'  ></i>
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
        </asi de>
        <div class="main p-3">
            <div class="text-center">
                <h1 class="title">
                    Quản lý điểm
                </h1>
            </div>

            <!--Hiển thị danh sách sinh viên-->
            <div class="d-flex mt-5">
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
                    require_once('crudScore.php');
                    echo showStudent();
                ?>
               </tbody>
           </table>
       </div>

            
            <!--Modal Form Xem điểm-->
            <div class="modal fade" id="showScoreModal">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Xem điểm</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="crudScore.php" id="myFormShow">
                                <div class="inputField">
                                    <div>
                                        <label for="idStudent">Mã sinh viên:</label>
                                        <input type="text" name="idStudent" id="idStudent" >
                                    </div>
                                    <div>
                                        <label for="name">Họ tên:</label>
                                        <input type="text" name="name" id="name" readonly>
                                    </div>
                                    <div>
                                        <label for="idClass">Mã lớp:</label>
                                        <input type="text" name="idClass" id="idClass" readonly>
                                    </div>
                                    <div>
                                        <label for="selectField1">Học phần 1:</label>
                                        <select class="form-select" aria-label="Default select example" id="selectField1" style="width: 75%;" name="module1" disabled=true>
                                            <option value="1">Cơ sở dữ liệu</option>
                                            <option value="2">Lập trình web</option>
                                            <option value="3">Công nghệ phần mềm</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="score1">Điểm:</label>
                                        <input type="number" name="score1" id="score1" min="0" max="10" readonly>
                                    </div>

                                    <div>
                                        <label for="selectField2">Học phần 2:</label>
                                        <select class="form-select" aria-label="Default select example" id="selectField2" style="width: 75%;" name="module2" disabled=true>
                                            <option value="1">Cơ sở dữ liệu</option>
                                            <option value="2">Lập trình web</option>
                                            <option value="3">Công nghệ phần mềm</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="score1">Điểm:</label>
                                        <input type="number" name="score2" id="score2" min="0" max="10" readonly>
                                    </div>

                                    <div>
                                        <label for="selectField3">Học phần 3:</label>
                                        <select class="form-select" aria-label="Default select example" id="selectField3" style="width: 75%;" name="module3" disabled=true>
                                            <option value="1">Cơ sở dữ liệu</option>
                                            <option value="2">Lập trình web</option>
                                            <option value="3">Công nghệ phần mềm</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="score3">Điểm:</label>
                                        <input type="number" name="score3" id="score3" min="0" max="10" readonly>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!--Modal Form Nhập điểm-->
            <div class="modal fade" id="importScoreModal">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nhập điểm</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="crudScore.php" id="myFormAdd">
                                <div class="inputField">
                                    <div>
                                        <label for="showIdStudent">Mã sinh viên:</label>
                                        <input type="text" name="showIdStudent" id="showIdStudent" readonly>
                                    </div>
                                    <div>
                                        <label for="showName">Họ tên:</label>
                                        <input type="text" name="showName" id="showName" readonly>
                                    </div>
                                    <div>
                                        <label for="showIdClass">Mã lớp:</label>
                                        <input type="text" name="showIdClass" id="showIdClass" readonly >
                                    </div>
                                    <div>
                                        <label for="selectField1">Học phần:</label>
                                            <select class="form-select" aria-label="Default select example"  id="selectField1" style="width: 75%;" name="module1">
                                                    <option value="1">Cơ sở dữ liệu</option>
                                                    <option value="2">Lập trình web</option>
                                                    <option value="3">Công nghệ phần mềm</option>
                                            </select>  
                                    </div>
                                    <div>
                                        <label for="score1">Điểm:</label>
                                        <input type="number" name="score1" id="score1" min="0" max="10" required>
                                    </div>                                                       
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="submit" form="myFormAdd" class="btn btn-success" id="saveScore" name="saveScore">Lưu lại</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal Form Sửa điểm-->
            <div class="modal fade" id="editScoreModal">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Sửa điểm</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="crudScore.php" id="myFormEdit">
                                <div class="inputField">
                                    <div>
                                        <label for="editIdStudent">Mã sinh viên:</label>
                                        <input type="text" id="editIdStudent" readonly>
                                    </div>
                                    <div>
                                        <label for="editName">Họ tên:</label>
                                        <input type="text" id="editName" readonly>
                                    </div>
                                    <div>
                                        <label for="editIdClass">Mã lớp:</label>
                                        <input type="text" id="editIdClass" readonly >
                                    </div>
                                    <div>
                                        <label for="selectFieldEdit">Học phần:</label>
                                            <select class="form-select" aria-label="Default select example"  id="selectFieldEdit" style="width: 75%;">
                                                    <option value="1">Cơ sở dữ liệu</option>
                                                    <option value="2">Lập trình web</option>
                                                    <option value="3">Công nghệ phần mềm</option>
                                            </select>  
                                    </div>
                                    <div>
                                        <label for="scoreEdit">Điểm:</label>
                                        <input type="number" id="scoreEdit"  min="0" max="10" required>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="submit" form="myFormEdit" class="btn btn-success" id="editScore">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal Form Xoá điểm-->
            <div class="modal fade" id="deleteScoreModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Xoá điểm</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="crudScore.php" id="myFormDelete">
                                    <div>
                                        <input type="hidden" id="deleteIdStudent" name="idStudent">                         
                                        <label for="selectFieldDelete" >Học phần :</label>
                                            <select class="form-select" aria-label="Default select example"  id="selectFieldDelete" >
                                                    <option value="1">Cơ sở dữ liệu</option>
                                                    <option value="2">Lập trình web</option>
                                                    <option value="3">Công nghệ phần mềm</option>
                                            </select>  
                                            <br>
                                        <p>Bạn có chắc muốn xoá không?</p>
                                    </div>            
                            </form>
                            <div class="modal-footer">
                                <button type="submit" form="myFormDelete" class="btn btn-danger" id="deleteScore">Xoá</button>
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
    <script src="./js/sciprtScore.js"></script>
</body>

</html>