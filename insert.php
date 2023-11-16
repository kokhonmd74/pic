<?php
include 'connect.php';

extract($_POST);
if(isset($_POST['nameSend']) && isset($_POST['mathSend']) && isset($_POST['scienceSend']) && isset($_POST['englishSend']) && isset($_POST['banglaSend']) && isset($_POST['religionSend'])){

$sql="INSERT INTO `crud`(name,math,science,english,bangla,religion) VALUES ('$nameSend','$mathSend','$scienceSend','$englishSend','$banglaSend','$religionSend')";

$result= mysqli_query($con,$sql);

}



?>