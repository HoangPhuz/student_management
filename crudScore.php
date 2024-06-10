<?php



function showStudent(){
     // Bắt đầu nội dung HTML
     $output = '';
       
     // Kết nối cơ sở dữ liệu và lấy danh sách sinh viên
     $count = 1;
     $sql = 'SELECT * FROM tblsinhvien';

    include('./admincp/config/connect.php');     

     $resultset = mysqli_query($conn, $sql);
     $studentList = [];
     while ($row = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
         $studentList[] = $row;
     }
     mysqli_close($conn);


     
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
                <button type="button" class="btn btn-info" onclick="showScoreByID(
                    \'' . htmlspecialchars($student['MaSV']) . '\',
                    \'' . htmlspecialchars($student['HoTen']) . '\',
                    \'' . htmlspecialchars($student['MaLop']) . '\'
                )" id="showBtn">
                Xem
                </button>

                 <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importScoreModal" onclick="autocomplete(
                    \'' . htmlspecialchars($student['MaSV']) . '\',
                    \'' . htmlspecialchars($student['HoTen']) . '\',
                    \'' . htmlspecialchars($student['MaLop']) . '\'
                 )">
                 Nhập
                 </button>

                 <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editScoreModal" onclick="autocompleteEdit(
                    \'' . htmlspecialchars($student['MaSV']) . '\',
                    \'' . htmlspecialchars($student['HoTen']) . '\',
                    \'' . htmlspecialchars($student['MaLop']) . '\'
                 )">
                 Sửa
                 </button>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteScoreModal" onclick="deleteStudent(
                    \''.htmlspecialchars($student['MaSV']).'\'
                )">
                  Xoá
                  </button>
                            
             </td>
         </tr>';
         $count++;
     }
     
     // Kết thúc nội dung HTML

     // Xuất ra nội dung HTML
     echo $output;
}







function importScore(){
    if(isset($_POST['action'])){
        if($_POST['action']=='insert'){
            $idStudent = $module1 = $score1 = '';
            if(isset($_POST['idStudent'])){
                $idStudent = $_POST['idStudent'];
            }
            if(isset($_POST['module1'])){
                $module1 = $_POST['module1'];
                if($module1=='1'){
                    $module1 = 'Cơ sở dữ liệu';
                    $module1 = 'HP01';
                }
                elseif($module1=='2'){
                    $module1 = 'Lập trình web';
                    $module1 = 'HP02';
                }
                else{
                    $module1 = 'Công nghệ phần mềm';
                    $module1 = 'HP03';
                }     
            }
            if(isset($_POST['score1'])){
                $score1=$_POST['score1'];
            }

            $sql = "";
            if($score1!=''){
                $sql .= "INSERT INTO tbldiemhp (MaSV, MaHP, DiemHP) VALUES ('$idStudent', '$module1', '$score1');";

            }

            include('./admincp/config/connect.php');     
            $sql_check = "SELECT COUNT(*) AS records FROM tbldiemhp WHERE MaSV = '$idStudent' AND  MaHP = '$module1';";

            $resultset = mysqli_query($conn, $sql_check);
            $row = [];
            while ($rows = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
                $row[] = $rows;
            }


            if($row[0]['records']>0){
                echo "Sinh viên đã có điểm học phần này rồi!";
            }
            else{
                if(!empty($sql)){

                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    echo "Thêm thành công";

                }
                else{
                    echo "Điểm không để trống!";
                }        
            }


        }
    }
}
importScore();


function editScore(){
    if(isset($_POST['action'])){
        if($_POST['action']=='edit'){
            $idStudent = $moduleEdit = $scoreEdit = '';
            if(isset($_POST['idStudent'])){
                $idStudent = $_POST['idStudent'];
            }
            if(isset($_POST['moduleEdit'])){
                $moduleEdit = $_POST['moduleEdit'];
                if($moduleEdit=='1'){
                    $moduleEdit = 'Cơ sở dữ liệu';
                    $moduleEdit = 'HP01';
                }
                elseif($moduleEdit=='2'){
                    $moduleEdit = 'Lập trình web';
                    $moduleEdit = 'HP02';
                }
                else{
                    $moduleEdit = 'Công nghệ phần mềm';
                    $moduleEdit = 'HP03';
                }     
            }
            if(isset($_POST['scoreEdit'])){
                $scoreEdit=$_POST['scoreEdit'];
            }

            $sql = "";
            if($scoreEdit!=''){
                $sql .= "UPDATE tbldiemhp SET DiemHP ='$scoreEdit' WHERE MaSV='$idStudent' AND MaHP ='$moduleEdit';";

            }
            
            include('./admincp/config/connect.php');     
            $sql_check = "SELECT COUNT(*) AS records FROM tbldiemhp WHERE MaSV = '$idStudent' AND  MaHP = '$moduleEdit';";

            $resultset = mysqli_query($conn, $sql_check);
            $row = [];
            while ($rows = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
                $row[] = $rows;
            }
    
            if($row[0]['records']>0){
                if(!empty($sql)){
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    echo "Sửa thành công";
                }
                else{
                    echo "Điểm không được để trống!";
                }   
            }
            else{
                echo "Sinh viên chưa có điểm, chưa sửa được!!";

            }
        }
    }

}
editScore();


function deleteScore(){
    if(isset($_POST['action'])){
        if($_POST['action']=='delete'){
            $idStudent = $moduleDelete = '';
            if(isset($_POST['idStudent'])){
                $idStudent = $_POST['idStudent'];
            }
            if(isset($_POST['moduleDelete'])){
                $moduleDelete = $_POST['moduleDelete'];
                if($moduleDelete=='1'){
                    $moduleDelete = 'Cơ sở dữ liệu';
                    $moduleDelete = 'HP01';
                }
                elseif($moduleDelete=='2'){
                    $moduleDelete = 'Lập trình web';
                    $moduleDelete = 'HP02';
                }
                else{
                    $moduleDelete = 'Công nghệ phần mềm';
                    $moduleDelete = 'HP03';
                }     
            }

            include('./admincp/config/connect.php');     
            $sql_check = "SELECT COUNT(*) AS records FROM tbldiemhp WHERE MaSV = '$idStudent' AND  MaHP = '$moduleDelete';";

            $resultset = mysqli_query($conn, $sql_check);
            $row = [];
            while ($rows = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
                $row[] = $rows;
            }
            if($row[0]['records']>0){
                    $sql = "DELETE FROM tbldiemhp WHERE MaSV = '$idStudent' AND MaHP = '$moduleDelete';";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    echo "Xoá thành công";          
            }
            else{
                echo "Sinh viên chưa có điểm, không xoá được!!";
            }

        }
    }
    
}
deleteScore();

function showScoreByID(){
    if(isset($_POST['action'])){
        if($_POST['action']=='show'){
            $idStudent = '';
            if(isset($_POST['idStudent'])){
                $idStudent = $_POST['idStudent'];
            }
            include('./admincp/config/connect.php');     
            $sql= "SELECT * FROM tbldiemhp WHERE MaSV ='$idStudent';";
            $resultset = mysqli_query($conn, $sql);
            $result= [];
            while ($rows = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
                $result[] = $rows;
            }
            if(count($result) > 0){
                echo json_encode($result);
            }
            else{
                echo "Sinh viên chưa có điểm";
            }
            mysqli_close($conn);
        
        }
    }

}
showScoreByID();