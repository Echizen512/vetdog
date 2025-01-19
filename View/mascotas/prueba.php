<?php
session_start();

if (!isset($_SESSION['adminID'])) {
    header('location: ../vista/login.php');
    exit();
}

require_once '../../assets/db/connectionMysql.php';

// Manejo de la creación, actualización y eliminación de animales
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        // Agregar nuevo animal
        $nombre = $_POST['nomas'];
        $edad = $_POST['edad'];
        $tipo = $_POST['id_tiM'];
        $condicion = $_POST['condicion'];
        $estado = $_POST['estado'];
        
        // Manejo de la imagen
        $imagen = $_FILES['imagen']['name'];
        $rutaImagen = "../../assets/img/animales/" . basename($imagen);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);

        $query = "INSERT INTO animales (nombre, edad, tipo, condicion, imagen, estado) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("siissss", $nombre, $edad, $tipo, $condicion, $imagen, $estado);

        if ($stmt->execute()) {
            echo 'Animal agregado exitosamente.';
        } else {
            echo 'Error al agregar el animal: ' . $conn->error;
        }
        $stmt->close();

    } elseif (isset($_POST['update'])) {
        // Actualizar animal
        $id_animal = $_POST['id_animal'];
        $nombre = $_POST['nomas'];
        $edad = $_POST['edad'];
        $tipo = $_POST['id_tiM'];
        $condicion = $_POST['condicion'];
        $estado = $_POST['estado'];

        $query = "UPDATE animales SET nombre = ?, edad = ?, tipo = ?, condicion = ?, estado = ? WHERE id_animal = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("siissi", $nombre, $edad, $tipo, $condicion, $estado, $id_animal);

        if ($stmt->execute()) {
            echo 'Animal actualizado exitosamente.';
        } else {
            echo 'Error al actualizar el animal: ' . $conn->error;
        }
        $stmt->close();

    } elseif (isset($_POST['delete'])) {
        // Eliminar animal
        $id_animal = $_POST['id_animal'];

        $query = "DELETE FROM animales WHERE id_animal = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_animal);

        if ($stmt->execute()) {
            echo 'Animal eliminado exitosamente.';
        } else {
            echo 'Error al eliminar el animal: ' . $conn->error;
        }
        $stmt->close();
    }
}

// Consulta de animales
$query = "SELECT id_animal, nombre, edad, tipo, condicion, imagen, estado FROM animales";
$result = $conn->query($query);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

$animales = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $animales[] = $row;
    }
} else {
    echo "No se encontraron animales.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Vetdog - Gestión de Animales</title>
    <link rel="shortcut icon" href="../../assets/img/ico.png" type="image/x-icon" />
    <link href="../../assets/css/vendor.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>

<body>
<section class="content">
    <div class="container-fluid">
        <div class="alert alert-info">
            <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
        </div>

        <!-- Formulario para agregar y actualizar animales -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>REGISTRO DE NUEVAS MASCOTAS</h2>
                    </div>
                    <div class="body">
                        <form method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="control-label">Nombre de la mascota<span class="text-danger">*</span></label>
                                            <input type="text" name="nomas" class="form-control" placeholder="Nombre de la mascota..." required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="control-label">Edad de la mascota<span class="text-danger">*</span></label>
                                            <input type="text" name="edad" class="form-control" placeholder="Edad de la mascota..." required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="control-label">Tipo de la mascota<span class="text-danger">*</span></label>
                                            <input type="text" name="tipo" class="form-control" placeholder="Tipo de la mascota..." required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="control-label">Condición<span class="text-danger">*</span></label>
                                            <input type="text" name="condicion" class="form-control" placeholder="Condición..." required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="control-label">Estado<span class="text-danger">*</span></label>
                                            <input type="text" name="estado" class="form-control" placeholder="Estado..." required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label class="control-label">Imagen de la mascota<span class="text-danger">*</span></label>
                                            <input type="file" name="imagen" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid" align="center">
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    <a type="button" href="#" class="btn bg-red"><i class="material-icons">cancel</i> LIMPIAR </a>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    <button class="btn bg-green" name="add">GUARDAR<i class="material-icons">save</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de animales -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ANIMALES REGISTRADOS</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nº</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Edad</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Condición</th>
                                        <th class="text-center">Imagen</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($animales as $index => $animal): ?>
                                        <tr>
                                            <td class="text-center"><?= $index + 1 ?></td>
                                            <td class="text-center"><?= $animal['nombre'] ?></td>
                                            <td class="text-center"><?= $animal['edad'] ?></td>
                                            <td class="text-center"><?= $animal['tipo'] ?></td>
                                            <td class="text-center"><?= $animal['condicion'] ?></td>
                                            <td class="text-center"><img src="../../assets/img/animales/<?= $animal['imagen'] ?>" width="50" height="50"></td>
                                            <td class="text-center"><?= $animal['estado'] ?></td>
                                            <td class="text-center">
                                                <form method="POST" style="display:inline-block;">
                                                    <input type="hidden" name="id_animal" value="<?= $animal['id_animal'] ?>">
                                                    <button class="btn btn-danger" name="delete" onclick="return confirm('¿Estás seguro de que deseas eliminar este animal?');">Eliminar</button>
                                                </form>
                                                <button class="btn btn-warning" onclick="editAnimal(<?= $animal['id_animal'] ?>, '<?= $animal['nombre'] ?>', <?= $animal['edad'] ?>, '<?= $animal['tipo'] ?>', '<?= $animal['condicion'] ?>', '<?= $animal['estado'] ?>');">Editar</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function editAnimal(id, nombre, edad, tipo, condicion, estado) {
        $('input[name="nomas"]').val(nombre);
        $('input[name="edad"]').val(edad);
        $('input[name="tipo"]').val(tipo);
        $('input[name="condicion"]').val(condicion);
        $('input[name="estado"]').val(estado);
        $('input[name="id_animal"]').val(id);
        $('form').attr('method', 'POST');
        $('button[name="add"]').hide();
        $('button[name="update"]').show();
    }
</script>
</body>
</html>
