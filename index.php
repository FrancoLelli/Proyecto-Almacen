<?php

    session_start();

    $db = new mysqli('localhost', 'root', '', 'sistema_prog');
    if($db->connect_errno != null){
        echo 'el error es: '.$db->connect_errno.'<br> Corresponde a: '.$db->connect_error.'<br>';
    }else{
        /* echo 'se conecto con exito <br>'; */
    };

    if(!isset($_SESSION['email'])){
        header("Location: ./login.php");
    }else{
        $email = $_SESSION['email'];
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Sistema</title>
    <link rel="icon" type="image/x-icon" href="./img/market.png">
    <!-- Link al CSS -->
    <link rel="stylesheet" href="./css/styles.css">
    <!-- Link BootsTrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!--Link FontAwasome-->
    <script src="https://kit.fontawesome.com/576ee62c68.js" crossorigin="anonymous"></script>
    <!-- Link a Script -->
    <script defer src="./js/scriptSistema.js"></script>
    </head>
    <body class="body">
        <header class="header">
            <div class="divGeneral logo-nav-container">
                <a href="./index.php" class="logo">MARKET</a>
                <span class="barra"><i class="fas fa-bars"></i></span>
                
                <nav class="navegation">
                    <ul class="listaNav">
                        <li><a href="./proveedores.php">Proveedores</a></li>
                        <li><a href="./clientes.php">Clientes</a></li>
                        <li><a href="./productos.php">Productos</a></li>
                        <li><a href="./ventas.php">Ventas</a></li>
                        <li><a href="./estadisticas.php">Estadisticas</a></li>
                        <li><a href="./contacto.php">Contacto</a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-tie logo2"></i>
                        <?php 
                            $consultaNom = $db->query("SELECT Usu_nombre FROM usuario WHERE Usu_email = '$email'");
                            $arrayNom = $consultaNom->fetch_array();
                            echo $arrayNom[0];
                        ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a style="color: black;" href="./cerrarSesion/cerrarSesion.php">Cerrar Sesion</a></li>
                        </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="mainSection">
            <section class="sectionHome">
                <h1 class="tituloPagina">Bienvenido <?php echo $arrayNom[0]; ?>!</h1>
            </section>
        </main>
        <footer class="footer">
            <div class="">
                <p>
                    Diseñado por @francolelli
                </p>
            </div>
        </footer>
        <!-- Link Script BootsTrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>
<?php
}
?>
