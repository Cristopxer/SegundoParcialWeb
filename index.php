<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contrib.</title>

    <!-- css, bootstrap & font-icons-->
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/bd8f2d1cf5.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row row-content">
            <div class="col-12">
                <?php if (isset($_SESSION['msg'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['msg'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset();
                } ?>
            </div>
        </div>
        <div class="row row-content">
            <div class="col-12 col-sm-8 offset-sm-2">
                <div class="card">
                    <h3 class="card-header card-primary text-white bg-dark">Ingresa Datos</h3>
                </div>
                <div class="card-body">
                    <form action="save.php" method="POST" name="save_form">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label offset-md-1">Nombre: </label>
                            <div class="col-12 col-md-8">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label offset-md-1">Direccion: </label>
                            <div class="col-12 col-md-8">
                                <input type="text" name="address" id="address" class="form-control" placeholder="Direccion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-md-2 col-form-label offset-md-1">Telefono: </label>
                            <div class="col-12 col-md-4">
                                <input type="tel" name="tel" id="tel" class="form-control" placeholder="Tel.">
                            </div>
                            <label for="genre" class="col-md-2 col-form-label">Genero: </label>
                            <div class="col-12 col-md-2">
                                <input type="text" name="genre" id="genre" class="form-control" placeholder="Genero">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label offset-md-1">Correo: </label>
                            <div class="col-12 col-md-8">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Correo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="income" class="col-md-2 col-form-label offset-md-1">Ingreso: </label>
                            <div class="col-12 col-md-4">
                                <input type="text" name="income" id="income" class="form-control" placeholder="Q.">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-md-9 col-md-3">
                                <input type="submit" class="btn btn-primary btn-block" name="save" value="Guardar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row row-content">
            <div class="col-12 col-10">
                <div class="table-responsive tableFixHead">
                    <table class="table table-striped">
                        <?php
                        include("conexion.php");
                        // Realizar una consulta MySQL
                        $conn = new conexion();
                        $sql = 'SHOW COLUMNS FROM CONTRIBUYENTE';
                        $res = $conn->Ejecutar($sql);
                        echo "<thead class='thead-dark'> <tr>\n";
                        while ($row = $res->fetch_assoc()) {

                            echo "<th class='text-center'>" . $row['Field'] . "</th>\n";
                        }
                        echo "<th class='text-center'>EDITAR</th>\n<th class='text-center'>ELIMINAR</th>\n</tr></thead>\n";
                        echo "<tbody>\n";
                        $query = "SELECT * FROM CONTRIBUYENTE";
                        $result = $conn->Ejecutar($query);
                        while ($line = $result->fetch_assoc()) {
                            echo "<tr>\n";
                            foreach ($line as $col_value) {
                                echo "<td class='text-center'>$col_value</td>\n";
                            }?>
                            <td class='text-center'><a href="edit.php?id=<?php echo $line['NIT'] ?>"><i class="fas fa-user-edit"></i></a></td>
                            <td class='text-center'><a href="delete.php?id=<?php echo $line['NIT'] ?>"><i class="far fa-trash-alt"></i></a></td>
                            <?php
                            echo "</tr>\n";
                        }
                        echo "</tbody>\n";
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</html>