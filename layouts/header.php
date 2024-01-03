<!DOCTYPE html>
<html lang="en">

<head>

  <title>Chat Interno Hotel Daniya Spa & Business ****</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Include bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- V-4.6.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

  <!-- V-5.3.2 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <!-- Include JQUERY -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

  <style>
    body {
      background-image: url('images/logo_blanco.png');
      background-repeat: repeat;
      width: 100%;
    }

    .invalid {
      border: 2px solid red;
    }

    .valid {
      border: 2px solid green;
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
              <label class="control-label" for="signup_name">Nombre:</label>
              <input type="text" class="form-control" id="signup_name" placeholder="Ingrese su nombre" name="name"
                autocomplete="given-name" required>
              <div id="name_error" class="text-danger"></div>
            </div>
            <div class="form-group">
              <label class="control-label" for="signup_surname">Apellido:</label>
              <input type="text" class="form-control" id="signup_surname" placeholder="Ingrese su apellido"
                autocomplete="family-name" name="surname" required>
              <div id="surname_error" class="text-danger"></div>
            </div>
            <div class="form-group">
              <label class="control-label" for="signup_phone">N&uacute;mero de tel&eacute;fono:</label>
              <input type="text" class="form-control" min="9" max="9" id="signup_phone"
                placeholder="Ingrese su numero de telefono" name="phone" autocomplete="tel" required>
              <div id="phone_error" class="text-danger"></div>
            </div>
            <div class="form-group">
              <label class="control-label" for="signup_password">Contrase&ntilde;a:</label>
              <input type="password" class="form-control" id="signup_password" placeholder="Ingresa una contraseña"
                autocomplete="off" name="password" required>
              <div id="password_error" class="text-danger"></div>
            </div>
            <div class="form-group">
              <label class="control-label" for="signup_department" required>Departamento:</label>
              <select class="form-control" id="signup_department" name="department">
                <option value="no-valid-option" selected disabled>Seleccione un departamento</option>
                <option value="Recepcion">Recepci&oacute;n</option>
                <option value="Spa">Spa</option>
                <option value="Pisos">Pisos</option>
                <option value="Sala">Sala</option>
                <option value="Cocina">Cocina</option>
                <option value="Servicio Tecnico">Servicio Técnico</option>
              </select>
              <div id="department_error" class="text-danger"></div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" value="new_user" name="new_user" id="new_user_btn" class="btn btn-primary">Regístrate
            aquí</button>
        </div>
      </div>
      </form>
    </div>
  </div>

  <!-- Scripts to check if all the information is filled and correct -->
  <script>

    let $name = $("#signup_name");
    let $surname = $("#signup_surname");
    let $phone = $("#signup_phone");
    let $password = $("#signup_password");
    let $department = $("signup_department");

    let $registered_user = false;

    $("#signup_phone").focusout(function () {
      $.ajax({
        type: "POST",
        url: "./validators/phonevalidator.php",
        data: 'phone=' + $("#signup_phone").val(),
        success: function (userData) {
          userData === "true" ? $registered_user = true : $registered_user = false;
        },
      });
    });

    $("#new_user_btn").click(function (event) {
      console.log($registered_user);
      if ($registered_user === true) { //Check if the phone is already in use
        $('#phone_error').html('Ya existe una cuenta con ese numero de telefono');
        $('#signup_phone').addClass('invalid');
        $('#signup_phone').removeClass('valid');
        event.preventDefault();
      } else if ($phone.val().length <= 0) { //Check if phone is empty
        $('#phone_error').html('Este campo es obligatorio');
        $('#signup_phone').addClass('invalid');
        $('#signup_phone').removeClass('valid');
        event.preventDefault();
      } else if (isNaN($phone.val())) { //Check if is a phone (number)
        $('#phone_error').html('Este campo debe ser un numero de telefono valido');
        $('#signup_phone').addClass('invalid');
        $('#signup_phone').removeClass('valid');
        event.preventDefault();
      } else {
        $('#phone_error').html('');
        $('#signup_phone').addClass('valid');
        $('#signup_phone').removeClass('invalid');
      }

      if ($name.val().length <= 0) { //Check if name is empty
        $('#name_error').html('Este campo es obligatorio');
        $('#signup_name').addClass('invalid');
        $('#signup_name').removeClass('valid');
        event.preventDefault();
      } else {
        $('#name_error').html('');
        $('#signup_name').addClass('valid');
        $('#signup_name').removeClass('invalid');
      }

      if ($surname.val().length <= 0) { //Check if surname is empty
        $('#surname_error').html('Este campo es obligatorio');
        $('#signup_surname').addClass('invalid');
        $('#signup_surname').removeClass('valid');
        event.preventDefault();
      } else {
        $('#surname_error').html('');
        $('#signup_surname').addClass('valid');
        $('#signup_surname').removeClass('invalid');
      }


      if ($password.val().length <= 0) { //Check if password is empty
        $('#password_error').html('Este campo es obligatorio');
        $('#signup_password').addClass('invalid');
        $('#signup_password').removeClass('valid');
        event.preventDefault();
      } else {
        $('#password_error').html('');
        $('#signup_password').addClass('valid');
        $('#signup_password').removeClass('invalid');
      }

      if ($('#signup_department').find(':selected').prop('disabled')) { //Check if select option is selected
        $('#department_error').html('selecciona un departamento');
        $('#signup_department').addClass('invalid');
        $('#signup_department').removeClass('valid');
        event.preventDefault();
      } else {
        $('#department_error').html('');
        $('#signup_department').addClass('valid');
        $('#signup_department').removeClass('invalid');
      }

    });
  </script>

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
              <label class="control-label" for="login_phone">N&uacute;mero de tel&eacute;fono:</label>

              <input type="text" class="form-control" id="login_phone" autocomplete="tel"
                placeholder="ingresa tu numero de telefono" name="phone">
              <div id="login_user_error" class="text-danger"></div>
            </div>
            <div class="form-group">
              <label class="control-label" for="login_password">Contrase&ntilde;a:</label>
              <input type="password" class="form-control" id="login_password" autocomplete="off"
                placeholder="ingresa una contraseña" name="password">
              <div id="login_password_error" class="text-danger"></div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="login_btn" name="login" value="login" class="btn btn-primary">Ingresar</button>
        </div>
      </div>
      </form>
    </div>
  </div>

  <!-- Scripts to check if the login information is filled -->
  <script>

    $("#login_btn").click(function (event) {

      if ($("#login_phone").val().length <= 0) {
        $("#login_user_error").html("El campo no puede estar vacio");
        $("#login_phone").addClass("invalid");
        $("#login_phone").removeClass("valid");
        event.preventDefault();
      } else {
        $("#login_user_error").html("");
        $("#login_phone").addClass("valid");
        $("#login_phone").removeClass("invalid");
      }

      if ($("#login_password").val().length <= 0) {
        $("#login_password_error").html("El campo no puede estar vacio");
        $("#login_password").addClass("invalid");
        $("#login_password").removeClass("valid");
        event.preventDefault();
      } else {
        $("#login_password_error").html("");
        $("#login_password").addClass("valid");
        $("#login_password").removeClass("invalid");
      }

    })


  </script>