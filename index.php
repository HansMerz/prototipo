<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body class="bg-light">
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-5 border border-5 border-secondary">

                <form class="card-body cardbody-color p-lg-5">

                    <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2016/08/31/11/54/user-1633249_960_720.png"
                             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                             alt="profile">

                    </div>
                    <div class="text-center">
                        <h2 class="text-center text-dark">Iniciar sesión</h2>
                    </div>
                    <div class="mb-3 mt-4 input-group">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control p-3" id="Username" aria-describedby="emailHelp"
                               placeholder="Usuario">
                    </div>
                    <div class="mb-3 mt-4 input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control p-3" id="password" placeholder="Contraseña">
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-color p-3 mb-5 w-50">Ingresar</button>
                    </div>
                    <div id="emailHelp" class="form-text text-center mb-3 text-dark">¿No te has registrado?
                        <a href="#" class="text-dark fw-bold"> Regístrate aquí</a>
                    </div>

                    <div class="form-text text-center text-dark fw-bold">
                        <a href="#" class="text-dark ">Olvidé mi contraseña</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</body>
</html>