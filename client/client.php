<?php

session_start();

if (!isset($_SESSION['client'])) {
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css"></link>
    <link rel="stylesheet" href="styles/client.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/client.js" type="text/javascript"></script>

</head>
<body>

<header>
    <span class="menu"><i class="material-icons">menu</i></span>
</header>
<section class="main">
    <aside class="keep">


        <ul class="list-unstyled components">

            <li class="active">
                <a href="#usuarios" data-toggle="collapse" class="dropdown-toggle">
                    <span class="material-icons">person</span>
                    Usuario
                </a>

                <ul class="collapse list-unstyled" id="usuarios">


                    <li>
                        <a href="#">
                            <span class="material-icons">group</span>
                            Registar Personas a cargo
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="material-icons">manage_accounts</span>
                            actualizar datos personales
                        </a>
                    </li>


                </ul>

            </li>


            <li>
                <a href="#">
                    <span class="material-icons">assignment</span>
                    Ex??menes

                </a>
            </li>
            <li>
                <a href="#">
                    <span class="material-icons">trending_up</span>
                    Indicadores

                </a>
            </li>


            <li class="active">
                <a href="control_register.php">
                    <span class="material-icons">medical_services</span>
                    Controles m??dicos
                </a>
            </li>


            <li>
                <a href="#">
                    <span class="material-icons ">folder_shared</span>
                    Seguimientos
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="material-icons">health_and_safety</span>
                    Condiciones de salud
                </a>
            </li>
            <li>
                <a href="../backend/api/controller/logout.php">
                    <span class="material-icons">logout</span>
                    Cerrar sesi??n
                </a>
            </li>

        </ul>


        </ul>
    </aside>
    <article>
        <div class="jumbotron">
            <h1 class="display-4">Bienvenido al panel, <?php echo $_SESSION['client']['nombre']; ?> !</h1>
            <p class="lead">Gestione su salud y la de sus seres queridos</p>

        </div>


        <div class="row  ">
            <div class="col-12 d-flex flex-column ">

                <div class="row justify-content-center">

                    <div class="col-sm-6 ">

                        <div class="card shadow-lg p-3 mb-5 bg-body rounded  ">

                            <div class="card-body">
                                <h5 class="card-title">Mantengase al tanto de sus indicadores y controles de salud.</h5>

                                <img src="https://cdn.pixabay.com/photo/2017/01/31/21/42/boy-2027487_960_720.png"
                                     class="mx-auto d-block" width="200px" alt="profile">


                            </div>
                        </div>


                    </div>


                </div>


            </div>

        </div>


    </article>
</section>


</body>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>