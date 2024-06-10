const toggleBtn = document.querySelector(".toggle-btn");

toggleBtn.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
});

function autocomplete(idStudent, name, idClass){
    document.getElementById("showIdStudent").value = idStudent;
    document.getElementById("showName").value = name;
    document.getElementById("showIdClass").value = idClass;
}

function autocompleteEdit(idStudent, name, idClass){
    document.getElementById("editIdStudent").value = idStudent;
    document.getElementById("editName").value = name;
    document.getElementById("editIdClass").value = idClass;
  
}





function importScore(){
    $(document).ready(function(){
        $("#saveScore").click(function(event){
            event.preventDefault();

            var action = 'insert';
            $.ajax({
                url: "crudScore.php",
                type: "POST",
                data: {
                    action: action,
                    idStudent: $("#idStudent").val(),
                    name: $("#name").val(),
                    idClass: $("#idClass").val(),
                    module1: $("#selectField1").val(),
                    score1: $("#score1").val(),
                },
                success:function(response){
                    alert(response);
                    location.reload();
                } 
            });
        });
    });
};

importScore(); 



function editScore(){
    $(document).ready(function(){
        $("#editScore").click(function(event){
            event.preventDefault();
            var action = 'edit';
            $.ajax({
                url: "crudScore.php",
                type: "POST",
                data: {
                    action: action,
                    idStudent: $("#editIdStudent").val(),
                    moduleEdit: $("#selectFieldEdit").val(),
                    scoreEdit: $("#scoreEdit").val(),
                },
                success:function(response){
                    alert(response);
                    location.reload();
                } 
            });
        });
    });
};
editScore();

function deleteStudent(idStudent){
 
    $(document).ready(function(){
        $("#deleteScore").click(function(event){
            event.preventDefault();
            var action = 'delete';
            
            $.ajax({
                url: "crudScore.php",
                type: "POST",
                data: {
                    action: action,
                    idStudent: idStudent,
                    moduleDelete: $("#selectFieldDelete").val(),
                },
                success:function(response){
                    alert(response);
                    location.reload();
                } 
            });
        });
    });
   
};

function showScoreByID(idStudent, name, idClass) {
    document.getElementById("idStudent").value = idStudent;
    document.getElementById("name").value = name;
    document.getElementById("idClass").value = idClass;

    var action = 'show';
    $.ajax({
        url: "testCrudScore.php",
        type: "POST",
        data: {
            action: action,
            idStudent: idStudent,
        },
        success: function (response) {
            if (response == 'Sinh viên chưa có điểm') {
                alert(response);
            }
            else {

                $('#showScoreModal').modal('show');
                var module1 = document.getElementById("selectField1").value = '1';
                var module2 = document.getElementById("selectField2").value = '2';
                var module3 = document.getElementById("selectField3").value = '3';
                var score1 = document.getElementById("score1");
                var score2 = document.getElementById("score2");
                var score3 = document.getElementById("score3");

                const data = JSON.parse(response);
                for (let i = 0; i < data.length; i++) {
                    if (data[i]['MaHP'] == 'HP01') {
                        score1.value = data[i]['DiemHP'];
                    }
                    else if (data[i]['MaHP'] == 'HP02') {
                        score2.value = data[i]['DiemHP'];
                    }
                    else {
                        score3.value = data[i]['DiemHP'];
                    }

                }


            }



        }
    });
};
