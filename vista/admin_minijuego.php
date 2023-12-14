<?php if(isset($_SESSION['perfil']) && $_SESSION["perfil"]=="am"){?>
    <h1>Bienvenido <?php echo $_SESSION["nombre"] ?>, estás en la página de administración de minijuego.</h1>
<?php } else { ?>
    <h1>No deberías estar aquí, inicia sesión</h2>
<?php } ?>