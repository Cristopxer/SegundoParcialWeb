<?php
session_start();
if(isset($_POST['save'])){
    include("conexion.php");
    $conn = new conexion();    
    $name=$_POST['name'];
   $address=$_POST['address'];
   $tel=$_POST['tel'];
   $genre=$_POST['genre'];
   $email=$_POST['email'];
   $income=$_POST['income'];
   $query = "INSERT INTO CONTRIBUYENTE VALUES (null,'$name', '$address', '$tel', '$email',  '$genre', '$income')";
   $result= $conn->Ejecutar($query);
   if (!$result) {
       die("Query fail");
   }
   $_SESSION['msg']='Guardado Satisfactoriamente';

   header("Location: index.php");   
}
