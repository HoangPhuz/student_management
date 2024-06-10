<?php
require_once('./admincp/config/dbhelp.php');

function topStudent()
{
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'topStudents') {
            $output = '';
            $sql = "SELECT sv.MaSV, sv.HoTen, lop.TenLop, nganh.TenNganh, AVG(dhp.DiemHP) AS GPA FROM tblsinhvien sv JOIN tbldiemhp dhp ON sv.MaSV = dhp.MaSV JOIN tbllop lop ON sv.MaLop = lop.MaLop JOIN tblnganh nganh ON lop.MaNganh = nganh.MaNganh GROUP BY sv.MaSV ORDER BY GPA DESC LIMIT 3;";
            $result = executeResult($sql);
            if(count($result)>0){
                foreach($result as $student){
                    $output .= '
                        <tr style="text-align: center;">
                            <td>' . $student['MaSV'] . '</td>
                            <td>' . $student['HoTen'] . '</td>
                            <td>' . $student['TenLop'] . '</td>
                            <td>' . $student['TenNganh'] . '</td>
                            <td>' . $student['GPA'] . '</td>
                        </tr>';
                }
                echo $output;
            }
            
        }
    }
}
topStudent();

