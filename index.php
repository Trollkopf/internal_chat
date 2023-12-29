<?php include "layouts/header.php"; ?>
<div class="container">
    <?php
    $user = null;
    if (isset($_GET['user'])) {
        $user = $_GET['user'];
    }

    ?>
    <?php if ($user == 'unknown'): ?>
        <div id="error" class="alert alert-danger m-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">¡Atenci&oacute;n!</h4>
            <hr>
            Usuario o contraseña incorrectos, int&eacute;ntelo de nuevo o regístrese.
        </div>
    <?php endif; ?>
</div>

</div>

</body>

</html>