<?php session_start(); ?>
<?php
include("conexion.php");
if (isset($_GET['id'])) {
    $conn = new conexion();
    $nit = $_GET['id'];
    $query = "SELECT * FROM CONTRIBUYENTE WHERE NIT = $nit";
    $result = $conn->Ejecutar($query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row[1];
        $address = $row[2];
        $tel = $row[3];
        $email = $row[4];
        $genre = $row[5];        
        $income = $row[6];
    }
    $conn->CerrarConexion();
}

if (isset($_POST['update'])) {
    $conn = new conexion();
    $nit = $_GET['id'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $income = $_POST['income'];
    $query = "UPDATE CONTRIBUYENTE SET DIRECCION = '$address',TELEFONO = $tel, EMAIL = '$email', INGRESOS = $income WHERE NIT = $nit";
    if($conn->Ejecutar($query)){
        $_SESSION['msg'] = "Dato Actualizado Correctamente";
    }else{
        $_SESSION['msg'] = "->Dato no Actualizado<-";
    }
    $conn->CerrarConexion();
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Actualizar</title>

    <!-- css, bootstrap & font-icons-->
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/bd8f2d1cf5.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row row-content">
            <div class="col-12 col-sm-8 offset-sm-2">
                <div class="card">
                    <h3 class="card-header card-primary text-white bg-dark">Actualiza Datos</h3>
                </div>
                <div class="card-body">
                    <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="form-group row">
                            <label for="nit" class="col-md-2 col-form-label offset-md-1">Nit: </label>
                            <div class="col-12 col-md-8">
                                <input type="text" name="nit" id="nit" class="form-control" placeholder="Nit" disabled value="<?php echo $nit; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label offset-md-1">Nombre: </label>
                            <div class="col-12 col-md-8">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" disabled value="<?php echo $name; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label offset-md-1">Direccion: </label>
                            <div class="col-12 col-md-8">
                                <input type="text" name="address" id="address" class="form-control" placeholder="Direccion" value="<?php echo $address; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-2 col-form-label offset-md-1">Telefono: </label>
                            <div class="col-12 col-md-4">
                                <input type="tel" name="tel" id="tel" class="form-control" placeholder="Tel." value="<?php echo  $tel; ?>">
                            </div>
                            <label for="genre" class="col-md-2 col-form-label">Genero: </label>
                            <div class="col-12 col-md-2">
                                <input type="text" name="genre" id="genre" class="form-control" placeholder="Genero" disabled value="<?php echo $genre; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label offset-md-1">Correo: </label>
                            <div class="col-12 col-md-8">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Correo" value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="income" class="col-md-2 col-form-label offset-md-1">Ingreso: </label>
                            <div class="col-12 col-md-4">
                                <input type="text" name="income" id="income" class="form-control" placeholder="Q." value="<?php echo $income; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-md-9 col-md-3">
                                <input type="submit" class="btn btn-primary btn-block" name="update" value="Actualizar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>