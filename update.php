<?php
include 'connect.php';
if(isset($_POST['updateId'])){
    $user_id=$_POST['updateId'];
    $sql= "SELECT * FROM `crud` where id=$user_id";
    $result=mysqli_query($con,$sql);
    $response=array();
    while($row=mysqli_fetch_array($result)){
        $response=$row;
    }
    echo json_encode($response);
}else{
    $response['status']=200;
    $response['message']="data not found";
}


?>