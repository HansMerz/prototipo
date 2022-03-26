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
                    Exámenes

                </a>
            </li>
            <li>
                <a href="#">
                    <span class="material-icons">trending_up</span>
                    Indicadores

                </a>
            </li>


            <li class="active">
                <a href="#controles" data-toggle="collapse" class="dropdown-toggle">
                    <span class="material-icons">medical_services</span>
                    Controles médicos
                </a>

                <ul class="collapse list-unstyled" id="controles">


                    <li>
                        <a href="control_register.html">
                            <span class="material-icons">edit_calendar</span>
                            Registar controles
                        </a>
                    </li>


                    <li>
                        <a href="control_search">
                            <span class="material-icons">manage_search</span>
                            consultar controles
                        </a>
                    </li>


                </ul>

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
                    Cerrar sesión
                </a>
            </li>

        </ul>

        </ul>
    </aside>
    <article>

        <div class="jumbotron">
            <h1>Control de salud</h1>

        </div>


        <div class="row  ">
            <div class="col-12 d-flex flex-column ">

                <div class="row justify-content-center">

                    <div class="col-sm-12 ">


                        <div class="container-fluid">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-4">

                                        <input type="text" class="form-control" id=""
                                               placeholder="nombre profesional de la salud" required>
                                    </div>
                                    <div class="form-group col-md-4">

                                        <input type="text" class="form-control" id="" placeholder="Especialización"
                                               required>
                                    </div>

                                    <div class="form-group col-md-4">

                                        <input type="date" class="form-control" id="" placeholder="Fecha del control"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <textarea class="form-control" id="" placeholder="Observaciones"
                                              required></textarea>
                                </div>


                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </form>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Doctor</th>
                                    <th scope="col">Especialización</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Observaciones</th>
                                    <th scope="col">Operaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>
                                </tbody>
                            </table>
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