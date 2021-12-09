<?php 

    session_start();
    if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../index.php");
        exit;
        }
$dni = $_SESSION['dni_u'];
?>
<?php 
include ('conection/bddumar.php');
/*
include ('conection/dbdumar.php');
  $registro=extraer("SELECT monto FROM tcaja_oficina where idO='CG' and ini='$fecha'");
          $r=mysqli_fetch_array($registro);
          */
$queryu = execute("select * from usuario where dni_u = '$dni'");
$datau= data($queryu);
$dniu = $datau['dni_u'];
$nombresu = $datau['nombres_u'];
$idu = $datau['idusuario'];
$_SESSION['idusuario']= $idu ;
$tipou = $datau['tipo_u'];
$_SESSION['tipo_u']= $tipou ;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SOFT - Negocios y Servicios Generales</title>
    <!-- Bootstrap Core CSS -->
 <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- <link rel="stylesheet" type="text/css" href="simplevoice/css/bootstrap.min.css">-->
    <link href="../css/style.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="../img/logosoft0.png"/>
    <!-- MetisMenu CSS -->
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom CSS -->
 <script src="../vendor/jquery/jquery.min.js"></script> 
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script src="../js/custom2.js"></script>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--
               <a class="navbar-brand" href="principal_p.php"><img width="237" height="33" src="../img/imgdumar.png"></a>-->
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                      
                         <li><a href="modificar_usuario.php"><i class="fa fa-user fa-fw"></i> Modificar</a>
                        </li>
                        <li><a href="cambia_contrasena.php"><i class="fa fa-gear fa-fw"></i> Cambiar contraseña</a>

                        </li>
                        <li class="divider"></li>
                          
                               <li><a href="#.php" ><i class="fa fa-user fa-fw"></i> USUARIO : <?php echo $datau['dni_u']; ?></a>
                        <li><a href="../index.php?logout"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">          
                        <li>
                            <a href="principal_p.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        <?php 
                        if ($tipou =='programador') {
                          ?>
                          <!--  <li>
                            <a href="#"><i class="fa fa-home"></i> Oficina<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="oficina_nuevo.php">Nuevo</a>
                                </li>
                                <li>
                                    <a href="oficina_mostrar.php">Mostrar</a>
                                </li>
                            </ul>                 
                        </li>-->
                           <li>
                            <a href="oficina_mostrar.php"><i class="fa fa-home"></i> Oficina</a>
                            <!-- /.nav-second-level -->
                        </li>
                          <?php
                        }
                        ?>
                        <?php
                        if ($tipou=='programador' or $tipou=='administrador') {
                            ?>
                            <li>
                            <a href="usuario_mostrar.php"><i class="fa  fa-user"></i> Usuario</a>
                       
                            <!-- /.nav-second-level -->
                        </li>
                            <?php
                        }
                        ?>
                        
                       <li>
                            <a href="cliente_mostrar.php"><i class="fa fa-user"></i> Cliente</a>
                        </li>
                       <li>
                            <a href="producto_mostrar.php"><i class="fa fa-shopping-cart"></i> Productos</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dropbox"></i> Otros<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="categoria_mostrar.php">Categoria</a>
                                </li>
                                <li>
                                    <a href="unidad_mostrar.php">Unidad</a>
                                </li>
                                <li>
                                    <a href="marca_mostrar.php">Marca</a>
                                </li>
                                 <li>
                                    <a href="tipodocumento_mostrar.php">Tipo documento</a>
                                </li>
                                <li>
                                    <a href="formapago_mostrar.php">Forma pago</a>
                                </li>
                            </ul>
                       
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>