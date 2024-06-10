<?php
    require_once('./admincp/config/dbhelp.php');
    function insertStudent(){
        if(isset($_POST['save'])){
            $idStudent = $name = $idClass = $gender = $birthOfDate = $address = '';
            if(isset($_POST['idStudent'])){
                $idStudent = $_POST['idStudent'];
            }
            if(isset($_POST['name'])){
                $name = $_POST['name'];
            }
            if(isset($_POST['idClass'])){
                $idClass = $_POST['idClass'];
            }
            if(isset($_POST['gender'])){
                $gender = $_POST['gender'];
            }
            if(isset($_POST['birthOfDate'])){
                $birthOfDate = $_POST['birthOfDate'];
            }
            if(isset($_POST['address'])){
                $address = $_POST['address'];
            }
            
            $idStudent = htmlspecialchars($idStudent);
            $name = htmlspecialchars($name);
            $idClass = htmlspecialchars($idClass);
            $gender = htmlspecialchars($gender);
            $birthOfDate = htmlspecialchars($birthOfDate);
            $address = htmlspecialchars($address);
    
            $sql = "INSERT INTO tblsinhvien (MaSV, HoTen, MaLop, GioiTinh, NgaySinh, DiaChi) VALUES ('$idStudent', '$name','$idClass','$gender','$birthOfDate','$address')";
            execute($sql);
    
            header('Location: student.php');
            die();
        }
    }
    insertStudent();

    function editStudent(){
        if(isset($_POST['edit'])){
            $idStudent = $name = $idClass = $gender = $birthOfDate = $address = '';
            if(isset($_POST['idStudent'])){
                $idStudent = $_POST['idStudent'];
            }
            if(isset($_POST['name'])){
                $name = $_POST['name'];
            }
            if(isset($_POST['idClass'])){
                $idClass = $_POST['idClass'];
            }
            if(isset($_POST['gender'])){
                $gender = $_POST['gender'];
            }
            if(isset($_POST['birthOfDate'])){
                $birthOfDate = $_POST['birthOfDate'];
            }
            if(isset($_POST['address'])){
                $address = $_POST['address'];
            }
            
            $idStudent = htmlspecialchars($idStudent);
            $name = htmlspecialchars($name);
            $idClass = htmlspecialchars($idClass);
            $gender = htmlspecialchars($gender);
            $birthOfDate = htmlspecialchars($birthOfDate);
            $address = htmlspecialchars($address);
    

            $sql = "UPDATE tblsinhvien SET HoTen='$name', MaLop='$idClass', GioiTinh='$gender', NgaySinh='$birthOfDate', DiaChi='$address' WHERE MaSV='$idStudent'";
            execute($sql);
            
            header('Location: student.php');
            die();

        }
    }
    editStudent();


    function deleteStudent(){
        if(isset($_POST['delete'])){
            $idStudent = $_POST['idStudent'];
            $sql = "DELETE FROM tblsinhvien WHERE MaSV='$idStudent'";
            execute($sql);

            header('Location: student.php');
            die();
        }
    }
    deleteStudent();


    function showStudent(){
       // Bắt đầu nội dung HTML
       $output = '';
       
       // Kết nối cơ sở dữ liệu và lấy danh sách sinh viên
       $count = 1;
       $sql = 'SELECT * FROM tblsinhvien';
       $studentList = executeResult($sql);
       
       // Thêm từng sinh viên vào bảng
       foreach ($studentList as $student) {
           $output .= '
           <tr id="'.$count.'" style="text-align: center;">
               <td>' . $count . '</td>
               <td>' . $student['MaSV'] . '</td>
               <td>' . $student['HoTen'] . '</td>
               <td>' . $student['MaLop'] . '</td>
               <td>' . $student['GioiTinh'] . '</td>
               <td>' . $student['NgaySinh'] . '</td>
               <td>' . $student['DiaChi'] . '</td>
               <td>
                   <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#showStudentModal" onclick="showStudent(
                        \''.htmlspecialchars($student['MaSV']).'\'
                   )">
                   
                   Xem
                   </button>

                   <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editStudentModal" onclick="editStudent(
                    \'' . htmlspecialchars($student['MaSV']) . '\',
                    \'' . htmlspecialchars($student['HoTen']) . '\',
                    \'' . htmlspecialchars($student['MaLop']) . '\',
                    \'' . htmlspecialchars($student['GioiTinh']) . '\',
                    \'' . htmlspecialchars($student['NgaySinh']) . '\',
                    \'' . htmlspecialchars($student['DiaChi']) . '\'
                    )">Sửa</button>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal" onclick="deleteStudent(
                        \''.htmlspecialchars($student['MaSV']).'\'
                    )">Xoá</button>
                              
               </td>
           </tr>';
           $count++;
       }
       
       // Kết thúc nội dung HTML
  
       // Xuất ra nội dung HTML
       echo $output;
   }

   function showStudentByID(){
    if(isset($_POST['check_view'])) {
        // Lấy mã sinh viên từ POST request
        if(isset($_POST['idStudent'])) {
            $idStudent = $_POST['idStudent'];
            $sql = "SELECT sv.MaSV, sv.HoTen, sv.GioiTinh, sv.NgaySinh, lop.TenLop, nganh.TenNganh, lop.HeDT, AVG(tbldiemhp.DiemHP) AS GPA 
            FROM tblsinhvien sv 
            LEFT JOIN tbllop lop ON sv.MaLop = lop.MaLop 
            JOIN tblnganh nganh ON lop.MaNganh = nganh.MaNganh 
            LEFT JOIN tbldiemhp ON sv.MaSV = tbldiemhp.MaSV 
            WHERE sv.MaSV = '$idStudent' 
            GROUP BY sv.MaSV;";
            
            // Thực hiện truy vấn cơ sở dữ liệu để lấy dữ liệu của sinh viên với mã sinh viên tương ứng
            // Ví dụ:
            // $sql = "SELECT subquery.MaSV, subquery.HoTen, subquery.MaLop, subquery.GioiTinh, subquery.NgaySinh, subquery.DiaChi, AVG(tbldiemhp.DiemHP) AS gpa FROM (SELECT * FROM tblsinhvien WHERE tblsinhvien.MaSV = '$idStudent') AS subquery LEFT JOIN tbldiemhp ON subquery.MaSV = tbldiemhp.MaSV GROUP BY(subquery.MaSV)";
            $studentDetail = executeResult($sql);
            echo json_encode($studentDetail);
            
            // // Xử lý kết quả và trả về dữ liệu (ví dụ: JSON)
       
        }
    }
   }
   showStudentByID();
    function search(){
        if(isset($_POST['action'])){
            if($_POST['action']=='searchRecord'){
                $input = $_POST['input'];
                $sql = "SELECT * FROM tblsinhvien WHERE MaSV LIKE '%$input%' OR HoTen LIKE '%$input%' OR MaLop LIKE '%$input%' OR  GioiTinh LIKE '%$input%' OR DiaChi LIKE '%$input%'";
                $nameStudent = executeResult($sql);
                $output ="";
                $count=1;
                if(count($nameStudent)>0){
                    foreach($nameStudent as $student){
                        $output .= '
                        <tr id="'.$count.'" style="text-align: center;">
                            <td>' . $count . '</td>
                            <td>' . $student['MaSV'] . '</td>
                            <td>' . $student['HoTen'] . '</td>
                            <td>' . $student['MaLop'] . '</td>
                            <td>' . $student['GioiTinh'] . '</td>
                            <td>' . $student['NgaySinh'] . '</td>
                            <td>' . $student['DiaChi'] . '</td>
                            <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#showStudentModal" onclick="showStudent(
                                     \''.htmlspecialchars($student['MaSV']).'\'
                                )">
                                
                                Xem
                                </button>
             
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editStudentModal" onclick="editStudent(
                                 \'' . htmlspecialchars($student['MaSV']) . '\',
                                 \'' . htmlspecialchars($student['HoTen']) . '\',
                                 \'' . htmlspecialchars($student['MaLop']) . '\',
                                 \'' . htmlspecialchars($student['GioiTinh']) . '\',
                                 \'' . htmlspecialchars($student['NgaySinh']) . '\',
                                 \'' . htmlspecialchars($student['DiaChi']) . '\'
                                 )">Sửa</button>
             
                                 <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal" onclick="deleteStudent(
                                     \''.htmlspecialchars($student['MaSV']).'\'
                                 )">Xoá</button>
                                           
                            </td>
                        </tr>';
                        $count++;
                    }
                    echo $output;
                }
                else{
                    echo '<h6 class="text-danger text-center mt-3 fs-3">Không tìm thấy dữ liệu</h6>';
                }
          
               
            }
        }

    }   
    search();

    function checkEmptySearchBar(){
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'showAllStudents') {
                echo showStudent(); // Hàm hiển thị toàn bộ sinh viên
            } 
        }
    }
    checkEmptySearchBar();


?>

