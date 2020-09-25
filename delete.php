<?php session_start(); ?>
<?php include("conexion.php");

if (isset($_GET['id'])) {
    $conn = new conexion();
    $nit = $_GET['id'];
    $query = "DELETE FROM CONTRIBUYENTE WHERE NIT = $nit";
    $result = $conn->Ejecutar($query);
    if (!$result) {
        die("Query failed");
    }
    $_SESSION['msg'] = 'Tarea Eliminada Satisfactoriamente';
    header("Location: index.php");
}


?>