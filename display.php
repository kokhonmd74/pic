<?php
include 'connect.php';
if(isset($_POST['displaySend'])){
    $table='<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Sl No</th>
        <th scope="col">Student Name</th>
        <th scope="col">Math</th>
        <th scope="col">Science</th>
        <th scope="col">English</th>
        <th scope="col">Bangla</th>
        <th scope="col">Religion</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>';
    $sql= "SELECT * FROM `crud`";
    $result=mysqli_query($con,$sql);
    $number=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $math=$row['math'];
        $science=$row['science'];
        $english=$row['english'];
        $bangla=$row['bangla'];
        $religion=$row['religion'];
        $table.='<tr>
        <td scope="row">'.$number.'</td>
        <td>'.$name.'</td>
        <td>'.$math.'</td>
        <td>'.$science.'</td>
        <td>'.$english.'</td>
        <td>'.$bangla.'</td>
        <td>'.$religion.'</td>
        <td>
    <button class="btn btn-dark onclick="GetDetails('.$id.')">Update</button>
    <button class="btn btn-danger" onclick="DeleteUser('.$id.')">Delete</button>
    <button class="btn btn-Black">print</button>
</td>
      </tr>';
      $number++;
    }
    $table.='</table>';
    echo $table;
}

?>

