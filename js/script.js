const toggleBtn = document.querySelector(".toggle-btn");

toggleBtn.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
});



//xem chi tiết sinh viên
function showStudent(idStudent) {

    $.ajax({
        url: 'crudStudent.php', // Đường dẫn trống tức là gửi yêu cầu đến trang hiện tại
        type: 'POST',
        data: {
            'check_view': true, // Thực hiện hành động get_student_data trong PHP
            'idStudent': idStudent, // Dữ liệu gửi đi: mã sinh viên
        },
        success: function (response) {
            // Hiển thị dữ liệu trả về từ PHP
            var data = JSON.parse(response);
            document.getElementById("showIdStudent").value = data[0]['MaSV'];
            document.getElementById("showName").value = data[0]['HoTen'];
            document.getElementById("showGender").value = data[0]['GioiTinh'];
            document.getElementById("showBirthOfDate").value = data[0]['NgaySinh'];
            document.getElementById("showNameClass").value = data[0]['TenLop'];
            document.getElementById("showMajors").value = data[0]['TenNganh'];
            document.getElementById("GPA").value = data[0]['GPA'];
            document.getElementById("typeCollege").value = data[0]['HeDT'];


            // Hiển thị dữ liệu trong modal hoặc thực hiện các thao tác khác tại đây
        }
    });

}



function editStudent(idStudent, name, idClass, gender, birthOfDate, address) {
    document.getElementById("editIdStudent").value = idStudent;
    document.getElementById("editName").value = name;
    document.getElementById("editIdClass").value = idClass;
    document.getElementById("editGender").value = gender;
    document.getElementById("editBirthOfDate").value = birthOfDate;
    document.getElementById("editAddress").value = address;

}



function deleteStudent(idStudent, idModule) {
    document.getElementById("deleteIdStudent").value = idStudent;
}


function showAllStudents() {
    $.ajax({
        url: 'crudStudent.php',
        type: 'POST',
        data: { action: 'showAllStudents' },
        success: function (response) {
            $("#data").html(response);
        }
    });
}



//search

function search() {
    $(document).ready(function () {
        $("#searchBar").keyup(function (e) {
            e.preventDefault();
            var action = 'searchRecord';
            var input = $("#searchBar").val();
            if (input != '') {
                $.ajax({
                    url: "crudStudent.php",
                    method: "POST",
                    data: {
                        action: action,
                        input: input
                    },
                    success: function (response) {
                        $("#data").html(response);
                    }
                });
            }
            else {
                showAllStudents();
            }
        });

    });
};
search();


function topStudent() {

    $.ajax({
        url: 'dashboard.php',
        type: 'POST',
        data: { action: 'topStudents' },
        success: function (response) {
            $("#dataIndex").html(response);
        }
    });
}
topStudent();

