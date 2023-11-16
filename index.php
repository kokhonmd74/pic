<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Bootstrap Model 1</title>
    <!--Bootstrap CSS --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Student Result </h5>
      </div>
      <div class="modal-body">
  <div class="form-group">
    <label for="name">Student Name</label>
    <input type="name" class="form-control" id="completeName" placeholder="Enter Your Name">
  </div>
  <div class="form-group">
    <label for="math">Math</label>
    <input type="number" class="form-control" id="completeMath" placeholder="Enter Your Math Score">
  </div>
  <div class="form-group">
    <label for="science">Science</label>
    <input type="number" class="form-control" id="completeScience" placeholder="Enter Your Science Score">
  </div>
  <div class="form-group">
    <label for="english">English</label>
    <input type="number" class="form-control" id="completeEnglish" placeholder="Enter Your English Score">
  </div>
  <div class="form-group">
    <label for="bangla">Bangla</label>
    <input type="number" class="form-control" id="completeBangla" placeholder="Enter Your Bangla Score">
  </div>
  <div class="form-group">
    <label for="religion">Religion</label>
    <input type="number" class="form-control" id="completeReligion" placeholder="Enter Your Religion Score">
  </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-dark" onclick="addUser()">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- update modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Details</h5>
      </div>
      <div class="modal-body">
  <div class="form-group">
    <label for="updateName">Student Name</label>
    <input type="name" class="form-control" id="updateName" placeholder="Enter Your Name">
  </div>
  <div class="form-group">
    <label for="updateMath">Math</label>
    <input type="number" class="form-control" id="updateMath" placeholder="Enter Your Math Score">
  </div>
  <div class="form-group">
    <label for="updateScience">Science</label>
    <input type="number" class="form-control" id="updateScience" placeholder="Enter Your Science Score">
  </div>
  <div class="form-group">
    <label for="updateEnglish">English</label>
    <input type="number" class="form-control" id="updateEnglish" placeholder="Enter Your English Score">
  </div>
  <div class="form-group">
    <label for="updateBangla">Bangla</label>
    <input type="number" class="form-control" id="updateBangla" placeholder="Enter Your Bangla Score">
  </div>
  <div class="form-group">
    <label for="updateReligion">Religion</label>
    <input type="number" class="form-control" id="updateReligion" placeholder="Enter Your Religion Score">
  </div>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-dark">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="hidden" id="hiddenData">
      </div>
    </div>
  </div>
</div>

    <div class="container my-3">
        <h1 class="text-center">Display Data from Database</h1>
        <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#completeModal">
  Add New
</button>
<div id="displayDataTable"></div>
    </div>






<!--Bootstrap JavaScript --->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>--->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>



<script>
    $(document).ready(function(){
        displayData();
    });
    //display function
    function displayData(){
        var displayData="true";
        $.ajax({
            url:"display.php",
            type:'post',
            data: {
                displaySend:displayData
            },
            success:function(data,status){
            $('#displayDataTable').html(data);
            }
        });
    } 
function addUser(){
    var nameAdd=$('#completeName').val();
    var mathAdd=$('#completeMath').val();
    var scienceAdd=$('#completeScience').val();
    var englishAdd=$('#completeEnglish').val();
    var banglaAdd=$('#completeBangla').val();
    var religionAdd=$('#completeReligion').val();
    $.ajax({
        url:"insert.php",
        type:'post',
        data:{
            nameSend: nameAdd,
            mathSend: mathAdd,
            scienceSend: scienceAdd,
            englishSend: englishAdd,
            banglaSend: banglaAdd,
            religionSend: religionAdd
        },
        success:function(data,status){
        //function to display data;
        //console.log(status);
        displayData();
    }
    });
}

//Delete Record
function DeleteUser(deleteId){
    $.ajax({
        url:"delete.php",
        type:'post',
        data:{
            deleteSend:deleteId
        },
            success:function(data,status){
                displayData();
            }
    });
}

//Update Function 
function GetDetails(updateId){
    $('#hiddenData').val(updateId);

    $.post("update.php",{updateId:updateId},function(data,status){
    var userId=JSON.parse(data);
    $('#updateName').val(userId.name);
    $('#updateMath').val(userId.math);
    $('#updateScience').val(userId.science);
    $('#updateEnglish').val(userId.english);
    $('#updateBangla').val(userId.bangla);
    $('#updateReligion').val(userId.religion);
    });

$('#updateModal').modal('show');
}
</script>

</body>
</html>