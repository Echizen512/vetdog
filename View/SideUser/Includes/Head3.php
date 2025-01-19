<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../../assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="../../../assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="../../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../../css/style.css" rel="stylesheet">
    <link href="../../../assets/css/fullcalendar.css" rel="stylesheet" />
    <link href="../../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../assets/css/swal.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/lll.png" />
    <script src="../../../assets/js/popper.js"></script>
    <script src="../../../assets/js/tippy-bundle.umd.js"></script>
    <title>Vetdog - Beatriz Fagundez</title>
</head>
<body class="theme-red">
    <div class="overlay"></div>
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons"></i>
        </div>
        <input type="text" placeholder="Buscar...">
        <div class="close-search">
            <i class="material-icons">X</i>
        </div>
    </div>
    <section>
        <aside id="leftsidebar" class="sidebar">
            <div class="menu">
                <ul class="list">
                    <li class="header">MENÚ DE NAVEGACIÓN</li>
                    <li>
                        <a href="./../home.php">
                            <i class="material-icons">home</i>
                            <span>INICIO</span>
                        </a>
                    </li>

                    <li>
                        <a href="./../editProfile.php">
                            <i class="material-icons">person</i>
                            <span>PERFIL</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">flutter_dash</i>
                            <span>MASCOTAS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="./../pets/register.php">Registrar</a>
                            </li>
                            <li>
                                <a href="./../pets/list.php">Listar / Modificar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">calendar_today</i>
                            <span>CITAS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../quotes/newQuote.php">Pedir Cita</a>
                            </li>
                            <li>
                                <a href="../quotes/mostrar.php">Listar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">store</i>
                            <span>Tienda</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../sales/sales.php">Listado de Compras</a>
                                <a href="../venta/nuevo.php">Comprar Articulos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./../Veterinarian.php">
                            <i class="material-icons">chat</i>
                            <span>CHAT</span>
                        </a>
                    </li>
                    <li>
                        <a href="./../closeSession.php">
                            <i class="material-icons">input</i>
                            <span>Cerrar Sesión</span>
                        </a>
                    </li>
                    <aside id="rightsidebar" class="right-sidebar"></aside>
            </div>
    </section>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../panel-admin/administrador"> CONSULTORIO - BEATRIZ FAGUNDEZ </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i
                                class="material-icons">search</i></a></li>
                </ul>
            </div>
        </div>
    </nav>