<!DOCTYPE html>
<html lang="en">

<head>

  <title>Chat Interno Hotel Daniya Spa & Business ****</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <style>
    body {
      background-image: url('images/logo_blanco.png');
      background-repeat: repeat;
      width: 100%;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-info">
    <a class="navbar-brand" href="index.php">Chat Interno Hotel Daniya Spa & Business ****</a>
    <ul class="nav navbar-nav navbar-right">
      <button type="button" class="btn btn-warning m-2" data-toggle="modal" data-target="#signup">
        <i class="bi-card-checklist"></i></span> Registrarse
      </button>
      <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#login">
        <i class="bi-box-arrow-in-right"></i></span> Ingresar
      </button>
  </nav>

  <!-- MODAL SIGNUP -->
  <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="false">
    <div class="modal-dialog" role="form">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h2>Formulario de registro</h2>
          <form class="form-horizontal" method="post" action="./router/router.php">
            <div class="form-group">
              <label class="control-label" for="name">Nombre:</label>
              <input type="text" class="form-control" id="name" placeholder="Ingresa su nombre" name="name" required>
            </div>
            <div class="form-group">
              <label class="control-label" for="surname">Apellido:</label>
              <input type="text" class="form-control" id="surname" placeholder="Ingresa su apellido" name="surname"
                required>
            </div>
            <div class="form-group">
              <label class="control-label" for="phone">N&uacute;mero de tel&eacute;fono:</label>
              <input type="text" class="form-control" min="9" max="9" id="phone" placeholder="Ingresa su apellido"
                name="phone" required>
            </div>
            <div class="form-group">
              <label class="control-label" for="name">Contrase&ntilde;a:</label>
              <input type="password" class="form-control" id="password" placeholder="Ingresa una contraseña"
                name="password" required>
            </div>
            <div class="form-group">
              <label class="control-label" for="name" required>Departamento:</label>
              <select class="form-control" id="department" name="department">
                <option value="reception" selected disabled>Seleccione un departamento</option>
                <option value="Recepcion">Recepci&oacute;n</option>
                <option value="Spa">Spa</option>
                <option value="Pisos">Pisos</option>
                <option value="Sala">Sala</option>
                <option value="Cocina">Cocina</option>
              </select>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" value="new_user" name="new_user" class="btn btn-primary">Regístrate aquí</button>
        </div>
      </div>
      </form>
    </div>
  </div>


  <!-- MODAL LOGIN -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false">
    <div class="modal-dialog" role="form">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Identif&iacute;cate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h2>Formulario de Entrada</h2>
          <form class="form-horizontal" method="post" action="./router/router.php">
            <div class="form-group">
              <label class="control-label" for="phone">N&uacute;mero de tel&eacute;fono:</label>

              <input type="text" class="form-control" id="phone" placeholder="ingresa tu numero de telefono" name="phone">
            </div>
            <div class="form-group">
              <label class="control-label" for="pwd">Contrase&ntilde;a:</label>
              <input type="password" class="form-control" id="password" placeholder="ingresa una contraseña"
                name="password">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="login" name="login" value="login" class="btn btn-primary">Ingresar</button>
        </div>
      </div>
      </form>
    </div>
  </div>