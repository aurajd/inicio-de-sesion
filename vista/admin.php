<?php if(isset($_SESSION['perfil']) && $_SESSION["perfil"]=="s"){?>
    <?php if(isset($_GET["exito"])){ echo "<h2>".$_GET["exito"]."</h2>"; } ?>
    <h1>Bienvenido <?php echo $_SESSION["nombre"] ?>, estás en la página de super administrador.</h1>
    <a href="index.php?controller=admin&action=mostrar_registro">Registrar administradores minijuegos</a>
<?php } else { ?>
    <h1>No deberías estar aquí, inicia sesión</h2>
<?php } ?>